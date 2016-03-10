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

class RoomController extends Controller
{

    public function viewResultPage()
    {
        return view('room-result');
    }
    public function viewReservePage()
    {
        $user = Auth::user();
        $permission = Permission::find($user['student_id']);
        if(is_null($user))
            return redirect('/');
        return view('room-reserve',['permission'=>$permission]);
    }

    public function roomManagePage()
    {

        return view('room-manage');
    }

    public function editRoom()
    {
        $room = Input::get('room');
        return $room;
    }
}
