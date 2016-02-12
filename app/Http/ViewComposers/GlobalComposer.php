<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use \App\Permission;
use \App\Setting;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
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
        $view->with('user', $user);
    }

}
