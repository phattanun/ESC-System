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
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_year'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>window.location='{{url()}}/setting';</script>" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20">ปีการศึกษา </label>
                                        <label class="margin-bottom-20 currentYear pull-left">{{$year}}</label>
                                        <div id="editYearButton" class="pull-left">
                                            <a class="btn btn-3d btn-reveal btn-yellow">
                                                <i class="fa fa-edit"></i>
                                                <span>แก้ไข</span>
                                            </a>
                                        </div>
                                        <input id = "yearEditBox"  name="year" class="form-control required pull-left hideEditYear" type="text">
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                        <div class="row hideEditYear ">
                            <div class="col-md-1">
                                <button id="saveYearButton" type="submit" class="btn btn-3d btn-reveal btn-green ">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </button>
                            </div>
                            <div class="col-md-1 text-center">
                                <span class="loading-icon"></span>
                            </div>
                            <div >
                            </div>
                            <div class="col-md-1 ">
                                <a id="cancelYearButton" class="btn btn-3d btn-reveal btn-red ">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_permission'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20 ">เพิ่มผู้จัดการข้อมูล</label>
                                        <div class="input-group autosuggest" data-minLength="1" data-queryURL="{{url('setting/auto_suggest?limit=10&search=1')}}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                            <span class="input-group-btn" id="add-new-permission-btn">
                                                <a class="btn btn-success">เพิ่ม</a>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="table-responsive margin-bottom-30">
                            <table class="table nomargin" id="permission-table">
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
                                    <tr id="tuple-{{$permission_user['student_id']}}"><input type="hidden" id="delete-{{$permission_user['student_id']}}" name="privilege[{{$permission_user['student_id']}}][]" value="" />
                                        <td class="text-center"><a id="{{$permission_user['student_id']}}" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">
                                            <i class="fa fa-minus"></i>
                                            <i class="fa fa-trash"></i>
                                        </a></td>
                                        <td><input type="hidden" name="student_id[]" value="{{$permission_user['student_id']}}"/>{{$permission_user['student_id']}}</td>
                                        <td>{{$permission_user['name']}}</td>
                                        <td>{{$permission_user['surname']}}</td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input  name="privilege[{{$permission_user['student_id']}}][]" value="announce" @if($permission_user['news']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input name="privilege[{{$permission_user['student_id']}}][]" value="room" type="checkbox" @if($permission_user['room']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input   name="privilege[{{$permission_user['student_id']}}][]" value="supplies" type="checkbox" @if($permission_user['supplies']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input  name="privilege[{{$permission_user['student_id']}}][]" value="activity" type="checkbox" @if($permission_user['activities']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="switch switch-success">
                                                <input name="privilege[{{$permission_user['student_id']}}][]" value="student" @if($permission_user['student']) checked @endif type="checkbox">
                                                <span class="switch-label" data-on="YES" data-off="NO"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </button>
                            </div>
                            <div class="col-md-1 text-center">
                                <span class="loading-icon"></span>
                            </div>
                            <div class="col-md-1">
                                <a id="cancelPermissionEditButton" class="btn btn-3d btn-reveal btn-red">
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

@section('js-top')
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
            $("#cancelPermissionEditButton").click(function () {
                window.location='{{url()}}/setting';
            });
            $("#yearEditBox").keydown(function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        (e.keyCode == 67 && e.ctrlKey === true) ||
                        (e.keyCode == 88 && e.ctrlKey === true) ||
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            $('#studentInfo').keyup(function(){
                $('.typeahead').typeahead('destroy');
                $('.autosuggest').attr('data-queryURL','{!! url('setting/auto_suggest?limit=10&search=') !!}'+$(this).val());
                _autosuggest();
                $(this).trigger( "focus" );
            });
            $(document).on('click','.delete-a-tuple',function(){
                    var id =  this.id;
                    $('#tuple-'+id).addClass('hidden');
                    $('#delete-'+id).val('deleted');
            });
            $(document).on('click','#add-new-permission-btn',function(){
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT+'/setting/add_new_permission',
                        {data:  $('#studentInfo').val(), _token: '{{csrf_token()}}'}).done(function (input) {
                    if(input=='fail'){
                        _toastr("ไม่พบนิสิตในระบบ","top-right","error",false);
                        return false;
                    }
                    else {
                        if(document.getElementById(+input["student_id"])){
                            if(!$('#tuple-'+input["student_id"]).hasClass('hidden')){
                                _toastr("ข้อมูลซ้ำ","top-right","warning",false);
                            }
                            $('#tuple-'+input["student_id"]).removeClass('hidden');
                            $('#delete-'+input["student_id"]).val("");
                        }
                        else {
                            $('#permission-table').append('<tr id="tuple-'+input["student_id"]+'"><input type="hidden" id="delete-'+input["student_id"]+'" name="privilege['+input["student_id"]+'][]" value="" />'
                                    +'<td class="text-center"><a id="'+input["student_id"]+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">'
                                    +' <i class="fa fa-minus"></i>'
                                    +' <i class="fa fa-trash"></i>'
                                    +' </a></td>'
                                    +' <td><input type="hidden" name="student_id[]" value="'+input["student_id"]+'"/>'+input["student_id"]+'</td>'
                                    +' <td>'+input["name"]+'</td>'
                                    +' <td>'+input["surname"]+'</td>'
                                    +' <td class="text-center">'
                                    +' <label class="switch switch-success">'
                                    +' <input  name="privilege['+input["student_id"]+'][]" value="announce" type="checkbox">'
                                    +'  <span class="switch-label" data-on="YES" data-off="NO"></span>'
                                    +' </label>'
                                    +'  </td>'
                                    +' <td class="text-center">'
                                    +'   <label class="switch switch-success">'
                                    +'      <input name="privilege['+input["student_id"]+'][]" value="room" type="checkbox" type="checkbox">'
                                    +'          <span class="switch-label" data-on="YES" data-off="NO"></span>'
                                    +'   </label>'
                                    +'  </td>'
                                    +' <td class="text-center">'
                                    +'  <label class="switch switch-success">'
                                    +'     <input   name="privilege['+input["student_id"]+'][]" value="supplies" type="checkbox" type="checkbox">'
                                    +'         <span class="switch-label" data-on="YES" data-off="NO"></span>'
                                    +' </label>'
                                    +' </td>'
                                    +' <td class="text-center">'
                                    +'    <label class="switch switch-success">'
                                    +'       <input  name="privilege['+input["student_id"]+'][]" value="activity" type="checkbox" type="checkbox">'
                                    +'         <span class="switch-label" data-on="YES" data-off="NO"></span>'
                                    +' </label>'
                                    +'  </td>'
                                    +'  <td class="text-center">'
                                    +'   <label class="switch switch-success">'
                                    +'     <input name="privilege['+input["student_id"]+'][]" value="student" type="checkbox">'
                                    +'        <span class="switch-label" data-on="YES" data-off="NO"></span>'
                                    +'</label>'
                                    +'</td>'
                                    +'  </tr>');
                        }
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง","top-right","error",false);
                    return false;
                });
            });
        }
        $( document ).ready(main);
    </script>
@endsection
