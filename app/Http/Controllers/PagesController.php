<?php

namespace App\Http\Controllers;

use App\Division;
use App\Permission;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function cas_login() {
        $CUCAS = \Config::get('app.CUCAS');
        $studentId = Input::get('studentid');
        $password = Input::get('password');
        //$remember_me = Input::get('checkbox-inline');

        $url = $CUCAS['apibase'].$CUCAS['apiname'];
        $fields = array(
            'appid' => $CUCAS['appid'],
			'appsecret' => $CUCAS['appsecret'],
            'username' => $studentId,
            'password' => $password
        );
        $postvars='';
        $sep='';
        foreach($fields as $key => $value) {
            $postvars.= $sep.urlencode($key).'='.urlencode($value);
            $sep='&';
        }

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = json_decode(curl_exec($ch));
        if(!$result)
            $result = curl_error($ch);
        curl_close($ch);

        // Code Handle HERE!!!!
        var_dump($result);
        Auth::loginUsingId($result->content->studentid);
        //var_dump(Auth::user());
        return redirect('/');
    }

    public function login(){
        $id = Input::get('studentID');
        $password = Input::get('password');
        $remember = Input::get('checkbox-inline');
        if(Auth::attempt(['student_id' => $id, 'password' => $password], $remember)) {
            if(is_null(Auth::user()->last_time_attemp))
                return $this->register();
            $this->updateUserTime();
            return Redirect::back();
        }
        else
            return Redirect::back()->with('hasError', true);
    }

    public function logout(){
        $user = Auth::user();
        if($user==null)
            return redirect('supplies');
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function register() {
        $user = $this->getUser();
        $department = Division::where('type','=','Department')->get();
        $group = Division::where('type','=','Group')->get();
        if(is_null($user))
          return redirect('/');
        return view('register',['department'=>$department,'group'=>$group]);
    }

    public function registerConfirm() {
        $user = Auth::user();
        $input = Input::all();
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->nickname = $input['nickname'];
        $user->address = $input['address'];
        $user->birthdate = $input['birthdate'];
        $user->phone_number = $input['phone'];
        $user->email = $input['email'];
        $user->facebook_link = $input['facebook'];
        $user->line_id = $input['line'];
        $user->emergency_contact = $input['emergency'];
        $user->department = $input['department'];
        $user->group = $input['group'];
        $user->allergy = $input['allergy'];
        $user->anomaly = $input['anomaly'];
        $user->religion = $input['religion'];
        $user->blood_type = $input['blood'];
        $user->clothing_size = $input['size'];
        $user->save();
        $this->updateUserTime();
        return redirect('/');
    }

    public function saveProfile($user_id) {

        $me = $this->getUser();
        if (is_null($me))
            return redirect('/');
        $permission = Permission::find($me['student_id']);
        if (!$permission||!$permission->student)
            return redirect('/');

        $user = User::where('student_id','=',$user_id)->get();
        if(sizeof($user)==0)
            return redirect('/');
        $user = $user[0];

        $input = Input::all();
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->nickname = $input['nickname'];
        $user->address = $input['address'];
        $user->birthdate = $input['birthdate'];
        $user->phone_number = $input['phone'];
        $user->email = $input['email'];
        $user->facebook_link = $input['facebook'];
        $user->line_id = $input['line'];
        $user->emergency_contact = $input['emergency'];
        $user->department = $input['department'];
        $user->group = $input['group'];
        $user->allergy = $input['allergy'];
        $user->anomaly = $input['anomaly'];
        $user->religion = $input['religion'];
        $user->blood_type = $input['blood'];
        $user->clothing_size = $input['size'];
        $user->last_time_attemp = date('Y-m-d H:i:s',time());
        $user->save();
        return redirect('/');
    }

    public function newsPage(){
        $user = $this->getUser();
        return view('news');
    }

    public function suppliesPage(){
        $user = $this->getUser();
        return view('supplies');
    }

    public function profilePage() {
        $user = $this->getUser();
        $department = Division::where('type','=','Department')->get();
        $group = Division::where('type','=','Group')->get();
        if(is_null($user))
            return redirect('/');
        return view('profile',['department'=>$department,'group'=>$group,'_user'=>$user]);
    }

    public function editProfilePage($user_id) {

        $me = $this->getUser();
        if (is_null($me))
            return redirect('/');
        $permission = Permission::find($me['student_id']);
        if (!$permission||!$permission->student)
            return redirect('/');

        $user = User::where('student_id','=',$user_id)->get();
        $department = Division::where('type','=','Department')->get();
        $group = Division::where('type','=','Group')->get();
        if(sizeof($user)==0)
            return redirect('/');
        return view('profile',['department'=>$department,'group'=>$group,'_user'=>$user[0]]);
    }

    public function scheduleManagePage(){
        return view('schedule-manage');
    }

    private function updateUserTime() {
        Auth::user()->last_time_attemp = date('Y-m-d H:i:s',time());
        Auth::user()->save();
    }
}
