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

class StudentController extends Controller
{
    public function studentsPage(){
        $user = $this->getUser();

        if(is_null($user))
            return redirect('/');

        return view('students');
    }

    public function search(Request $request){
        return $request->input('data');
    }
}
