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
use Illuminate\Support\Facades\DB;
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
        $announcement = ScheduleSetting::first();
        $permission = Permission::find($user['student_id']);
        $activity = Activity::select('act_id', 'name')->get();
        $department = Division::select('div_id', 'name')->where('type', '=', 'Department')->get();
        $generation = Division::select('div_id', 'name')->where('type', '=', 'Generation')->get();
        $group = Division::select('div_id', 'name')->where('type', '=', 'Group')->get();
        $room = MeetingRoom::select('room_id', 'name')->get();
        if (is_null($user))
            return view('room-reserve', ['permission' => $permission, 'user' => $user, 'room' => $room, 'announcement' => $announcement]);
        return view('room-reserve', ['permission' => $permission, 'user' => $user, 'activity' => $activity, 'department' => $department, 'generation' => $generation, 'group' => $group, 'room' => $room, 'announcement' => $announcement]);
    }

    public function getMap()
    {
        return ScheduleSetting::select('image')->first()['image'];
    }

    public function viewApprovePage()
    {
        $user = Auth::user();
        $permission = Permission::find($user['student_id']);
        return view('room-approve');
    }

    public function editAnnouncement()
    {
        $user = Auth::user();
        if (is_null($user))
            return response("login", "500");
        $permission = Permission::find($user['student_id']);
        if (is_null($permission) || !$permission->room)
            return response("permission", "500");

        DB::table('schedule_settings')
            ->update(['announcement' => $_POST['announcement']]);
        return redirect('/room/reserve');
    }

    public function getMeetingRoom()
    {
        $roomList = [];
        $rooms = MeetingRoom::all();
        foreach ($rooms as $room) {
            if ($room->closed)
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
            if (MeetingRoom::find($queries['request_room_id']) == null || MeetingRoom::find($queries['request_room_id'])->closed)
                continue;
            if ($queries['act_id']) {
                $title = Activity::where('act_id', '=', $queries['act_id'])->select('name')->get()[0]->name;
            } else {
                $title = $queries['other_act'];
            }
            if ($queries['div_id']) {
                $div = Division::where('div_id', '=', $queries['div_id'])->select('name')->get()[0]->name;
            } else {
                $div = $queries['other_div'];
            }
            $title .= " " . $div;
            $statusIsNull = is_null($queries['status']);
            if ($statusIsNull) {
                $status = ["bg-warning"];
                $order = 1;
            } else if ($queries['status']) {
                $status = ["bg-success"];
                $order = 0;
            } else {
                $status = ["bg-danger"];
                $order = 2;
            }
            array_push($calendarEvents,
                array(
                    'title' => $title,
                    'start' => (!is_null($queries['allow_start_time']) ? $queries['allow_start_time'] : $queries['request_start_time']),
                    'end' => (!is_null($queries['allow_end_time']) ? $queries['allow_end_time'] : $queries['request_end_time']),
                    'id' => 'u-' . $queries['res_id'],
                    'request_room_id' => "" . $queries['request_room_id'],
                    'resourceId' => (!is_null($queries['allow_room_id']) ? $queries['allow_room_id'] : $queries['request_room_id']),
//                    'allDay' => !(explode(' ', $queries['request_start_time'])[0] == explode(' ', $queries['request_end_time'])[0]),
                    'allDay' => false,
                    'default_className' => $status,
                    'className' => $status,
                    'order' => $order,
                    'description' => MeetingRoom::where('room_id', '=', $queries['request_room_id'])->select('name')->get()[0]->name,
                    'icon' => 'fa-clock-o',
                )
            );
        }

        $guest = GuestReservation::where('request_start_time', '<=', $_REQUEST['end'] . ' 23:59:59')
            ->where('request_end_time', '>=', $_REQUEST['start'] . ' 00:00:00')
            ->get();
        foreach ($guest as $queries) {
            if (MeetingRoom::find($queries['request_room_id']) == null || MeetingRoom::find($queries['request_room_id'])->closed)
                continue;
            $statusIsNull = is_null($queries['status']);
            if ($statusIsNull) {
                $status = ["bg-warning"];
                $order = 1;
            } else if ($queries['status']) {
                $status = ["bg-success"];
                $order = 0;
            } else {
                $status = ["bg-danger"];
                $order = 2;
            }
            array_push($calendarEvents,
                array(
                    'title' => $queries['guest_org'],
                    'start' => ($statusIsNull || !$queries['status']) ? $queries['request_start_time'] : $queries['allow_start_time'],
                    'end' => ($statusIsNull || !$queries['status']) ? $queries['request_end_time'] : $queries['allow_end_time'],
                    'id' => 'g-' . $queries['res_id'],
                    'resourceId' => $queries['request_room_id'],
//                    'allDay' => !(explode(' ', $queries['request_start_time'])[0] == explode(' ', $queries['request_end_time'])[0]),
                    'allDay' => false,
                    'className' => $status,
                    'order' => $order,
                    'description' => MeetingRoom::where('room_id', '=', $queries['request_room_id'])->select('name')->get()[0]->name,
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
        if (!is_numeric(input::get('numberOfPeople')))
            return 'peoplenotnumber';
        if ((input::get('cord') === 'true' && !is_numeric(input::get('numberOfCord'))))
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
        $newUserRequest->request_room_id = (MeetingRoom::where('room_id', '=', input::get('room'))->exists()) ? input::get('room') : '0';
        $newUserRequest->student_id = $user['student_id'];
        if (input::get('otherActActivated') === 'true') {
            $newUserRequest->other_act = input::get('otherAct');
        } else if (input::get('project') && input::get('project') != 0) {
            $newUserRequest->act_id = input::get('project');
        } else {
            return 'noproject';
        }
        if (input::get('otherDivActivated') === 'true') {
            $newUserRequest->other_div = input::get('otherDiv');
        } else if (input::get('division') && input::get('division') != '0') {
            $newUserRequest->div_id = input::get('division');
        } else {
            return 'nodivision';
        }
        $newUserRequest->create_at = Carbon::now();
        $newUserRequest->save();
        return 'success';
    }

    public function GuestSubmitRequest()
    {
        if (!is_numeric(input::get('numberOfPeople')))
            return 'peoplenotnumber';
        if ((input::get('cord') === 'true' && !is_numeric(input::get('numberOfCord'))))
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

    public function roomManagePage()
    {
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if (is_null($user) || !$permission || !$permission->room)
            return redirect('/');

        $timeDefault = ScheduleSetting::first();
        $events = AllowSchedule::all();
        $rooms = MeetingRoom::where('deleted', '0')->get();

        $tmp = MeetingRoom::all();

        $count_events = count($events);
        $count_rooms = count($tmp);

        $timeDefault['start'] = date('H : i', strtotime(str_replace(" ", '', $timeDefault['start'])));
        $timeDefault['end'] = date('H : i', strtotime(str_replace(" ", '', $timeDefault['end'])));

        foreach ($events as $event) {
            $event["start_date"] = date('d-m-Y', strtotime($event['start_date']));
            $event['end_date'] = date('d-m-Y', strtotime($event['end_date']));
            $event['start_time'] = date('H : i', strtotime(str_replace(" ", '', $event['start_time'])));
            $event['end_time'] = date('H : i', strtotime(str_replace(" ", '', $event['end_time'])));
        }
//        return compact('timeDefault', 'events', 'rooms');
//        return compact('rooms', 'timeStartDefault', 'timeEndDefault', 'events');
        return view('room-manage', compact('timeDefault', 'events', 'rooms', 'count_events', 'count_rooms'));
    }

    public function editRoom()
    {
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if (is_null($user) || !$permission || !$permission->room)
            return redirect('/');

        $timeStartDefault = Input::get('time-start-default');
        $timeEndDefault = Input::get('time-end-default');
        $room = Input::get('room');
        $event = Input::get('event');
//        return "echo:555";
//        if(in_array('on', $room[1])) return "a"; else return "b";


//เช็คเวลาdefault เวลาเริ่มห้ามอยู่หลังเวลสจบ
        $timeStartDefault = date('H:i:s', strtotime(str_replace(" ", '', $timeStartDefault)));
        $timeEndDefault = date('H:i:s', strtotime(str_replace(" ", '', $timeEndDefault)));

        if ($timeStartDefault > $timeEndDefault) {
            return "echo:เวลาที่เปิดอนุญาตให้จองห้องได้อยู่หลังเวลาปิด";
        }
//        return compact('room', 'timeStartDefault', 'timeEndDefault', 'event');
//เช็คชื่อห้องประชุมห้ามซ้ำกัน
        foreach ($room as $roomI) {
            $nameA = $roomI['name'];
            foreach ($room as $roomJ) {
                $nameB = $roomJ['name'];
                if ($roomI != $roomJ && $nameA == $nameB) {
                    return 'echo:ห้องประชุม"' . $nameA . '" ชื่อซ้ำกันสองห้อง กรุณาแก้ไข';
                }
            }
        }

//เช็คกรณีพิเศษหนึ่งๆ ห้ามมีวันเริ่มอยู่หลังวันจบ ห้ามมีเวลาเริ่มอยู่หลังเวลาจบ
        for ($i = 1; $i <= count($event); $i++) {
            $start_date = date('Y-m-d', strtotime($event[$i]["date-start"]));
            $end_date = date('Y-m-d', strtotime($event[$i]["date-end"]));
            $start_time = date('H:i:s', strtotime(str_replace(" ", '', $event[$i]['time-start'])));
            $end_time = date('H:i:s', strtotime(str_replace(" ", '', $event[$i]['time-end'])));

            if ($start_time > $end_time) {
                return "echo:กรณีพิเศษ วันที่ " . $event[$i]["date-start"] . " ถึง " . $event[$i]["date-end"] . " มีเวลาเปิดห้องอยู่หลังเวลาปิดห้อง กรุณาแก้ไข";
            }
            if ($start_date > $end_date) {
                return "echo:กรณีพิเศษ วันที่ " . $event[$i]["date-start"] . " ถึง " . $event[$i]["date-end"] . " วันเริ่มต้นอยู่หลังวันสิ้นสุด กรุณาแก้ไข";
            }
        }

//เช็คกรณีพิเศษ วันห้ามเหลื่อมกัน
        for ($i = 1; $i <= count($event); $i++) {
            $start_date_A = date('Y-m-d', strtotime($event[$i]["date-start"]));
            $end_date_A = date('Y-m-d', strtotime($event[$i]["date-end"]));
            for ($j = $i + 1; $j <= count($event); $j++) {
                $start_date_B = date('Y-m-d', strtotime($event[$j]["date-start"]));
                $end_date_B = date('Y-m-d', strtotime($event[$j]["date-end"]));
                if (($start_date_A >= $start_date_B && $start_date_A <= $end_date_B) || ($end_date_A >= $start_date_B && $end_date_A <= $end_date_B)) {
                    return "echo:กรณีพิเศษ วันที่ " . $event[$i]["date-start"] . " ถึง " . $event[$i]["date-end"] . " มีวันซ้ำซ้อนกับ " . 'กรณีพิเศษ วันที่ ' . $event[$j]["date-start"] . " ถึง " . $event[$j]["date-end"];
                }
            }
        }

//        return compact('room', 'timeStartDefault', 'timeEndDefault', 'event');

        $count_rooms = count(MeetingRoom::all());
        foreach ($room as $ro) {
            if ($ro['status'] == "update") {
                $r = MeetingRoom::where('room_id', $ro['id'])->first();

                $r->name = $ro["name"];
                $r->size = $ro["size"];
                $r->priority = $ro['priority'];
                if (in_array('on', $ro))
                    $r->closed = '0';
                else
                    $r->closed = '1';
                $r->save();
            }
            if ($ro['id'] > $count_rooms) {
                if (in_array('on', $ro))
                    $c = '0';
                else
                    $c = '1';

                if ($ro['status'] == "new")
                    $d = '0';
                else if ($ro['status'] == "deleted")
                    $d = '1';
                else $d = '0';

                MeetingRoom::insert([
                    'room_id' => $ro['id'],
                    'name' => $ro["name"],
                    'size' => $ro["size"],
                    'priority' => $ro['priority'],
                    'closed' => $c,
                    'deleted' => $d
                ]);
            }
        }
        foreach ($room as $ro) {
            $r = MeetingRoom::where('room_id', $ro['id'])->first();

            if (in_array('on', $ro))
                $r->closed = '0';
            else
                $r->closed = '1';
            $r->save();
        }

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
            'start' => date('H:i:s', strtotime(str_replace(" ", '', $timeStartDefault))),
            'end' => date('H:i:s', strtotime(str_replace(" ", '', $timeEndDefault)))
        ]);

        AllowSchedule::truncate();
        for ($i = 1; $i <= count($event); $i++) {
            $start_date = date('Y-m-d', strtotime($event[$i]["date-start"]));
            $end_date = date('Y-m-d', strtotime($event[$i]["date-end"]));
            $start_time = date('H:i:s', strtotime(str_replace(" ", '', $event[$i]['time-start'])));
            $end_time = date('H:i:s', strtotime(str_replace(" ", '', $event[$i]['time-end'])));
            if (in_array('on', $event[$i])) $status = false; else $status = true;
//            var_dump($start_time);
            AllowSchedule::insert([
                'id' => $i,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'room_closed' => $status
            ]);
        }


//        $tmp = AllowSchedule::all();
//        $tmp2 = ScheduleSetting::all();
//        $tmp3 = MeetingRoom::all();
//        return compact('tmp', 'event','tmp2', 'timeStartDefault', 'timeEndDefault','tmp3','room');
        return "success";
//        ScheduleSetting::truncate();


        // _dupplicate-data_ "ข้อมูลซ้ำ"
        // _incomplete-data_ "กรอกข้อมูลไม่ครบ"
//        return "success";
    }

    public function editImage(Request $request)
    {
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if (is_null($user) || !$permission || !$permission->room)
            return redirect('/');

        if ($request->hasFile('image')) {
            if ($request->file('image')->getClientSize() > 100000)
                die;
            $imageData = 'data:' . $request->file('image')->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($request->image));
        } else $imageData = false;

        if ($imageData)
            DB::table('schedule_settings')
                ->update(['image' => $imageData]);

        return "success";
    }

    public function getUserReservation()
    {
        $user = Auth::user();
        if (is_null($user))
            return response("login", "500");

        // Currently, Room Staff Only!!!
        $permission = Permission::find($user['student_id']);
        if (is_null($permission) || !$permission->room)
            return response("permission", "500");

        $requestId = Input::get('id');
        if (is_null($requestId))
            return response("requestid", "500");

        $reserve = UserReservation::find($requestId);
        if (is_null($reserve))
            return response("notfound", "500");

        $owner = User::find($reserve->student_id);
        if (is_null($reserve))
            return response("noinfo", "500");

        $department = Division::find($owner->department)->name;
        $room = MeetingRoom::find($reserve->request_room_id);
        if ($reserve->approver_id != NULL)
            $approver = User::find($reserve->approver_id);
        if (is_null($room))
            return response("noinfo", "500");

        $title = array(
            "type" => "นิสิตคณะวิศวฯ",
            "type-sign" => "u",
            "approver" => (!is_null($reserve->status) ? (isset($approver) ? $approver->name : "ไม่มีข้อมูล") : null),
            "status" => $reserve->status
        );

        $owner = array(
            "student_id" => $owner->student_id,
            "name" => $owner->name,
            "surname" => $owner->surname,

            "nickname" => $owner->nickname,
            "generation" => $owner->generation,

            "department" => $department,
            "facebook_link" => $owner->facebook_link,
            "phone_number" => $owner->phone_number,
            "email" => $owner->email
        );

        $reserve = array(
            "activity" => (!is_null($reserve->act_id)) ? Activity::find($reserve->act_id)->name : $reserve->other_act,
            "organization" => (!is_null($reserve->div_id)) ? Division::find($reserve->div_id)->name : $reserve->other_div,
            "room_name" => $room->name,
            "number_of_people" => $reserve->number_of_people,
            "request_start_time" => $reserve->request_start_time,
            "request_end_time" => $reserve->request_end_time,
            "request_projector" => $reserve->request_projector,
            "request_plug" => $reserve->request_plug,
            "allow_start_time" => $reserve->allow_start_time,
            "allow_end_time" => $reserve->allow_end_time,
            "allow_projector" => $reserve->allow_projector,
            "allow_plug" => $reserve->allow_plug,
            "reason" => $reserve->reason,
            "reason_if_not_approve" => $reserve->reason_if_not_approve,

            // Input
            "res_id" => $reserve->res_id,
            "request_room_id" => $reserve->request_room_id
        );

        $title = array_filter($title, function ($var) {
            return !is_null($var);
        });
        $owner = array_filter($owner, function ($var) {
            return !is_null($var);
        });
        $reserve = array_filter($reserve, function ($var) {
            return !is_null($var);
        });

        return compact('title', 'reserve', 'owner');
    }

    public function getGuestReservation()
    {
        $user = Auth::user();
        if (is_null($user))
            return response("login", "500");

        // Currently, Room Staff Only!!!
        $permission = Permission::find($user['student_id']);
        if (is_null($permission) || !$permission->room)
            return response("permission", "500");

        $requestId = Input::get('id');
        if (is_null($requestId))
            return response("requestid", "500");

        $reserve = GuestReservation::find($requestId);
        if (is_null($reserve))
            return response("notfound", "500");

        $room = MeetingRoom::find($reserve->request_room_id);
        if ($reserve->approver_id != NULL)
            $approver = User::find($reserve->approver_id);
        if (is_null($room))
            return response("noinfo", "500");

        $title = array(
            "type" => "บุคคลภายนอก",
            "type-sign" => "g",
            "approver" => (!is_null($reserve->status) ? (isset($approver) ? $approver->name : "ไม่มีข้อมูล") : null),
            "status" => $reserve->status
        );

        $owner = array(
            "student_id" => $reserve->guest_student_id,
            "name" => $reserve->guest_name,
            "surname" => $reserve->guest_surname,

            "department" => $reserve->guest_faculty,

            "phone_number" => $reserve->guest_phone_number,
            "email" => $reserve->guest_email
        );

        $reserve = array(
            "res_id" => $reserve->res_id,
            "organization" => $reserve->guest_org,
            "room_name" => $room->name,
            "number_of_people" => $reserve->number_of_people,
            "request_start_time" => $reserve->request_start_time,
            "request_end_time" => $reserve->request_end_time,
            "request_projector" => $reserve->request_projector,
            "request_plug" => $reserve->request_plug,
            "allow_start_time" => $reserve->allow_start_time,
            "allow_end_time" => $reserve->allow_end_time,
            "allow_projector" => $reserve->allow_projector,
            "allow_plug" => $reserve->allow_plug,
            "reason" => $reserve->reason,
            "reason_if_not_approve" => $reserve->reason_if_not_approve,

            // Input
            "res_id" => $reserve->res_id,
            "request_room_id" => $reserve->request_room_id
        );

        $title = array_filter($title, function ($var) {
            return !is_null($var);
        });
        $owner = array_filter($owner, function ($var) {
            return !is_null($var);
        });
        $reserve = array_filter($reserve, function ($var) {
            return !is_null($var);
        });

        return compact('title', 'reserve', 'owner');
    }

    public function approveReservation()
    {
        $user = Auth::user();
        if (is_null($user))
            return response("login", "500");

        // Currently, Room Staff Only!!!
        $permission = Permission::find($user['student_id']);
        if (is_null($permission) || !$permission->room)
            return response("permission", "500");

        $res_id = Input::get('res_id');
        if (is_null($res_id))
            return response("noinfo", "500");

        $type = Input::get('type');
        if (is_null($type))
            return response("notfound", "500");

        if ($type == "u") {
            $reserve = UserReservation::find($res_id);
            if (is_null($reserve))
                return response("notfound", "500");
            $owner = User::find($reserve->student_id);
            if (is_null($reserve))
                return response("noinfo", "500");
        } else {
            $reserve = GuestReservation::find($res_id);
            if (is_null($reserve))
                return response("notfound", "500");
        }

        $status = Input::get('status');
        if (is_null($status))
            return response("noinfo", "500");

        $approver_id = Input::get('approver_id');
        if (is_null($approver_id))
            return response("noinfo", "500");

        $allow_room_id = Input::get('allow_room_id');
        if (is_null($allow_room_id))
            return response("noinfo", "500");

        $allow_start_time = Input::get('allow_start_time');
        if (is_null($allow_start_time))
            return response("noinfo", "500");

        $allow_end_time = Input::get('allow_end_time');
        if (is_null($allow_end_time))
            return response("noinfo", "500");

        $reason = Input::get("reason_if_not_approve");

        $reserve->status = $status;
        $reserve->approver_id = $approver_id;
        $reserve->approve_at = date('Y-m-d H:i:s');
        if ($status) {
            $reserve->allow_room_id = $allow_room_id;
            $reserve->allow_start_time = $allow_start_time;
            $reserve->allow_end_time = $allow_end_time;
        } else {
            $reserve->reason_if_not_approve = $reason;
            $reserve->allow_room_id = null;
            $reserve->allow_start_time = null;
            $reserve->allow_end_time = null;
        }
        $reserve->save();

        return $type . ($status == 1 ? "approve" : "disapprove");
    }

    public function roomSearchQuery()
    {
        $user = $this->getUser();
        if (is_null($user))
            return redirect('/');

        $activity = Activity::select('act_id', 'name')->get();
        $department = Division::select('div_id', 'name', 'short_name')->where('type', '=', 'Department')->get();
        $generation = Division::select('div_id', 'name')->where('type', '=', 'Generation')->get();
        $group = Division::select('div_id', 'name')->where('type', '=', 'Group')->get();
        $club = Division::select('div_id', 'name')->where('type', '=', 'Club')->get();

        return view('room-search', ['type' => 'search', 'department' => $department, 'generation' => $generation, 'group' => $group, 'club' => $club, 'activity' => $activity]);
    }

    public function roomReportQuery()
    {
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if (is_null($user) || !$permission || !$permission->student)
            return redirect('/');

        $activity = Activity::select('act_id', 'name')->get();
        $department = Division::select('div_id', 'name', 'short_name')->where('type', '=', 'Department')->get();
        $generation = Division::select('div_id', 'name')->where('type', '=', 'Generation')->get();
        $group = Division::select('div_id', 'name')->where('type', '=', 'Group')->get();
        $club = Division::select('div_id', 'name')->where('type', '=', 'Club')->get();

        return view('room-search', ['type' => 'report', 'department' => $department, 'generation' => $generation, 'group' => $group, 'club' => $club, 'activity' => $activity]);
    }

    public function roomResult(Request $request)
    {
        $user = $this->getUser();
        if (is_null($user))
            return redirect('/');
        $permission = Permission::find($user['student_id']);

        $reservation = [];
        if ($request->input('type') == 'search') {

            $reservation = UserReservation::where(function ($query) use ($request, $user) {
                $query->where('student_id', '=', $user['student_id']);
                if ($request->input('startDate') && $request->input('endDate')) $query->where('request_start_time', '>=', $request->input('startDate'), 'AND', 'request_end_time', '<', $request->input('endDate'));
                else if ($request->input('startDate')) $query->where('request_start_time', '>=', $request->input('startDate'));
                else if ($request->input('endDate')) $query->where('request_end_time', '<=', $request->input('endDate'));
                if ($request->input('activity')) $query->where('act_id', '=', $request->input('activity'));
                if ($request->input('division')) $query->where('div_id', '=', $request->input('division'));
            })
                /*
                ->with('division','activity')
                ->whereHas('division', function ($query) use ($request) {
                    if ($request->input('division')) $query->where('div_id', '=', $request->input('division'));
                })
                ->whereHas('activity', function ($query) use ($request) {
                    if ($request->input('activity')) $query->where('act_id', '=', $request->input('activity'));
                })
                */
                ->leftjoin('activities', 'user_reservation.act_id', '=', 'activities.act_id')
                ->leftjoin('divisions', 'user_reservation.div_id', '=', 'divisions.div_id')
                ->leftjoin('meeting_rooms', 'user_reservation.allow_room_id', '=', 'meeting_rooms.room_id')
                ->select('meeting_rooms.name as mt_name','activities.name as act_name','divisions.name as div_name','reason','number_of_people','request_start_time','request_end_time','user_reservation.status','allow_room_id','reason_if_not_approve','allow_projector','allow_plug','request_projector','request_plug','other_div','other_act')
                ->get();
        }
        if ($request->input('type') == 'report' && $permission && $permission->room) {

            if ($request->input('userType') == 0 || $request->input('userType') == 'user')
                $reservation = UserReservation::where(function ($query) use ($request, $user) {
                    if ($request->input('startDate') && $request->input('endDate')) $query->where('request_start_time', '>=', $request->input('startDate'), 'AND', 'request_end_time', '<', $request->input('endDate'));
                    else if ($request->input('startDate')) $query->where('request_start_time', '>=', $request->input('startDate'));
                    else if ($request->input('endDate')) $query->where('request_end_time', '<=', $request->input('endDate'));
                    if ($request->input('activity')) $query->where('act_id', '=', $request->input('activity'));
                    if ($request->input('division')) $query->where('div_id', '=', $request->input('division'));
                })
                    ->leftjoin('activities', 'user_reservation.act_id', '=', 'activities.act_id')
                    ->leftjoin('divisions', 'user_reservation.div_id', '=', 'divisions.div_id')
                    ->leftjoin('meeting_rooms', 'user_reservation.allow_room_id', '=', 'meeting_rooms.room_id')
                    ->leftjoin('users','user_reservation.student_id','=','users.student_id')
                    ->select('users.nickname','phone_number','users.student_id as student_id','users.surname','users.name as user_name','meeting_rooms.name as mt_name','activities.name as act_name','divisions.name as div_name','reason','number_of_people','request_start_time','request_end_time','user_reservation.status','allow_room_id','reason_if_not_approve','allow_projector','allow_plug','request_projector','request_plug','other_div','other_act')
                    ->get();

            if (($request->input('userType') == 0 || $request->input('userType') == 'guest'))
                $reservation = array_merge($reservation->toArray(), GuestReservation::where(function ($query) use ($request) {
                    if ($request->input('startDate') && $request->input('endDate')) $query->where('request_start_time', '>=', $request->input('startDate'), 'AND', 'request_end_time', '<', $request->input('endDate'));
                    else if ($request->input('startDate')) $query->where('request_start_time', '>=', $request->input('startDate'));
                    else if ($request->input('endDate')) $query->where('request_end_time', '<=', $request->input('endDate'));
                })
                    ->leftjoin('meeting_rooms', 'guest_reservation.allow_room_id', '=', 'meeting_rooms.room_id')
                    ->select('guest_surname as surname','guest_org as div_name','guest_phone_number as phone_number','guest_faculty as faculty','guest_student_id as student_id','guest_surname','guest_name as user_name','meeting_rooms.name as mt_name','reason','number_of_people','request_start_time','request_end_time','guest_reservation.status','allow_room_id','reason_if_not_approve','allow_projector','allow_plug','request_projector','request_plug')
                    ->get()->toArray());
        }

        if (sizeof($reservation) == 0) return 'fail';
        return $reservation;
    }
}
