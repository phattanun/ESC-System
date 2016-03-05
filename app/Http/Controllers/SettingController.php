<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $user = $this->getUser();

        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        $year = Setting::all()->first();
        $year = $year['year'];

        $permission_users = Permission::join('users','permissions.student_id','=','users.student_id')
            ->select('permissions.student_id','users.name','users.surname','permissions.news','permissions.room','permissions.supplies','permissions.activities','permissions.student')
            ->orderBy('permissions.student_id','asc')
            ->get();

        return view('setting',compact('year','permission_users'));
    }
    public function editYear()
    {
        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        $new_year = Input::get('year');
        $new = Setting::first();
        $new->year = $new_year;
        $new->save();
        return redirect('/setting');
    }


    public function editPermission()
    {
        $user = $this->getUser();

        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        $sid = Input::get('student_id');
        $privilege = Input::get('privilege');
      if(isset($sid))  {
            foreach($sid as $id){
                $permission = Permission::where('student_id',$id)->first();
                if($permission==null&&!in_array('deleted', $privilege[$id])){
                    $new = new Permission();
                    $new->student_id =  $id;
                    if(isset($privilege[$id])){
                        if(in_array('announce', $privilege[$id])) $new->news =true; else $new->news =false;
                        if(in_array('room', $privilege[$id])) $new->room =true; else  $new->room =false;
                        if(in_array('supplies', $privilege[$id])) $new->supplies =true; else $new->supplies =false;
                        if(in_array('activity', $privilege[$id])) $new->activities =true; else $new->activities =false;
                        if(in_array('student', $privilege[$id])) $new->student =true; else $new->student =false;
                    }
                    $new->save();
                    continue;
                }
                else if(isset($privilege[$id])){
                    if(in_array('deleted', $privilege[$id])) {
                        Permission::where('student_id',$id)->delete();
                        continue;
                    }
                    if(in_array('announce', $privilege[$id])) $permission->news =true; else $permission->news =false;
                    if(in_array('room', $privilege[$id])) $permission->room =true; else  $permission->room =false;
                    if(in_array('supplies', $privilege[$id])) $permission->supplies =true; else $permission->supplies =false;
                    if(in_array('activity', $privilege[$id])) $permission->activities =true; else $permission->activities =false;
                    if(in_array('student', $privilege[$id])) $permission->student =true; else $permission->student =false;
                }
                $permission->save();

            }
      }
        return redirect('/setting');
    }
    public function deletePermission(Request $request)
    {
        $user = $this->getUser();

        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        ;
        Permission::destroy($request->input('data'));
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


    public function addNewPermission(Request $request)
    {
        $user = explode(' ',$request->input('data'));

        if(User::where('student_id',$user[0])->exists()){
            return User::select(['student_id','name','surname'])->find($user[0]);
        }
        else {
            return 'fail';
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
