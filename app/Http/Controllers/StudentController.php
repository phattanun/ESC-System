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

class StudentController extends Controller
{
    public function studentsPage(){
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if(is_null($user))
            return redirect('/');
        return view('students',['permission'=>$permission]);
    }

    public function search(Request $request){
        $user = User::select(['student_id','name','surname','nickname','sex','group','department','generation','birthdate','phone_number','email','facebook_link','line_id','emergency_contact','anomaly','allergy','religion','blood_type','clothing_size'])->where(function ($query) use ($request) {
                    if($request->input('studentID')) $query->where('student_id', 'LIKE', '%'.$request->input('studentID').'%');
                    if($request->input('studentFName')) $query->where('name', 'LIKE', '%'.$request->input('studentFName').'%');
                    if($request->input('studentLName')) $query->where('surname', 'LIKE', '%'.$request->input('studentLName').'%');
                    if($request->input('studentNName')) $query->where('nickname', 'LIKE', '%'.$request->input('studentNName').'%');
                })->get();
        for($i=0 ; $i < sizeof($user);$i++){
            $user[$i]->department = Division::select(['name'])->where('div_id','=',$user[$i]->department)->get();
            $user[$i]->group = Division::select(['name'])->where('div_id','=',$user[$i]->group)->get();
        }
        return $user;
    }
}
