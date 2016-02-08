@extends('masterpage')

@section('title')
    ตั้งค่าระบบ
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('bodyTitle')
    ตั้งค่าระบบ
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="บันทึกสำเร็จ!" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            <input name="action" value="contact_send" type="hidden">

                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20">ปีการศึกษา </label>
                                        <label class="margin-bottom-20 currentYear pull-left">{{$year}}</label>
                                        <div id="editYearButton" class="pull-left">
                                            <a type="submit" class="btn btn-3d btn-reveal btn-yellow">
                                                <i class="fa fa-edit"></i>
                                                <span>แก้ไข</span>
                                            </a>
                                        </div>
                                        <input id = "yearEditBox" name="year" class="form-control required pull-left hideEditYear" type="text">
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        <div class="row hideEditYear">
                            <div class="col-md-1">
                                <button id="saveYearButton" type="submit" class="btn btn-3d btn-reveal btn-green ">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </button>
                            </div>
                            <div class="col-md-offset-1 col-md-1 ">
                                <a id="cancelYearButton" class="btn btn-3d btn-reveal btn-red ">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div><div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="php/contact.php" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
                        <fieldset>
                            <input name="action" value="contact_send" type="hidden">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20 ">เพิ่มผู้จัดการข้อมูล</label>
                                        <div class="input-group autosuggest" data-minLength="1" data-queryURL="php/view/demo.autosuggest.php?limit=10&search=">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="studentInfo" name="studentInfo" class="form-control typeahead required" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success">เพิ่ม</button>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="table-responsive margin-bottom-30">
                            <table class="table nomargin">
                                <tr >
                                    <th style="vertical-align:middle" rowspan="2"></th>
                                    <th style="vertical-align:middle" rowspan="2">รหัสนิสิต</th>
                                    <th style="vertical-align:middle" rowspan="2">ชื่อ</th>
                                    <th style="vertical-align:middle" rowspan="2">นามสกุล</th>
                                    <th class="text-center" colspan="5">สิทธิ์ในการจัดการ<br></th>
                                </tr>
                                <tr class="text-center">
                                    <td>ประกาศ<br></td>
                                    <td>ห้องประชุม</td>
                                    <td>พัสดุ</td>
                                    <td>กิจกรรม<br></td>
                                    <td>ข้อมูลนิสิต</td>
                                </tr>
                                @foreach($permission_users as $permission_user)
                                    <tr >
                                        <td class="text-center"><a  class="social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">
                                            <i class="fa fa-minus"></i>
                                            <i class="fa fa-minus"></i>
                                        </a></td>
                                        <td>{{$permission_user['student_id']}}</td>
                                        <td>{{$permission_user['name']}}</td>
                                        <td>{{$permission_user['surname']}}</td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input  name="privilege" value="announce" @if($permission_user['news']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input name="privilege" value="room" type="checkbox" @if($permission_user['room']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input   name="privilege" value="supplies" type="checkbox" @if($permission_user['supplies']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input  name="privilege" value="activity" type="checkbox" @if($permission_user['activities']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input name="privilege" value="student" @if($permission_user['student']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                {{--<tr >--}}
                                    {{--<td class="text-center"><a  class="social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                        {{--</a></td>--}}
                                    {{--<td>5631011021</td>--}}
                                    {{--<td>นายพัทธนันท์</td>--}}
                                    {{--<td>อัครพันธุ์ธัช</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="announce" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="room" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input   name="privilege" value="supplies" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="activity" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="student" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr >--}}
                                    {{--<td class="text-center"><a  class="social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                        {{--</a></td>--}}
                                    {{--<td>5631011021</td>--}}
                                    {{--<td>นายพัทธนันท์</td>--}}
                                    {{--<td>อัครพันธุ์ธัช</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="announce" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="room" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input   name="privilege" value="supplies" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="activity" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="student" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr >--}}
                                    {{--<td class="text-center"><a  class="social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                            {{--<i class="fa fa-minus"></i>--}}
                                        {{--</a></td>--}}
                                    {{--<td>5631011021</td>--}}
                                    {{--<td>นายพัทธนันท์</td>--}}
                                    {{--<td>อัครพันธุ์ธัช</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="announce" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="room" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input   name="privilege" value="supplies" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input  name="privilege" value="activity" type="checkbox" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<label class="switch switch-success">--}}
                                            {{--<input name="privilege" value="student" checked="" type="checkbox">--}}
                                            {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                        {{--</label>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <a type="submit" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </a>
                            </div>
                            <div class="col-md-offset-1 col-md-1">
                                <a class="btn btn-3d btn-reveal btn-red">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('css')
    <link href="{{url('assets/css/setting.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script>
        function main () {
            $("#editYearButton").click(function () {
                $(".currentYear").hide();
                $("#yearEditBox").val($(".currentYear").text());
                $(".hideEditYear").show();
                $(this).hide();
            });
            $("#cancelYearButton").click(function () {
                $(".currentYear").show();
                $("#editYearButton").show();
                $(".hideEditYear").hide();
            });
        }
        $( document ).ready(main);
    </script>
@endsection
