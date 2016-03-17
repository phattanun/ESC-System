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
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    public function studentsPage()
    {
        $user = $this->getUser();
        $permission = Permission::find($user['student_id']);
        if (is_null($user))
            return redirect('/');
        return view('students', ['permission' => $permission]);
    }

    public function search(Request $request)
    {
        $user = $this->getUser();
        if (is_null($user))
            return redirect('/');
        $permission = Permission::find($user['student_id']);
        $users = User::select(['student_id', 'name', 'surname', 'nickname', 'sex', 'group', 'department', 'generation', 'address', 'birthdate', 'phone_number', 'email', 'facebook_link', 'line_id', 'emergency_contact', 'anomaly', 'allergy', 'religion', 'blood_type', 'clothing_size'])->where(function ($query) use ($request) {
            if ($request->input('studentID')) $query->where('student_id', 'LIKE', '%' . $request->input('studentID') . '%');
            if ($request->input('studentFName')) $query->where('name', 'LIKE', '%' . $request->input('studentFName') . '%');
            if ($request->input('studentLName')) $query->where('surname', 'LIKE', '%' . $request->input('studentLName') . '%');
            if ($request->input('studentNName')) $query->where('nickname', 'LIKE', '%' . $request->input('studentNName') . '%');
        })
            ->whereHas('group', function ($query) use ($request) {
                if ($request->input('studentGroup')) $query->where('name', 'LIKE', '%' . $request->input('studentGroup') . '%')->where('type', '=', 'Group');
            })
            ->whereHas('department', function ($query) use ($request) {
                if ($request->input('studentDept')) $query->where('name', 'LIKE', '%' . $request->input('studentDept') . '%')->where('type', '=', 'Department');
            })
            ->get();
        for ($i = 0; $i < sizeof($users); $i++) {
            $users[$i]->department = Division::select(['name'])->where('div_id', '=', $users[$i]->department)->get();
            $users[$i]->group = Division::select(['name'])->where('div_id', '=', $users[$i]->group)->get();
        }
        return $users;
    }

    public function generateXLS(Request $request)
    {
//        return $_REQUEST;
        $user = $this->getUser();
        if (is_null($user))
            return redirect('/');
        $permission = Permission::find($user['student_id']);
        if ($permission->student) {
            $users = User::select(['student_id', 'name', 'surname', 'nickname', 'sex', 'group', 'department', 'generation', 'address', 'birthdate', 'phone_number', 'email', 'facebook_link', 'line_id', 'emergency_contact', 'anomaly', 'allergy', 'religion', 'blood_type', 'clothing_size'])->where(function ($query) use ($request) {
                if ($request->input('studentID')) $query->where('student_id', 'LIKE', '%' . $request->input('studentID') . '%');
                if ($request->input('studentFName')) $query->where('name', 'LIKE', '%' . $request->input('studentFName') . '%');
                if ($request->input('studentLName')) $query->where('surname', 'LIKE', '%' . $request->input('studentLName') . '%');
                if ($request->input('studentNName')) $query->where('nickname', 'LIKE', '%' . $request->input('studentNName') . '%');
            })
                ->whereHas('group', function ($query) use ($request) {
                    if ($request->input('studentGroup')) $query->where('name', 'LIKE', '%' . $request->input('studentGroup') . '%')->where('type', '=', 'Group');
                })
                ->whereHas('department', function ($query) use ($request) {
                    if ($request->input('studentDept')) $query->where('name', 'LIKE', '%' . $request->input('studentDept') . '%')->where('type', '=', 'Department');
                })
                ->orderby('student_id')
                ->get();
        } else {
            $users = User::select(['student_id', 'name', 'surname', 'nickname', 'sex', 'group', 'department', 'generation'])->where(function ($query) use ($request) {
                if ($request->input('studentID')) $query->where('student_id', 'LIKE', '%' . $request->input('studentID') . '%');
                if ($request->input('studentFName')) $query->where('name', 'LIKE', '%' . $request->input('studentFName') . '%');
                if ($request->input('studentLName')) $query->where('surname', 'LIKE', '%' . $request->input('studentLName') . '%');
                if ($request->input('studentNName')) $query->where('nickname', 'LIKE', '%' . $request->input('studentNName') . '%');
            })
                ->whereHas('group', function ($query) use ($request) {
                    if ($request->input('studentGroup')) $query->where('name', 'LIKE', '%' . $request->input('studentGroup') . '%')->where('type', '=', 'Group');
                })
                ->whereHas('department', function ($query) use ($request) {
                    if ($request->input('studentDept')) $query->where('name', 'LIKE', '%' . $request->input('studentDept') . '%')->where('type', '=', 'Department');
                })
                ->orderby('student_id')
                ->get();
        }
        Excel::create('ข้อมูลนิสิตจากการค้นหาของ' . $user->name, function ($excel) use ($users, $permission) {
            $excel->setTitle('ข้อมูลนิสิต');
            $excel->setCreator('กรรมการนิสิตคณะวิศวกรรมศาสตร์')
                ->setCompany('กรรมการนิสิตคณะวิศวกรรมศาสตร์');
            $excel->setDescription('ข้อมูลนิสิตที่ต้องการจากการค้นหา');
            $excel->sheet('ข้อมูลนิสิต', function ($sheet) use ($users, $permission) {
                $sheet->fromArray($users, null, 'A2', true, false);
                if ($permission->student)
                    $sheet->row(1, array(
                        'รหัสนิสิต', 'ชื่อ', 'นามสกุล', 'ชื่อเล่น', 'เพศ', 'กรุ๊ป', 'ภาค', 'รุ่น', 'ที่อยู่', 'วันเกิด', 'เบอร์โทรศัพท์', 'อีเมล', 'Facebook', 'Line ID', 'เบอร์โทรติดต่อกรณีฉุกเฉิน', 'อาหารที่แพ้', 'ภูมิแพ้', 'ศาสนา', 'กรุ๊ปเลือด', 'ไซส์เสื้อ'
                    ));
                else {
                    $sheet->row(1, array(
                        'รหัสนิสิต', 'ชื่อ', 'นามสกุล', 'ชื่อเล่น', 'เพศ', 'กรุ๊ป', 'ภาค', 'รุ่น'
                    ));
                }
            });

        })->download('xlsx');
        return 'success';
    }
}
