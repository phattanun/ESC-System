<?php

namespace App\Http\Controllers;

use App\Permission;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->getUser();

        if(!isset($user['admin'])||!$user['admin']||is_null($user))
            return redirect('/');

        $year = Setting::all()->first();
        $year = $year['year'];

        $permission_users = Permission::join('users','permissions.student_id','=','users.student_id')
            ->select('permissions.student_id','users.name','users.surname','permissions.news','permissions.room','permissions.supplies','permissions.activities','permissions.student')
            ->get();




        return view('setting',compact('year','permission_users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editYear()
    {
        $user = $this->getUser();

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
        foreach($sid as $id){
            $permission = Permission::find($id);
            $permission->student_id =  $id;
            if(isset($privilege[$id])&&in_array('announce', $privilege[$id])) $permission->news =true; else $permission->news =false;
            if(isset($privilege[$id])&&in_array('room', $privilege[$id])) $permission->room =true; else  $permission->room =false;
            if(isset($privilege[$id])&&in_array('supplies', $privilege[$id])) $permission->supplies =true; else $permission->supplies =false;
            if(isset($privilege[$id])&&in_array('activity', $privilege[$id])) $permission->activities =true; else $permission->activities =false;
            if(isset($privilege[$id])&&in_array('student', $privilege[$id])) $permission->student =true; else $permission->student =false;
            $permission->save();

        }
        return redirect('/setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
