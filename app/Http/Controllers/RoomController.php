<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Division;
use App\GuestReservation;
use App\Permission;
use App\UserReservation;
use App\User;
use Carbon\Carbon;
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
        $activity = Activity::select('act_id', 'name')->get();
        $division = Division::select('div_id', 'name')->get();
        if (is_null($user))
            return view('room-reserve', ['permission' => $permission, 'user' => $user]);
        return view('room-reserve', ['permission' => $permission, 'user' => $user, 'activity' => $activity, 'division' => $division]);
    }

    public function viewApprovePage()
    {
        $user = Auth::user();
        $permission = Permission::find($user['student_id']);
        return view('room-approve');
    }

    public function roomManagePage()
    {

        return view('room-manage');
    }

    public function getRoomReservationSchedule()
    {
        $calendarEvents = [];
        $query = UserReservation::where('request_start_time', '<=', $_REQUEST['end'] . ' 23:59:59')
            ->where('request_end_time', '>=', $_REQUEST['start'] . ' 00:00:00')
            ->get();
        foreach ($query as $queries) {
            if($queries['act_id']){
                $title=Activity::where('act_id','=',$queries['act_id'])->select('name')->get()[0]->name;
            }
            else if($queries['div_id']){
                $title=Division::where('div_id','=',$queries['div_id'])->select('name')->get()[0]->name;
            }
            else {
                $title=$queries['other_act'];
            }
            if($queries['status']==null){
                $status=["bg-warning"];
            }
            else if($queries['status']){
                $status=["bg-success"];
            }
            else {
                $status=["bg-danger"];
            }
            array_push($calendarEvents,
                    array(
                        'title' => $title,
                        'start' => $queries['request_start_time'],
                        'end' => $queries['request_end_time'],
                        'id' => $queries['res_id'],
                        'allDay' => !(explode(' ',$queries['request_start_time'])[0]==explode(' ',$queries['request_end_time'])[0]),
                        'className' => $status,
                        'description' => 'MT5',
                        'icon' => 'fa-clock-o',
                    )
            );
        }
//        return $query;
        return json_encode($calendarEvents);
        return $_REQUEST['start'];
    }

    public function UserSubmitRequest()
    {
        $user = Auth::user();
        if (is_null($user))
            return 'noright';
        $permission = Permission::find($user['student_id']);
        $newUserRequest = new UserReservation();
        $newUserRequest->reason = input::get('objective');
        $newUserRequest->number_of_people = input::get('numberOfPeople');
        if ($permission && $permission->room) {
            $newUserRequest->request_start_time = input::get('dateStart') . ' ' . str_replace(' ', '', input::get('startTime')) . ':00';
            $newUserRequest->request_end_time = input::get('dateEnd') . ' ' . str_replace(' ', '', input::get('endTime')) . ':00';
        } else {
            $newUserRequest->request_start_time = input::get('date') . ' ' . str_replace(' ', '', input::get('startTime')) . ':00';
            $newUserRequest->request_end_time = input::get('date') . ' ' . str_replace(' ', '', input::get('endTime')) . ':00';
        }
        $newUserRequest->request_projector = (input::get('projector') === 'true') ? true : false;
        $newUserRequest->request_plug = (input::get('cord') === 'true') ? input::get('numberOfCord') : 0;
        $newUserRequest->request_room_id = input::get('room');
        $newUserRequest->student_id = $user['student_id'];
        if (input::get('otherActActivated') === 'true') {
            $newUserRequest->other_act = input::get('otherAct');
        } else if (substr(input::get('project'), 0, 3) == 'act')
            $newUserRequest->act_id = substr(input::get('project'), 4);
        else if (substr(input::get('project'), 0, 3) == 'div')
            $newUserRequest->div_id = substr(input::get('project'), 4);
        $newUserRequest->create_at = Carbon::now();
        $newUserRequest->save();
        return 'success';
    }

    public function GuestSubmitRequest()
    {
        $newGuestRequest = new GuestReservation();
        $newGuestRequest->reason = input::get('objective');
        $newGuestRequest->number_of_people = input::get('numberOfPeople');
        $newGuestRequest->request_start_time = input::get('date') . ' ' . str_replace(' ', '', input::get('startTime')) . ':00';
        $newGuestRequest->request_end_time = input::get('date') . ' ' . str_replace(' ', '', input::get('endTime')) . ':00';
        $newGuestRequest->request_projector = (input::get('projector') === 'true') ? true : false;
        $newGuestRequest->request_plug = (input::get('cord') === 'true') ? input::get('numberOfCord') : 0;
        $newGuestRequest->guest_name = input::get('name');
        $newGuestRequest->guest_surname = input::get('surname');
        $newGuestRequest->guest_phone_number = input::get('phone');
        $newGuestRequest->guest_student_id = input::get('student_id');
        $newGuestRequest->guest_faculty = input::get('faculty');
        $newGuestRequest->guest_email = input::get('email');
        $newGuestRequest->guest_org = input::get('organization');
        $newGuestRequest->request_room_id = input::get('room');
        $newGuestRequest->create_at = Carbon::now();
        $newGuestRequest->save();
    }

    public function editRoom()
    {
        $room = Input::get('room');
        $timeStartDefault = Input::get('time-start-default');
        $timeEndDefault = Input::get('time-end-default');
        $event = Input::get('event');
        return compact('room', 'timeStartDefault', 'timeEndDefault', 'event');
    }
}
