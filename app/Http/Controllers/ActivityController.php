<?php

namespace App\Http\Controllers;

use App\ActivityFile;
use App\CanEditActivity;
use App\Division;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
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
        $user = $this->getUser();
        if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
            $LIMIT 		= isset($_REQUEST['limit']) 	? (int) 	$_REQUEST['limit'] 		: 30;
            $KEYWORD 	= isset($_REQUEST['search']) 	? (string) 	$_REQUEST['search'] 	: null;
            $KEYWORD_splitted = explode(' ',$KEYWORD);

            if(isset($user['activities'])) {
                $own_act = Activity::select('name','year')
                    ->where(function ($query) use ($KEYWORD_splitted) {
                        foreach ($KEYWORD_splitted as $KEYWORD)
                            $query->where('name', 'LIKE', '%' . $KEYWORD . '%');
                    })
                    ->take($LIMIT)
                    ->get();
            }
            else {
                $own_act = Activity::select('name','year')
                    ->where('creator_id', $user['student_id'])
                    ->where(function ($query) use ($KEYWORD_splitted) {
                        foreach ($KEYWORD_splitted as $KEYWORD)
                            $query->where('name', 'LIKE', '%' . $KEYWORD . '%');
                    })
                    ->take($LIMIT)
                    ->get();

                $can_edit_act = CanEditActivity::where('student_id',$user['student_id'])
                    ->join('activities','can_edit_activities.act_id','=','activities.act_id')
                    ->where(function ($query) use ($KEYWORD_splitted) {
                        foreach ($KEYWORD_splitted as $KEYWORD)
                            $query->where('activities.name', 'LIKE', '%' . $KEYWORD . '%');
                    })
                    ->take($LIMIT)
                    ->get();
            }
            $array=[];
            if(isset($own_act)&&$own_act != null){
                foreach($own_act as $own_acts){
                    array_push($array,$own_acts['name']." "."| ปีการศึกษา"." ".$own_acts['year']);
                }
            }
            if(isset($can_edit_act)&&$can_edit_act != null){
                foreach($can_edit_act as $can_edit_acts){
                    array_push($array,$can_edit_acts['name']." "."| ปีการศึกษา"." ".$can_edit_acts['year']);
                }
            }
            $json = json_encode($array);
            die($json);

        }
    }

    public function add_activity(Request $request){
        $user = $this->getUser();
        if(is_null($user)) return redirect('/');
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
        $newAct = Activity::create([
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
        DB::disableQueryLog();
        ini_set("memory_limit", "2048M");
        if (isset($_FILES['file'])) {
            for ($i = 0; $i < sizeof($_FILES['file']['size']); $i++) {
                if (isset($_FILES['file']['size'][$i]) > 0) {
                    $fileName = $_FILES['file']['name'][$i];
                    $tmpName = $_FILES['file']['tmp_name'][$i];
                    $fileSize = $_FILES['file']['size'][$i];
                    $fileType = $_FILES['file']['type'][$i];
                    $fp = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
//            $content = addslashes($content);
//            $fileName = addslashes($fileName);
                    fclose($fp);
                    $newd = ActivityFile::create([
                        'act_id' => $newAct->act_id,
                        'file_name' => $fileName,
                        'size' => $fileSize,
                        'type' => $fileType,
                        'content' => $content,
                        'create_at' => Carbon::now(),
                        'uploader_id' => $user['student_id']
                    ]);
                }
            }
        }

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
    public function getFile($act_id,$file,$extension){
//        return $file.$extension;
        $file=ActivityFile::select('file_name', 'type', 'size', 'content' )->where(['act_id'=>$act_id,'file_name'=>$file.$extension])->first();
        header("Content-length: $file->size");
        header("Content-type: $file->type");
        header("Content-Disposition: attachment; filename=$file->file_name");
//        header("Content-Disposition: attachment; filename=".stripslashes($file->file_name));
        echo $file->content;
//        echo stripslashes($file->content);
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
            $act_list = Activity::all()->sortByDesc('act_id');
            return view('activity-list',compact('act_list','division'));
        }
        else{
            $act_list = Activity::where('creator_id',$user['student_id'])->get();
            $can_edit_act = CanEditActivity::where('student_id',$user['student_id'])->select('act_id')->get();
            //return $can_edit_act;
            foreach($can_edit_act as $id){
                $add_act = Activity::where('act_id',$id['act_id'])->first();
                //return $add_act;
                //var_dump($id);
                $act_list->push($add_act);
            }
            $act_list = $act_list->sortByDesc('act_id');
            return view('activity-list',compact('act_list','division'));
        }
    }

    public function get_act_detail(Request $request){
        $user = $this->getUser();
        $act_id = $request->input('act_id');
        if(!isset($user['activities']) &&!Activity::where('act_id',$act_id)->where('creator_id',$user['student_id'])->exists() && !CanEditActivity::where('act_id',$act_id)->where('student_id',$user['student_id'])->exists())
            return 'fail';
        if(Activity::where('act_id',$act_id)->exists()){
            $act = Activity::where('act_id',$act_id)->first();
            $can_edit = CanEditActivity::where('act_id',$act_id)->join('users','can_edit_activities.student_id','=','users.student_id')->select('users.student_id','users.name','users.surname')->get();
            return json_encode(array('act'=>$act,'can_edit'=>$can_edit));
        }
        else return 'fail';
    }

    public function edit_activity(Request $request){
        $act_data = Activity::find($request->input('act_id'));
        $tqf = $request->input('tqf');
        $student_id = $request->input('student_id');

        $deleted = $request->input('deleted');

        $ethics = isset($tqf['ethics']);
        $knowledge = isset($tqf['knowledge']);
        $cognitive = isset($tqf['cognitive']);
        $interpersonal = isset($tqf['interpersonal']);
        $communication = isset($tqf['communication']);

        $user = $this->getUser();

        if(!isset($user['activities']) &&!Activity::where('act_id',$act_data['act_id'])->where('creator_id',$user['student_id'])->exists() && !CanEditActivity::where('act_id',$act_data['act_id'])->where('student_id',$user['student_id'])->exists())
            return 'fail';
        if($act_data['status']!=0 && !isset($user['activities']))
            return 'fail';

        if(!is_null($request->input('activity_name')))$act_data['name'] = $request->input('activity_name');
        if(!is_null($request->input('kind_of_activity')))$act_data['category'] = $request->input('kind_of_activity');
        if(!is_null($request->input('act_status')))$act_data['status'] = $request->input('act_status');
        $act_data['tqf_ethics'] = $ethics;
        $act_data['tqf_knowledge'] = $knowledge;
        $act_data['tqf_cognitive'] = $cognitive;
        $act_data['tqf_interpersonal'] = $interpersonal;
        $act_data['tqf_communication'] = $communication;
        $act_data['avail_year'] = $request->input('last_year_seen');
        if(!is_null($request->input('division')))$act_data['div_id'] = $request->input('division');
        $act_data->save();

        if(!is_null($student_id)) {
            foreach ($student_id as $sid) {
                if ($deleted[$sid] != "true" && !CanEditActivity::where('act_id',$act_data['act_id'])->where('student_id',$sid)->exists()) {
                    CanEditActivity::create([
                        'act_id' => $act_data['act_id'],
                        'student_id' => $sid
                    ]);
                }
                else if ($deleted[$sid] == "true" && CanEditActivity::where('act_id',$act_data['act_id'])->where('student_id',$sid)->exists()) {
                    CanEditActivity::where('act_id',$act_data['act_id'])->where('student_id',$sid)->delete();
                }
            }
        }
        else{
            CanEditActivity::where('act_id',$act_data['act_id'])->delete();
        }
    }
    public function search_activity(Request $request){
        if($request->input('act_name')){
            $search_act_info = explode('| ปีการศึกษา',$request->input('act_name'));
            $act_info = Activity::where('name',trim($search_act_info[0]))->where('year',$search_act_info[1])->get();
            return $act_info;
        }
        else return 'fail';
    }

    public function delete_activity(Request $request){
        $user = $this->getUser();
        $act_id = $request->input('act_id');
        if(!isset($user['activities']) &&!Activity::where('act_id',$act_id)->where('creator_id',$user['student_id'])->exists() && !CanEditActivity::where('act_id',$act_id)->where('student_id',$user['student_id'])->exists())
            return 'fail';
        $act = Activity::find($act_id);
        if((Activity::where('act_id',$act_id)->where('creator_id',$user['student_id'])->exists() || CanEditActivity::where('act_id',$act_id)->where('student_id',$user['student_id'])->exists()) && $act['status']!=0)
            return 'fail';
        Activity::find($act_id)->delete();
        return 'success';

    }

    public function report(){
        $user = $this->getUser();
        if(!isset($user['activities']) || !$user['activities']) return redirect('/');
        $setting = Setting::all();
        $year = $setting[0]['year'];
        $act_this_year = Activity::where('status','>',1)->where('year',$year)->get();
        $raw_act_year = Activity::select('year')->get();
        $act_year = [];
        foreach($raw_act_year as $ay){
            if(!in_array($ay['year'],$act_year))
                array_push($act_year,$ay['year']);
        }
        $count = [];
        $count['sport'] = 0;
        $count['volunteer'] = 0;
        $count['academic'] = 0;
        $count['culture'] = 0;
        $count['ethics'] = 0;

        $tqf = [];
        $tqf['ethics'] = 0;
        $tqf['knowledge'] = 0;
        $tqf['cognitive'] = 0;
        $tqf['interpersonal'] = 0;
        $tqf['communication'] = 0;
        foreach ($act_this_year as $act){
            switch($act['category']){
                case 'sport' : $count['sport']++; break;
                case 'volunteer' : $count['volunteer']++; break;
                case 'academic' : $count['academic']++; break;
                case 'culture' : $count['culture']++; break;
                case 'ethics' : $count['ethics']++; break;
            }
            if($act['tqf_ethics']=='1') $tqf['ethics']++;
            if($act['tqf_knowledge']=='1') $tqf['knowledge']++;
            if($act['tqf_cognitive']=='1') $tqf['cognitive']++;
            if($act['tqf_interpersonal']=='1') $tqf['interpersonal']++;
            if($act['tqf_communication']=='1') $tqf['communication']++;
        }
        return view('activity-report',compact('count','tqf','act_year'));
    }

    public function postReport(Request $request){
        $user = $this->getUser();
        if(!isset($user['activities']) || !$user['activities']) return "fail";
        $select_year = $request->input('year');
        $act_select_year = Activity::where('status','>',1)->where('year',$select_year)->get();

        $count = [];
        $count['sport'] = 0;
        $count['volunteer'] = 0;
        $count['academic'] = 0;
        $count['culture'] = 0;
        $count['ethics'] = 0;

        $tqf = [];
        $tqf['ethics'] = 0;
        $tqf['knowledge'] = 0;
        $tqf['cognitive'] = 0;
        $tqf['interpersonal'] = 0;
        $tqf['communication'] = 0;
        foreach ($act_select_year as $act){
            switch($act['category']){
                case 'sport' : $count['sport']++; break;
                case 'volunteer' : $count['volunteer']++; break;
                case 'academic' : $count['academic']++; break;
                case 'culture' : $count['culture']++; break;
                case 'ethics' : $count['ethics']++; break;
            }
            if($act['tqf_ethics']=='1') $tqf['ethics']++;
            if($act['tqf_knowledge']=='1') $tqf['knowledge']++;
            if($act['tqf_cognitive']=='1') $tqf['cognitive']++;
            if($act['tqf_interpersonal']=='1') $tqf['interpersonal']++;
            if($act['tqf_communication']=='1') $tqf['communication']++;
        }
        return json_encode(array('count'=>$count,'tqf'=>$tqf));

    }
}
