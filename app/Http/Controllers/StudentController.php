<?php

namespace App\Http\Controllers;

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

class StudentController extends Controller
{
    public function studentsPage(){
        $user = $this->getUser();

        if(is_null($user))
            return redirect('/');

        return view('students');
    }

    public function search(Request $request){
        $user = User::select(['student_id','name','surname','nickname','sex','group','department','generation'])->where(function ($query) use ($request) {
                   if($request->input('studentID')) $query->where('student_id', 'LIKE', '%'.$request->input('studentID').'%');
                   if($request->input('studentFName')) $query->where('name', 'LIKE', '%'.$request->input('studentFName').'%');
                   if($request->input('studentLName')) $query->where('surname', 'LIKE', '%'.$request->input('studentLName').'%');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                   //if($request->input('')) $query->where('student_id', '=', '');
                })->get();
        return $user;
    }
}
