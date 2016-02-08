<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use \App\Permission;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getUser(){
        $user = Auth::user();
        if(is_null($user))
            return null;
        $permission_json = Permission::where('student_id',$user['student_id'])->select('room','news','supplies','activities','student')->first();
        if($permission_json['news']) $user['news'] = true;
        if($permission_json['room']) $user['room'] = true;
        if($permission_json['supplies']) $user['supplies'] = true;
        if($permission_json['activities']) $user['activities'] = true;
        if($permission_json['student']) $user['student'] = true;
        $isAdmin = Setting::where('admin_id',$user['student_id'])->first();
        if(!is_null($isAdmin)) $user['admin'] = true;
        return $user;
    }
}
