<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function login(){
        $id = Input::get('studentID');
        $password = Input::get('password');
        $remember = Input::get('checkbox-inline');
        if(Auth::attempt(['student_id' => $id, 'password' => $password], $remember)) {
            if(is_null(Auth::user()->last_time_attemp))
                return $this->register();
            $this->updateUserTime();
            return redirect('/');
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
        if(is_null($user))
          return redirect('/');
        return view('register');
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

    public function newsPage(){
        $user = $this->getUser();
        return view('news');
    }

    public function suppliesPage(){
        $user = $this->getUser();
        return view('supplies');
    }

    public function studentsPage(){
        $user = $this->getUser();

        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        return view('students');
    }

    public function profilePage() {
        $user = $this->getUser();
        if(is_null($user))
          return redirect('/');
        return view('profile');
    }

    public function scheduleManagePage(){
        return view('schedule-manage');
    }

    private function updateUserTime() {
        Auth::user()->last_time_attemp = date('Y-m-d H:i:s',time());
        Auth::user()->save();
    }
}
