<?php

namespace App\Http\Controllers;

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
        $permission_json = Permission::where('student_id',$user->student_id)->select('permission')->get();
        $permission = [];
        for ($i = 0; $i < count($permission_json); $i++) {
            $permission[$i] = $permission_json[$i]['permission'];
        }
        $user['permission'] = $permission;
        return $user;
    }
}
