<?php

namespace App\Http\Controllers;

use App\Permission;
use App\UserReservation;
use App\User;
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
    public function UserSubmitRequest()
    {
        $project = input::get('project');
        $numberOfPeople = input::get('numberOfPeople');
        $objective = input::get('objective');
        $date = input::get('date');
        $startTime = input::get('startTime');
        $endTime = input::get('endTime');
        $borrow = input::get('borrow');
        $otherBorrow = input::get('otherBorrow');
        $new = new UserReservation();
    }

    public function editRoom()
    {
        $room = Input::get('room');
        $timeStartDefault = Input::get('time-start-default');
        $timeEndDefault = Input::get('time-end-default');
        return compact('room','timeStartDefault','timeEndDefault');
    }
}
