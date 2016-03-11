@extends('masterpage')

@section('title')
    ติดต่อ กวศ.
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
@endsection

@section('contactNavToggle')
    active
@endsection

@section('bodyTitle')
    กรรมการนิสิตคณะวิศวกรรมศาสตร์ ปีการศึกษา 2558
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form novalidate="novalidate" class="validate" action="{{url().'/setting/edit_permission'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="margin-bottom-20">เพิ่มกรรมการนิสิต</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group autosuggest" data-minLength="1" data-queryURL="{{url('setting/auto_suggest?limit=10&search=1')}}">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="studentInfo" name="studentInfo" class="form-control typeahead" placeholder="กรอกรหัสนิสิต/ชื่อ/นามสกุล" type="text">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input id="position" name="position" class="form-control typeahead" placeholder="กรอกตำแหน่ง" type="text">
                                </div>
                                <span class="input-group-btn" id="add-new-permission-btn">
                                    <a class="btn btn-success">เพิ่ม</a>
                                </span>
                            </div>
                        </div>
                        <div class="table-responsive margin-bottom-30">
                            <table class="table nomargin" id="permission-table">
                                <tr >
                                    <th style="text-align:center">ตำแหน่ง</th>
                                    <th style="text-align:center">ชื่อ</th>
                                    <th style="text-align:center">นามสกุล</th>
                                    <th style="text-align:center">ชื่อเล่น</th>
                                    <th style="text-align:center">หมายเลขโทรศัพท์</th>
                                    <th style="text-align:center">e-mail</th>
                                    <th style="text-align:center">line</th>
                                    <th style="text-align:center">Facebook</th>
                                </tr>
                                {{--@foreach($permission_users as $permission_user)--}}
                                {{--<tr id="tuple-{{$permission_user['student_id']}}"><input type="hidden" id="delete-{{$permission_user['student_id']}}" name="privilege[{{$permission_user['student_id']}}][]" value="" />--}}
                                {{--<td class="text-center"><a id="{{$permission_user['student_id']}}" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด">--}}
                                {{--<i class="fa fa-minus"></i>--}}
                                {{--<i class="fa fa-trash"></i>--}}
                                {{--</a></td>--}}
                                {{--<td><input type="hidden" name="student_id[]" value="{{$permission_user['student_id']}}"/>{{$permission_user['student_id']}}</td>--}}
                                {{--<td>{{$permission_user['name']}}</td>--}}
                                {{--<td>{{$permission_user['surname']}}</td>--}}
                                {{--<td class="text-center">--}}
                                {{--<label class="switch switch-success">--}}
                                {{--<input  name="privilege[{{$permission_user['student_id']}}][]" value="announce" @if($permission_user['news']) checked @endif type="checkbox">--}}
                                {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                {{--<label class="switch switch-success">--}}
                                {{--<input name="privilege[{{$permission_user['student_id']}}][]" value="room" type="checkbox" @if($permission_user['room']) checked @endif type="checkbox">--}}
                                {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                {{--<label class="switch switch-success">--}}
                                {{--<input   name="privilege[{{$permission_user['student_id']}}][]" value="supplies" type="checkbox" @if($permission_user['supplies']) checked @endif type="checkbox">--}}
                                {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                {{--<label class="switch switch-success">--}}
                                {{--<input  name="privilege[{{$permission_user['student_id']}}][]" value="activity" type="checkbox" @if($permission_user['activities']) checked @endif type="checkbox">--}}
                                {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="text-center">--}}
                                {{--<label class="switch switch-success">--}}
                                {{--<input name="privilege[{{$permission_user['student_id']}}][]" value="student" @if($permission_user['student']) checked @endif type="checkbox">--}}
                                {{--<span class="switch-label" data-on="YES" data-off="NO"></span>--}}
                                {{--</label>--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
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
                                <a id="cancelMemberAddButton" class="btn btn-3d btn-reveal btn-red">
                                    <i class="fa fa-times"></i>
                                    <span>ยกเลิก</span>
                                </a>
                            </div>
                            <div class="col-md-1" style="margin-left: 5px">
                                <a id="deleteAllEditButton" class="btn btn-3d btn-reveal btn-black">
                                    <i class="fa fa-trash-o"></i>
                                    <span>ลบทั้งหมด</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection