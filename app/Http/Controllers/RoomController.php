<?php

namespace App\Http\Controllers;

use App\Activity;
use App\AllowSchedule;
use App\Division;
use App\GuestReservation;
use App\MeetingRoom;
use App\Permission;
use App\ScheduleSetting;
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
        $department = Division::select('div_id', 'name')->where('type','=','Department')->get();
        $generation = Division::select('div_id', 'name')->where('type','=','Generation')->get();
        $group = Division::select('div_id', 'name')->where('type','=','Group')->get();
        $room = MeetingRoom::select('room_id', 'name')->get();
        if (is_null($user))
            return view('room-reserve', ['permission' => $permission, 'user' => $user,'room'=>$room]);
        return view('room-reserve', ['permission' => $permission, 'user' => $user, 'activity' => $activity, 'department' => $department,'generation' => $generation,'group'=>$group,'room'=>$room]);
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

    public function getMeetingRoom()
    {
        $roomList = [];
        $rooms = MeetingRoom::all();
        foreach($rooms as $room) {
            if($room->closed)
                continue;
            array_push($roomList,
                array(
                    'id' => $room->room_id,
                    'title' => $room->name,
                    'size' => $room->size,
                    'priority' => $room->priority
                )
            );
        }
        return $roomList;
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
            else {
                $title=$queries['other_act'];
            }
            if($queries['div_id']){
                $div=Division::where('div_id','=',$queries['div_id'])->select('name')->get()[0]->name;
            }
            else {
                $div=$queries['other_div'];
            }
            $title .=" ".$div;
            $statusIsNull = is_null($queries['status']);
            if($statusIsNull){
                $status=["bg-warning"];
                $order='b';
            }
            else if($queries['status']){
                $status=["bg-success"];
                $order='a';
            }
            else {
                $status=["bg-danger"];
                $order='c';
            }
            array_push($calendarEvents,
                    array(
                        'title' => $title,
                        'start' => ($statusIsNull||!$queries['status'])?$queries['request_start_time']:$queries['allow_start_time'],
                        'end' => ($statusIsNull||!$queries['status'])?$queries['request_end_time']:$queries['allow_end_time'],
                        'id' => 'u-'.$queries['res_id'],
                        'resourceId' =>$queries['request_room_id'],
                        'allDay' => !(explode(' ',$queries['request_start_time'])[0]==explode(' ',$queries['request_end_time'])[0]),
                        'className' => $status,
                        'order'=>$order,
                        'description' => MeetingRoom::where('room_id','=',$queries['request_room_id'])->select('name')->get()[0]->name,
                        'icon' => 'fa-clock-o',
                    )
            );
        }

        $guest = GuestReservation::where('request_start_time', '<=', $_REQUEST['end'] . ' 23:59:59')
            ->where('request_end_time', '>=', $_REQUEST['start'] . ' 00:00:00')
            ->get();
        foreach ($guest as $queries) {
            $statusIsNull = is_null($queries['status']);
            if($statusIsNull){
                $status=["bg-warning"];
                $order='b';
            }
            else if($queries['status']){
                $status=["bg-success"];
                $order='a';
            }
            else {
                $status=["bg-danger"];
                $order='c';
            }
            array_push($calendarEvents,
                array(
                    'title' => $queries['guest_org'],
                    'start' => ($statusIsNull||!$queries['status'])?$queries['request_start_time']:$queries['allow_start_time'],
                    'end' => ($statusIsNull||!$queries['status'])?$queries['request_end_time']:$queries['allow_end_time'],
                    'id' => 'g-'.$queries['res_id'],
                    'resourceId' =>$queries['request_room_id'],
                    'allDay' => !(explode(' ',$queries['request_start_time'])[0]==explode(' ',$queries['request_end_time'])[0]),
                    'className' => $status,
                    'order' => $order,
                    'description' => MeetingRoom::where('room_id','=',$queries['request_room_id'])->select('name')->get()[0]->name,
                    'icon' => 'fa-clock-o',
                )
            );
        }
        return json_encode($calendarEvents);
    }

    public function UserSubmitRequest()
    {
        $user = Auth::user();
        if (is_null($user))
            return 'noright';
        if(!is_numeric(input::get('numberOfPeople')))
            return 'peoplenotnumber';
        if((input::get('cord') === 'true'&&!is_numeric(input::get('numberOfCord'))))
            return 'cordnotnumber';
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
        $newUserRequest->request_room_id = (MeetingRoom::where('room_id','=',input::get('room'))->exists())?input::get('room'):'0';
        $newUserRequest->student_id = $user['student_id'];
        if (input::get('otherActActivated') === 'true') {
            $newUserRequest->other_act = input::get('otherAct');
        } else if(input::get('project')&&input::get('project')!=0) {
            $newUserRequest->act_id = input::get('project');
        }
        else {
            return 'noproject';
        }
        if (input::get('otherDivActivated') === 'true') {
            $newUserRequest->other_div = input::get('otherDiv');
        } else if(input::get('division')&&input::get('division')!='0') {
            $newUserRequest->div_id = input::get('division');
        }
        else {
            return 'nodivision';
        }
        $newUserRequest->create_at = Carbon::now();
        $newUserRequest->save();
        return 'success';
    }

    public function GuestSubmitRequest()
    {
        if(!is_numeric(input::get('numberOfPeople')))
            return 'peoplenotnumber';
        if((input::get('cord') === 'true'&&!is_numeric(input::get('numberOfCord'))))
            return 'cordnotnumber';
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
//        return compact('room', 'timeStartDefault', 'timeEndDefault', 'event');

//        for($i=1;$i<=count($room);$i++)
//        {
//            if($room[$i]['status']=="update"){
//                $r = MeetingRoom::where('name',$room[$i]["name"])->first();
//
//                $r->name = $room[$i]["name"];
//                $r->size = $room[$i]["size"];
//                $r->priority = 0;
//                $r->save();
//            }
//            if($room[$i]['status']=="new") {
//                MeetingRoom::insert([
//                    'room_id' => $i,
//                    'name' => $room[$i]["name"],
//                    'size' => $room[$i]["size"],
//                    'priority' => 0
//                ]);
//            }
//        }

        ScheduleSetting::truncate();
        ScheduleSetting::insert([
            'start'=>date('H:i:s',strtotime(str_replace(" ",'',$timeStartDefault))),
            'end'=>date('H:i:s',strtotime(str_replace(" ",'',$timeEndDefault)))
        ]);

        AllowSchedule::truncate();
        for($i=1;$i<=count($event);$i++)
        {
            $start_date = date('Y-m-d',strtotime($event[$i]["date-start"]));
            $end_date = date('Y-m-d',strtotime($event[$i]["date-end"]));
            $start_time = date('H:i:s',strtotime(str_replace(" ",'',$event[$i]['time-start'])));
            $end_time = date('H:i:s',strtotime(str_replace(" ",'',$event[$i]['time-end'])));
//            var_dump($start_time);
            AllowSchedule::insert([
                'id'=> $i,
                'start_date'=> $start_date,
                'end_date'=> $end_date,
                'start_time'=> $start_time,
                'end_time'=> $end_time
            ]);
        }


        $tmp = AllowSchedule::all();
        $tmp2 = ScheduleSetting::all();
        $tmp3 = MeetingRoom::all();
        return compact('tmp', 'event','tmp2','tmp3','room');
        return "success";
        ScheduleSetting::truncate();


        // _dupplicate-data_ "ข้อมูลซ้ำ"
        // _incomplete-data_ "กรอกข้อมูลไม่ครบ"
        return "success";
    }

    public function getUserReservation() {
        $user = Auth::user();
        if(is_null($user))
            return response("login", "500");

        // Currently, Room Staff Only!!!
        $permission = Permission::find($user['student_id']);
        if(is_null($permission) || !$permission->room)
            return response("permission", "500");

        $requestId = Input::get('id');
        if(is_null($requestId))
            return response("requestid", "500");

        $reserve = UserReservation::find($requestId);
        if(is_null($reserve))
            return response("notfound", "500");

        $owner = User::find($reserve->student_id);
        if(is_null($reserve))
            return response("noowner", "500");

        return compact('reserve','owner');
    }

    public function approveReservation() {
        $user = Auth::user();
        if(is_null($user))
            return response("login", "500");

        // Currently, Room Staff Only!!!
        $permission = Permission::find($user['student_id']);
        if(is_null($permission) || !$permission->room)
            return response("permission", "500");

        $res_id = Input::get('res_id');
        if(is_null($res_id))
            return response("noinfo", "500");

        $reserve = UserReservation::find($res_id);
        if(is_null($reserve))
            return response("notfound", "500");

        $owner = User::find($reserve->student_id);
        if(is_null($reserve))
            return response("noowner", "500");

        $status = Input::get('status');
        if(is_null($status))
            return response("noinfo", "500");

        $approver_id = Input::get('approver_id');
        if(is_null($approver_id))
            return response("noinfo", "500");

        $allow_room_id = Input::get('allow_room_id');
        if(is_null($allow_room_id))
            return response("noinfo", "500");

        $allow_start_time = Input::get('allow_start_time');
        if(is_null($allow_start_time))
            return response("noinfo", "500");

        $allow_end_time = Input::get('allow_end_time');
        if(is_null($allow_end_time))
            return response("noinfo", "500");

        $reserve->status = $status;
        $reserve->approver_id = $approver_id;
        $reserve->allow_room_id = $allow_room_id;
        $reserve->allow_start_time = $allow_start_time;
        $reserve->allow_end_time = $allow_end_time;
        $reserve->save();

        return $status == 1 ? "approve":"disapprove";
    }
}
