<?php

namespace App\Http\Controllers;

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
        if(Auth::attempt(['student_id' => $id, 'password' => $password], $remember))
            return redirect('/');
        else
            return Redirect::back()->with('hasError', true);
    }

    public function logout()
    {
        $user = Auth::user();
        if($user==null)
            return redirect('supplies');
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function newsPage(){
        $user = Auth::user();
        return view('news')->with('user', $user);
    }

    public function suppliesPage(){
        $user = Auth::user();
        return view('supplies')->with('user', $user);
    }

    public function scheduleManagePage(){
        return view('schedule-manage');
    }
}
