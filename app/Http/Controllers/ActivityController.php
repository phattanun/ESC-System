<?php

namespace App\Http\Controllers;

use App\CanEditActivity;
use App\Division;
use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Activity;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = $this->getUser();
        if(is_null($user)) return redirect('/');
        $tmp_d = Division::all();
        $division = [];

        foreach($tmp_d as $d){
            $new_division = [];
            $new_division['div_id'] = $d['div_id'];
            if($d['type']=='Generation') $new_division['name'] = 'รุ่น '.$d['name'];
            else if($d['type']=='Group') $new_division['name'] = 'กรุ๊ป '.$d['name'];
            else if($d['type']=='Department') $new_division['name'] = 'ภาควิชา '.$d['name'];
            else if($d['type']=='Club') $new_division['name'] = 'ชมรม '.$d['name'];
            array_push($division,$new_division);
        }

        return view('create-activity',compact('division'));
    }

    public function addEditor(Request $request){
        if($request->input('data')){
            $user = explode(' ',$request->input('data'));
            if(sizeof($user)==3){
                if(User::where(['student_id'=>$user[0],'name'=>$user[1],'surname'=>$user[2]])->exists()){
                    return User::select(['student_id','name','surname'])->find($user[0]);
                }
                else {
                    return 'fail';
                }
            }
            else if (sizeof($user)>3){
                if(User::where(function ($query) use ($user) {
                    $query->where(['student_id'=>$user[0],'name'=>$user[1]]);
                    for($i = 2;$i<sizeof($user);$i++)
                        $query->where('surname', 'LIKE', '%'.$user[$i].'%');
                })->exists()){
                    return User::select(['student_id','name','surname'])->find($user[0]);
                }
                else {
                    return 'fail';
                }
            }
        }
        else return 'fail';
    }

    public function autoSuggest()
    {
        if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
            $LIMIT 		= isset($_REQUEST['limit']) 	? (int) 	$_REQUEST['limit'] 		: 30;
            $KEYWORD 	= isset($_REQUEST['search']) 	? (string) 	$_REQUEST['search'] 	: null;
            $KEYWORD_splitted = explode(' ',$KEYWORD);

            $user=User::select(['student_id','name','surname'])
                ->where(function ($query) use ($KEYWORD_splitted) {
                    foreach($KEYWORD_splitted as $KEYWORD)
                        $query->where('student_id', 'LIKE', '%'.$KEYWORD.'%');
                    $query->orWhere('name', 'LIKE', '%'.$KEYWORD.'%');
                    $query->orWhere('surname', 'LIKE', '%'.$KEYWORD.'%');
                })
                ->take($LIMIT)
                ->orderBy('student_id', 'asc')
                ->get();

            $array=[];
            if(isset($user)&&$user != null){
                foreach($user as $users){
                    array_push($array,$users->student_id." ".$users->name." ".$users->surname);
                }
            }
            $json = json_encode($array);
            die($json);

        }
    }

    public function add_activity(Request $request){
        $user = $this->getUser();
        $activity_name = $request->input('activity_name');
        $kind_of_activity = $request->input('kind_of_activity');
        $tqf = $request->input('tqf');
        $student_id = $request->input('student_id');

        $last_year_seen = $request->input('last_year_seen');
        $division_id = $request->input('division');
        $deleted = $request->input('deleted');

        $ethics = isset($tqf['ethics']);
        $knowledge = isset($tqf['knowledge']);
        $cognitive = isset($tqf['cognitive']);
        $interpersonal = isset($tqf['interpersonal']);
        $communication = isset($tqf['communication']);

        $setting = Setting::all();
        Activity::create([
            'name'=> $activity_name,
            'year'=> $setting[0]['year'],
            'category' => $kind_of_activity,
            'tqf_ethics' => $ethics,
            'tqf_knowledge' => $knowledge,
            'tqf_cognitive' => $cognitive,
            'tqf_interpersonal' => $interpersonal,
            'tqf_communication' => $communication,
            'status' => 0,
            'avail_year' => $last_year_seen,
            'div_id' => $division_id,
            'creator_id' => $user['student_id'],
            'editor_id' => $user['student_id']
        ]);

        $act_id = Activity::all()->max('act_id');
        if(!is_null($student_id)) {
            foreach ($student_id as $sid) {
                if ($deleted[$sid] != "true") {
                    CanEditActivity::create([
                        'act_id' => $act_id,
                        'student_id' => $sid
                    ]);
                }
            }
        }
        return redirect('/');
    }

    public function activity_list(){
        $user = $this->getUser();
        if(is_null($user)) return redirect('/');
        $tmp_d = Division::all();
        $division = [];
        foreach($tmp_d as $d){
            $new_division = [];
            $new_division['div_id'] = $d['div_id'];
            if($d['type']=='Generation') $new_division['name'] = 'รุ่น '.$d['name'];
            else if($d['type']=='Group') $new_division['name'] = 'กรุ๊ป '.$d['name'];
            else if($d['type']=='Department') $new_division['name'] = 'ภาควิชา '.$d['name'];
            else if($d['type']=='Club') $new_division['name'] = 'ชมรม '.$d['name'];
            array_push($division,$new_division);
        }
        if(isset($user['activities'])) {
            $act_list = Activity::all();
            return view('activity-list',compact('act_list','division'));
        }
        else{
            $act_list = Activity::where('creator_id',$user['student_id'])->get();
            return view('activity-list',compact('act_list','division'));
        }
    }

    public function get_act_detail(Request $request){
        $act_id = $request->input('act_id');
        if(Activity::where('act_id',$act_id)->exists()){
            $act = Activity::where('act_id',$act_id)->first();
            $can_edit = CanEditActivity::where('act_id',$act_id)->get();
            return json_encode(array('act'=>$act,'can_edit'=>$can_edit));
        }
        else return 'fail';
    }

}
