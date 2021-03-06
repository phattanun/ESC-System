@extends('masterpage')

@section('title')
    ตั้งค่าห้องประชุม
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('bodyTitle')
    ตั้งค่าห้องประชุม
@endsection

@section('content')

    <div class="modal fade bs-example-modal-sm room-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">ต้องการลบห้องประชุมนี้ใช่หรือไม่ ?</h4>
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div class="row text-center">
                            <a id="room-confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">
                                <i class="fa fa-check"></i>
                                <span>ใช่</span>
                            </a>
                            <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                <span>ไม่ใช่</span>
                            </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm event-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- header modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">ต้องการลบช่วงพิเศษนี้ใช่หรือไม่ ?</h4>
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div class="row text-center">
                        <a id="event-confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">
                            <i class="fa fa-check"></i>
                            <span>ใช่</span>
                        </a>
                        <a class="btn btn-3d btn-reveal btn-red" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            <span>ไม่ใช่</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section style="margin-top: -40px">
        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="upload_form" class="validate" action="{{url().'/room/room-manage/edit_image'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกภาพสำเร็จ!{{--<script>window.location='{{url()}}/setting';</script>--}}" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20">Upload รูปแผนที่ห้องประชุม </label>
                                        <input class="custom-file-upload" type="file" id="file" name="image" id="contact:attachment" data-btn-text="Select a File" />
                                        <small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <br>
                                        <div class="text-center">
                                            <div id="news-image"style="background-image:url({{$timeDefault->image}}); "></div>
                                        </div>
                                        <br><br>
                                        {{--<div>--}}
                                            {{--<a class="btn btn-3d btn-reveal btn-yellow">--}}
                                                {{--<i class="fa fa-save"></i>--}}
                                                {{--<span>บันทึก</span>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        <div class="row">
                                            <div class="col-xs-5 col-md-1 col-sm-2">
                                                <button type="submit" class="btn btn-3d btn-reveal btn-yellow">
                                                    <i class="fa fa-save"></i>
                                                    <span>บันทึก</span>
                                                </button>
                                            </div>
                                            <div class="col-xs-1 text-center">
                                                <span class="loading-icon"></span>
                                            </div>
                                            {{--<div class="col-xs-5 col-md-1 col-sm-2">--}}
                                                {{--<a id="cancelPermissionEditButton" class="btn btn-3d btn-reveal btn-red">--}}
                                                    {{--<i class="fa fa-times"></i>--}}
                                                    {{--<span>ยกเลิก</span>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="container" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="validate" action="{{url().'/room/room-manage/edit_room'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>$('#edit-room-submit-button').attr('disabled','disabled'); setTimeout(function(){location.reload();},1000);</script>" {{--data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ"--}} data-toastr-position="top-right">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

{{--เพิ่มลดแก้ไขห้องประชุม--------------------------------------------------------------------------------------------}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label class="margin-bottom-20 ">เพิ่มห้องประชุม</label>
                                <div class="fancy-form margin-bottom-20">
                                    <i class="fa fa-tag"></i>
                                    <input id="room-input-name-new" type="text" class="form-control" placeholder="ชื่อห้องประชุม">
                                </div>
                                <div class="fancy-form margin-bottom-20">
                                    <i class="fa fa-users"></i>
                                    <input id="room-input-size-new" type="text" class="form-control number" placeholder="จำนวนคนที่จุได้">
                                </div>
                                <a class="btn btn-3d btn-reveal btn-success pull-right" onclick="roomCreate()">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่ม</span>
                                </a>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label class="margin-bottom-20 ">ห้องประชุม</label>
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table nomargin room-table" id="permission-table">
                                            <tr>
                                                <th style="vertical-align:middle" class="openCloseRoomCol text-center">เปิด / ปิด ห้องประชุม</th>
                                                <th style="vertical-align:middle">ชื่อห้องประชุม</th>
                                                <th style="vertical-align:middle">จำนวนคนที่จุดได้</th>
                                                <th style="vertical-align:middle">ลำดับความสำคัญ</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>

                                            @foreach($rooms as $room)
                                            <tr id="room-{{$room['room_id']}}">
                                                <input type="hidden" id="room-status-{{$room['room_id']}}" name="room[{{$room['room_id']}}][status]" value="" />
                                                <input type="hidden" id="room-id-{{$room['room_id']}}" name="room[{{$room['room_id']}}][id]" value="{{$room['room_id']}}" />
                                                <td class="text-center openCloseRoomCol">
                                                    <label class="switch switch-success">
                                                        <input id="room-input-onoff-{{$room['room_id']}}" name="room[{{$room['room_id']}}][onoff]" value="on" type="checkbox" @if($room['closed']==0)checked @endif>
                                                        <span class="switch-label" data-on="เปิด" data-off="ปิด"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div id="room-name-{{$room['room_id']}}" class="room-name">{{$room['name']}}</div>
                                                    <div id="room-input-name-{{$room['room_id']}}" class="hide">
                                                        <input id="room-input-name-box-{{$room['room_id']}}" type="text" class="form-control" name="room[{{$room['room_id']}}][name]" placeholder="ชื่อห้องประชุม" value="{{$room['name']}}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="room-size-{{$room['room_id']}}" class="room-size">{{$room['size']}} คน</div>
                                                    <div id="room-input-size-{{$room['room_id']}}" class="hide">
                                                        <div class="col-xs-10 no-padding">
                                                            <input id="room-input-size-box-{{$room['room_id']}}" type="text" class="form-control number" style="display: inline; width: 100%;" name="room[{{$room['room_id']}}][size]" placeholder="จำนวนคนที่จุได้" value="{{$room['size']}}">
                                                        </div>
                                                        &nbspคน
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="room-priority-{{$room['room_id']}}" class="room-priority">{{$room['priority']}} / 5</div>
                                                    <div id="room-input-priority-{{$room['room_id']}}" class="hide">
                                                        <div class="col-xs-12 no-padding">
                                                            {{--<input id="room-input-priority-box-1" type="text" class="form-control number" style="display: inline; width: 100%;" name="room[1][priority]" placeholder="ลำดับความสำคัญ" value="1">--}}
                                                            <select id="room-input-priority-box-{{$room['room_id']}}" class="form-control select" name="room[{{$room['room_id']}}][priority]">
                                                                <option value="0" @if($room['priority']==0)selected @endif>0 / 5</option>
                                                                <option value="1" @if($room['priority']==1)selected @endif>1 / 5</option>
                                                                <option value="2" @if($room['priority']==2)selected @endif>2 / 5</option>
                                                                <option value="3" @if($room['priority']==3)selected @endif>3 / 5</option>
                                                                <option value="4" @if($room['priority']==4)selected @endif>4 / 5</option>
                                                                <option value="5" @if($room['priority']==5)selected @endif>5 / 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="text-center">
                                                    <a id="room-edit-button-{{$room['room_id']}}" onclick="roomEdit({{$room['room_id']}})" class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="room-cancel-button-{{$room['room_id']}}" onclick="roomCancel({{$room['room_id']}})" class="btn btn-3d btn-reveal btn-red hide">
                                                        <i class="fa fa-times"></i>
                                                        <span>ยกเลิก</span>
                                                    </a>
                                                    <a id="room-remove-button-{{$room['room_id']}}" onclick="roomRemove({{$room['room_id']}})" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบห้องประชุมนี้" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
<hr>

{{--เวลาเปิด-ปิดห้อง ปกติ----------------------------------------------------------------------------------------------}}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label class="margin-bottom-20 ">เวลาที่อนุญาตให้จองห้องได้</label>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="time-start-default" type="text" class="form-control timepicker valid" value="{{$timeDefault['start']}}" name="time-start-default" data-timepicki-tim="{{explode(" ",$timeDefault['start'])[0]}}" data-timepicki-mini="{{explode(" ",$timeDefault['start'])[2]}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="time-end-default" type="text" class="form-control timepicker valid" value="{{$timeDefault['end']}}" name="time-end-default" data-timepicki-tim="{{explode(" ",$timeDefault['end'])[0]}}" data-timepicki-mini="{{explode(" ",$timeDefault['end'])[2]}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<hr>


{{--เวลาเปิด-ปิดห้อง แบบไม่ปกติ มีeventต่างๆ----------------------------------------------------------------------------------------------}}
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label class="margin-bottom-20 ">ปรับเปลี่ยนช่วงเวลาที่อนุญาตให้ของได้ ในกรณีพิเศษ</label>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>ตั้งแต่วันที่</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-date-start-new" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>ถึงวันที่</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-date-end-new" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="col-md-6 col-sm-6 no-padding">
                                        <div class="container-fluid margin-bottom-20">
                                            <div class="col-md-3 col-sm-3" style="line-height: 2">
                                                <label>เปิดทำการ</label>
                                            </div>
                                            <div class="col-md-9 col-sm-9">
                                                {{--<input id="event-date-end-new" type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">--}}
                                                <label class="switch switch-success">
                                                    <input id="event-onoff-new" value="on" type="checkbox" onchange="eventOnOffNew()" checked="">
                                                    <span class="switch-label" data-on="ใช่" data-off="ไม่ใช่"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 event-time-start-new-container">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-time-start-new" type="text" class="form-control timepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 event-time-end-new-container">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-time-end-new" type="text" class="form-control timepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <a class="btn btn-3d btn-reveal btn-success pull-right" onclick="eventCreate()">
                                        <i class="fa fa-plus"></i>
                                        <span>เพิ่ม</span>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label class="margin-bottom-20 ">กรณีพิเศษ</label>
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table event-table" id="permission-table">
                                            <tr>
                                                <th style="vertical-align:middle" class="openCloseRoomCol text-center">เปิด / ปิด ห้องประชุม</th>
                                                <th style="vertical-align:middle">ตั้งแต่วันที่</th>
                                                <th style="vertical-align:middle">ถึงวันที่</th>
                                                <th style="vertical-align:middle">เวลาเปิด</th>
                                                <th style="vertical-align:middle">เวลาปิด</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            @foreach($events as $event)
                                            <tr id="event-{{$event['id']}}"><input type="hidden" id="event-status-{{$event['id']}}" name="event[{{$event['id']}}][status]" value="" />
                                                <td class="text-center openCloseRoomCol">
                                                    <label class="switch switch-success">
                                                        <input id="event-input-onoff-{{$event['id']}}" name="event[{{$event['id']}}][onoff]" value="on" type="checkbox" onchange="eventOnOff({{$event['id']}})" @if($event['room_closed']==0)checked @endif>
                                                        <span class="switch-label" data-on="เปิด" data-off="ปิด"></span>
                                                    </label>
                                                </td>
                                                <td><div id="event-date-start-{{$event['id']}}">{{$event['start_date']}}</div><input type="text" id="event-input-date-start-{{$event['id']}}" class="form-control datepicker text-center hide" value="{{$event['start_date']}}" name="event[{{$event['id']}}][date-start]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>
                                                <td><div id="event-date-end-{{$event['id']}}">{{$event['end_date']}}</div><input type="text" id="event-input-date-end-{{$event['id']}}" class="form-control datepicker text-center hide" value="{{$event['end_date']}}" name="event[{{$event['id']}}][date-end]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>
                                                <td><div id="event-time-start-off-{{$event['id']}}" class="@if($event['room_closed']==0)hide @endif">-- : --</div><div id="event-time-start-{{$event['id']}}" class="@if($event['room_closed']==1)hide @endif">{{$event['start_time']}}</div><input type="text" id="event-input-time-start-{{$event['id']}}" class="form-control timepicker valid text-center hide" value="{{$event['start_time']}}" name="event[{{$event['id']}}][time-start]" data-timepicki-tim="{{explode(" ",$event['start_time'])[0]}}" data-timepicki-mini="{{explode(" ",$event['start_time'])[2]}}"></td>
                                                <td><div id="event-time-end-off-{{$event['id']}}" class="@if($event['room_closed']==0)hide @endif">-- : --</div><div id="event-time-end-{{$event['id']}}" class="@if($event['room_closed']==1)hide @endif">{{$event['end_time']}}</div><input type="text" id="event-input-time-end-{{$event['id']}}" class="form-control timepicker valid text-center hide" value="{{$event['end_time']}}" name="event[{{$event['id']}}][time-end]" data-timepicki-tim="{{explode(" ",$event['end_time'])[0]}}" data-timepicki-mini="{{explode(" ",$event['end_time'])[2]}}"></td>
                                                <td class="text-center" style="padding-right: 0px; padding-left: 0px;">
                                                    <a id="event-edit-button-{{$event['id']}}" class="btn btn-3d btn-reveal btn-yellow" onclick="eventEdit({{$event['id']}})">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="event-cancel-button-{{$event['id']}}" onclick="eventCancel({{$event['id']}})" class="btn btn-3d btn-reveal btn-red hide">
                                                        <i class="fa fa-times"></i>
                                                        <span>ยกเลิก</span>
                                                    </a>
                                                    <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" onclick="eventRemove({{$event['id']}})" data-toggle="tooltip" data-placement="top" title="ลบช่วงเวลาพิเศษนี้" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash"  data-toggle="modal" data-target=".event-modal"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--แถบปุ่มบันทึก----------------------------------------------------------------------------------------------}}


                        <div class="row">
                            <div class="col-xs-5 col-md-1 col-sm-2">
                                <button id="edit-room-submit-button" type="submit" class="btn btn-3d btn-reveal btn-green">
                                    <i class="fa fa-check"></i>
                                    <span>บันทึก</span>
                                </button>
                            </div>
                            <div class="col-xs-1 text-center">
                                <span class="loading-icon"></span>
                            </div>
                            <div class="col-xs-5 col-md-1 col-sm-2">
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
    <style>
        #news-image{
            /*background-size: cover;*/
            background-position: center center;
            background-position-x: 50%;
            background-position-y: 50%;
            background-repeat: no-repeat;
            background-origin: content-box;
            width: 100%;
            height: 300px;
        }

        .event-table th,.event-table td{
            text-align: center;
        }
        .event-table td{
            line-height: 2.5 !important;
            /*width: 10%;*/
            width: 20%;
            min-width: 160px;
        }
        /*@media screen and (max-width: 700px) {*/
            /*.event-table input {*/
                /*min-width: 90px;*/
            /*}*/
        /*}*/
        .no-padding{
            padding: 0px;
        }
        .room-table td{
            line-height: 2.5 !important;
            width: 20%;
            min-width: 160px;
            /*max-width: 236px;*/
        }
        .form-control{
            font-size: 16px;
        }
        .hide{
            display: none;
        }
        .btn{
            width: 90px;
        }

        .switch{
            vertical-align: middle;
        }
        .switch-label{
            font-size: 16px !important;
        }
        .openCloseRoomCol{
            min-width: 100px !important;
            max-width: 100px !important;
            white-space: normal !important;
            /*width: 100px !important;*/
        }
        .room-priority,.room-name,.room-size{
            padding-left: 14px;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        var oldImage = $('#news-image').css('background-image');
        $("#upload_form").change(function() {
            var formData = new FormData($("#upload_form")[0]);
            $.ajax({
                url:  '{{url("/news/upload/image")}}',
                type: 'POST',
                headers: { "X-CSRF-Token" : "{{ csrf_token() }}" },
                data: formData,
                processData: false,
                contentType: false
            }).done(function(data) {
                if(data.hasOwnProperty('image')) {
                    $('#news-image').css( 'background-image', 'url("' + data.image + '")' );
                }
                else {
                    alert("รูปไม่ผ่านนะจ๊ะ..!!");
                    $('#news-image').css( 'background-image', oldImage );
                }
            });
        });


    </script>
@endsection

@section('js-top')
    <script>
        var room_count = {{$count_rooms}};
        var event_count = {{$count_events}};
        function roomEdit(id){
            $("#room-name-"+id).addClass("hide");
            $("#room-size-"+id).addClass("hide");
            $("#room-priority-"+id).addClass("hide");
            $("#room-input-name-"+id).removeClass("hide");
            $("#room-input-size-"+id).removeClass("hide");
            $("#room-input-priority-"+id).removeClass("hide");
            $("#room-edit-button-"+id).addClass("hide");
            $("#room-cancel-button-"+id).removeClass("hide");
            //เช็คชื่อซ้ำด้วย
            var status = document.getElementById("room-status-"+id).value;
            if(status==""){
                $("#room-status-"+id).attr("value","update");
            }
        }
        function roomCancel(id){
            //var name = $("#room-input-name-"+id).value;
            var name = document.getElementById("room-name-"+id).innerText;
            document.getElementById("room-input-name-box-"+id).value = name;
            var size = document.getElementById("room-size-"+id).innerText;
            size = size.split(" ");
            size = size[0];
            document.getElementById("room-input-size-box-"+id).value = size;
            var priority = document.getElementById("room-priority-"+id).innerText;
            priority = priority.split(" ");
            priority = priority[0];
            document.getElementById("room-input-priority-box-"+id).value = priority;

//            alert(priority);
            $("#room-name-"+id).removeClass("hide");
            $("#room-size-"+id).removeClass("hide");
            $("#room-priority-"+id).removeClass("hide");
            $("#room-input-name-"+id).addClass("hide");
            $("#room-input-size-"+id).addClass("hide");
            $("#room-input-priority-"+id).addClass("hide");
            $("#room-edit-button-"+id).removeClass("hide");
            $("#room-cancel-button-"+id).addClass("hide");

            var status = document.getElementById("room-status-"+id).value;
            if(status=="update"){
                $("#room-status-"+id).attr("value","");
            }
        }
        function roomRemove(id){
            $("#room-confirm-remove-button").attr("onclick","roomConfirmRemove("+id+")");
        }
        function roomConfirmRemove(id){
            $("#room-"+id).addClass("hide");
            $("#room-status-"+id).attr("value","deleted");
        }
        function roomCreate(){
            var name = document.getElementById("room-input-name-new").value;
            var size = document.getElementById("room-input-size-new").value;
            if(name == "" || size == ""){
                _toastr("กรอกข้อมูลไม่ครบ","top-right","error",false);
                return;
            }
            /////ต้องเช็คชื่อซ้ำมั้ย เช็คชื่อซ้ำด้วย
            document.getElementById("room-input-name-new").value = "";
            document.getElementById("room-input-size-new").value = "";
            room_count = room_count + 1;
            var i = room_count;
            var txt ='<tr id="room-'+i+'">'
                    +'<input type="hidden" id="room-status-'+i+'" name="room['+i+'][status]" value="new" />'
                    +'<input type="hidden" id="room-id-'+i+'" name="room['+i+'][id]" value="'+i+'" />'
                    +'  <td class="text-center openCloseRoomCol">'
                    +'      <label class="switch switch-success">'
                    +'      <input id="room-input-onoff-'+i+'" name="room['+i+'][onoff]" value="on" type="checkbox">'
                    +'          <span class="switch-label label-lg switch-lg" data-on="เปิด" data-off="ปิด"></span>'
                    +       '</label>'
                    +'  </td>'
                    +'  <td>'
                    +'      <div id="room-name-'+i+'" class="room-name">'+name+'</div>'
                    +'      <div id="room-input-name-'+i+'" class="hide">'
                    +'          <input id="room-input-name-box-'+i+'" type="text" class="form-control" name="room['+i+'][name]" placeholder="ชื่อห้องประชุม" value="'+name+'">'
                    +'      </div>'
                    +'  </td>'
                    +'  <td>'
                    +'      <div id="room-size-'+i+'" class="room-size">'+size+' คน</div>'
                    +'      <div id="room-input-size-'+i+'" class="hide">'
                    +'          <div class="col-xs-10 no-padding">'
                    +'              <input id="room-input-size-box-'+i+'" type="text" class="form-control number" style="display: inline; width: 100%;" name="room['+i+'][size]" placeholder="จำนวนคนที่จุได้" value="'+size+'">'
                    +'          </div>'
                    +'          &nbspคน'
                    +'      </div>'
                    +'  </td>'
                    +'  <td>'
                    +'      <div id="room-priority-'+i+'" class="room-priority">0 / 5</div>'
                    +'      <div id="room-input-priority-'+i+'" class="hide">'
                    +'          <div class="col-xs-12 no-padding">'
//                    +'              <input id="room-input-priority-box-'+i+'" type="text" class="form-control number" style="display: inline; width: 100%;" name="room['+i+'][priority]" placeholder="ลำดับความสำคัญ" value="1">'
                    +'              <select id="room-input-priority-box-'+i+'" class="form-control select" name="room['+i+'][priority]">'
                    +'                  <option value="0">0 / 5</option>'
                    +'                  <option value="1">1 / 5</option>'
                    +'                  <option value="2">2 / 5</option>'
                    +'                  <option value="3">3 / 5</option>'
                    +'                  <option value="4">4 / 5</option>'
                    +'                  <option value="5">5 / 5</option>'
                    +'              </select>'
                    +'          </div>'
                    +'      </div>'
                    +'  </td>'


                    +'<td class="text-center">'
                    +'  <a id="room-edit-button-'+i+'" onclick="roomEdit('+i+')" class="btn btn-3d btn-reveal btn-yellow">'
                    +'      <i class="fa fa-edit"></i>'
                    +'      <span>แก้ไข</span>'
                    +'  </a>'
                    +'  <a id="room-cancel-button-'+i+'" onclick="roomCancel('+i+')" class="btn btn-3d btn-reveal btn-red hide">'
                    +'      <i class="fa fa-times"></i>'
                    +'      <span>ยกเลิก</span>'
                    +'  </a>'
                    +'  <a id="room-remove-button-'+i+'" onclick="roomRemove('+i+')" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบห้องประชุมนี้" style="vertical-align:middle">'
                    +'      <i class="fa fa-minus"></i>'
                    +'      <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>'
                    +'  </a>'
                    +'</td>'
                    +'</tr>';
            $(".room-table").append(txt);
        }

        function eventOnOffNew(){
            var onoff = document.getElementById('event-onoff-new').checked;
            if(onoff == false){
                $(".event-time-start-new-container").addClass("hide");
                $(".event-time-end-new-container").addClass("hide");
                $("#event-time-start-new").val("00 : 00");
                $("#event-time-end-new").val("00 : 00");
            }
            else{
                $(".event-time-start-new-container").removeClass("hide");
                $(".event-time-end-new-container").removeClass("hide");
            }
        }

        function eventCreate(){
            var dateStart = document.getElementById("event-date-start-new").value;
            var dateEnd = document.getElementById("event-date-end-new").value;
            var onoff = document.getElementById('event-onoff-new').checked;
            var timeStart = document.getElementById("event-time-start-new").value;
            var timeEnd = document.getElementById("event-time-end-new").value;
            if(dateStart == "" || dateEnd == ""){
                _toastr("กรอกข้อมูลไม่ครบ","top-right","error",false);
                return;
            }
//            var dStart = new Date(dateStart);
//            var d = dStart.getDate();
//            alert(d);
            var check = "";
            var tabOff = "";
            var tabNormal = "";
            if(onoff == true){
                if(timeStart == "" || timeEnd == ""){
                    _toastr("กรอกข้อมูลไม่ครบ","top-right","error",false);
                    return;
                }
                check = "checked";
                tabOff = "hide";
                tabNormal = "";
            }
            else{
                timeStart = document.getElementById("time-start-default").value;
                timeEnd = document.getElementById("time-end-default").value;
                check = "";
                tabOff = "";
                tabNormal = "hide";
            }
            document.getElementById("event-date-start-new").value = "";
            document.getElementById("event-date-end-new").value = "";
            document.getElementById('event-onoff-new').checked = true;
            document.getElementById("event-time-start-new").value = "";
            document.getElementById("event-time-end-new").value = "";
            $(".event-time-start-new-container").removeClass("hide");
            $(".event-time-end-new-container").removeClass("hide");
            //เช็คเวลาชนด้วย
            event_count = event_count + 1;

            var tmp = timeStart.split(" ");
            var timeStartHour = tmp[0];
            var timeStartMin = tmp[2];
            tmp = timeEnd.split(" ");
            var timeEndHour = tmp[0];
            var timeEndMin = tmp[2];


//            alert(dateStart + " " + dateEnd + " " + timeStart + " " + timeEnd + " " + event_count + " " + timeStartHour + " " + timeStartMin + " " + timeEndHour + " " + timeEndMin);

            var txt =
                    '<tr id="event-'+event_count+'"><input type="hidden" id="event-status-'+event_count+'" name="event['+event_count+'][status]" value="new" />'
                    +'    <td class="text-center openCloseRoomCol">'
                    +'        <label class="switch switch-success">'
                    +'            <input id="event-input-onoff-'+event_count+'" name="event['+event_count+'][onoff]" value="on" type="checkbox" onchange="eventOnOff('+event_count+')" '+check+'>'
                    +'                <span class="switch-label" data-on="เปิด" data-off="ปิด"></span>'
                    +'        </label>'
                    +'    </td>'
                    +'    <td><div id="event-date-start-'+event_count+'">'+dateStart+'</div><input type="text" id="event-input-date-start-'+event_count+'" class="form-control datepicker text-center hide" value="'+dateStart+'" name="event['+event_count+'][date-start]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>'
                    +'    <td><div id="event-date-end-'+event_count+'">'+dateEnd+'</div><input type="text" id="event-input-date-end-'+event_count+'" class="form-control datepicker text-center hide" value="'+dateEnd+'" name="event['+event_count+'][date-end]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>'
                    +'    <td><div id="event-time-start-off-'+event_count+'" class="'+tabOff+'">-- : --</div><div id="event-time-start-'+event_count+'" class="'+tabNormal+'">'+timeStart+'</div><input type="text" id="event-input-time-start-'+event_count+'" class="form-control timepicker valid text-center hide" value="'+timeStart+'" name="event['+event_count+'][time-start]" data-timepicki-tim="'+timeStartHour+'" data-timepicki-mini="'+timeStartMin+'"></td>'
                    +'    <td><div id="event-time-end-off-'+event_count+'" class="'+tabOff+'">-- : --</div><div id="event-time-end-'+event_count+'" class="'+tabNormal+'">'+timeEnd+'</div><input type="text" id="event-input-time-end-'+event_count+'" class="form-control timepicker valid text-center hide" value="'+timeEnd+'" name="event['+event_count+'][time-end]" data-timepicki-tim="'+timeEndHour+'" data-timepicki-mini="'+timeEndMin+'"></td>'
                    +'    <td class="text-center" style="padding-right: 0px; padding-left: 0px;">'
                    +'        <a id="event-edit-button-'+event_count+'" class="btn btn-3d btn-reveal btn-yellow" onclick="eventEdit('+event_count+')">'
                    +'            <i class="fa fa-edit"></i>'
                    +'            <span>แก้ไข</span>'
                    +'        </a>'
                    +'        <a id="event-cancel-button-'+event_count+'" onclick="eventCancel('+event_count+')" class="btn btn-3d btn-reveal btn-red hide">'
                    +'            <i class="fa fa-times"></i>'
                    +'            <span>ยกเลิก</span>'
                    +'        </a>'
                    +'        <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" onclick="eventRemove('+event_count+')" data-toggle="tooltip" data-placement="top" title="ลบช่วงเวลาพิเศษนี้" style="vertical-align:middle">'
                    +'            <i class="fa fa-minus"></i>'
                    +'           <i class="fa fa-trash"  data-toggle="modal" data-target=".event-modal"></i>'
                    +'       </a>'
                    +'    </td>'
                    +'</tr>';

//                    '<tr id="event-'+event_count+'"><input type="hidden" id="event-status-'+event_count+'" name="event['+event_count+'][status]" value="new" />'+
//                    '   <td><div id="event-date-start-'+event_count+'">'+dateStart+'</div><input type="text" id="event-input-date-start-'+event_count+'" class="form-control datepicker text-center hide" value="'+dateStart+'" name="event['+event_count+'][date-start]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>'+
//                    '   <td><div id="event-date-end-'+event_count+'">'+dateEnd+'</div><input type="text" id="event-input-date-end-'+event_count+'" class="form-control datepicker text-center hide" value="'+dateEnd+'" name="event['+event_count+'][date-end]" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>'+
//                    '   <td><div id="event-time-start-'+event_count+'">'+timeStart+'</div><input type="text" id="event-input-time-start-'+event_count+'" class="form-control timepicker valid text-center hide" value="'+timeStart+'" name="event['+event_count+'][time-start]" data-timepicki-tim="'+timeStartHour+'" data-timepicki-mini="'+timeStartMin+'"></td>'+
//                    '   <td><div id="event-time-end-'+event_count+'">'+timeEnd+'</div><input type="text" id="event-input-time-end-'+event_count+'" class="form-control timepicker valid text-center hide" value="'+timeEnd+'" name="event['+event_count+'][time-end]" data-timepicki-tim="'+timeEndHour+'" data-timepicki-mini="'+timeEndMin+'"></td>'+
//                    '   <td class="text-center" style="padding-right: 0px; padding-left: 0px;">'+
//                    '       <a id="event-edit-button-'+event_count+'" class="btn btn-3d btn-reveal btn-yellow" onclick="eventEdit('+event_count+')">'+
//                    '           <i class="fa fa-edit"></i>'+
//                    '           <span>แก้ไข</span>'+
//                    '       </a>'+
//                    '       <a id="event-cancel-button-'+event_count+'" onclick="eventCancel('+event_count+')" class="btn btn-3d btn-reveal btn-red hide">'+
//                    '           <i class="fa fa-times"></i>'+
//                    '           <span>ยกเลิก</span>'+
//                    '       </a>'+
//                    '       <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" onclick="eventRemove('+event_count+')" data-toggle="tooltip" data-placement="top" title="ลบช่วงเวลาพิเศษนี้" style="vertical-align:middle">'+
//                    '           <i class="fa fa-minus"></i>'+
//                    '           <i class="fa fa-trash"  data-toggle="modal" data-target=".event-modal"></i>'+
//                    '       </a>'+
//                    '   </td>'+
//                    '</tr>';
            $('.event-table').append(txt);
            _pickers();
        }

        function eventEdit(id){
            var onoff = document.getElementById('event-input-onoff-'+id).checked;
//            alert(onoff);
            if(onoff == false){
                _toastr("กรุณาเปิดห้องเพื่อทำการแก้ไข","top-right","warning",false);
                return;
            }
            $("#event-date-start-"+id).addClass("hide");
            $("#event-date-end-"+id).addClass("hide");
            $("#event-time-start-"+id).addClass("hide");
            $("#event-time-end-"+id).addClass("hide");
            $("#event-time-start-off-"+id).addClass("hide");
            $("#event-time-end-off-"+id).addClass("hide");
            $("#event-input-date-start-"+id).removeClass("hide");
            $("#event-input-date-end-"+id).removeClass("hide");
            $("#event-input-time-start-"+id).removeClass("hide");
            $("#event-input-time-end-"+id).removeClass("hide");
            $("#event-edit-button-"+id).addClass("hide");
            $("#event-cancel-button-"+id).removeClass("hide");
            //เช็คเวลาด้วย
            var status = document.getElementById("event-status-"+id).value;
            if(status==""){
                $("#event-status-"+id).attr("value","update");
            }
        }
        function eventCancel(id){
            var onoff = document.getElementById('event-input-onoff-'+id).checked;
            if(onoff == false){
                $("#event-time-start-" + id).addClass("hide");
                $("#event-time-end-" + id).addClass("hide");
                $("#event-time-start-off-"+id).removeClass("hide");
                $("#event-time-end-off-"+id).removeClass("hide");
            }
            else{
                $("#event-time-start-" + id).removeClass("hide");
                $("#event-time-end-" + id).removeClass("hide");
                $("#event-time-start-off-"+id).addClass("hide");
                $("#event-time-end-off-"+id).addClass("hide");
            }
            $("#event-date-start-"+id).removeClass("hide");
            $("#event-date-end-"+id).removeClass("hide");

            $("#event-input-date-start-"+id).addClass("hide");
            $("#event-input-date-end-"+id).addClass("hide");
            $("#event-input-time-start-"+id).addClass("hide");
            $("#event-input-time-end-"+id).addClass("hide");

            $("#event-edit-button-"+id).removeClass("hide");
            $("#event-cancel-button-"+id).addClass("hide");

            var status = document.getElementById("event-status-"+id).value;
            if(status=="update"){
                $("#event-status-"+id).attr("value","");
            }
        }

        function eventRemove(id){
            $("#event-confirm-remove-button").attr("onclick","eventConfirmRemove("+id+")");
        }
        function eventConfirmRemove(id){
            $("#event-"+id).addClass("hide");
            $("#room-status-"+id).attr("value","deleted");
        }

        function eventOnOff(id){
            var onoff = document.getElementById('event-input-onoff-'+id).checked;
            if(onoff == false){
                $("#event-input-time-start-"+id).val("-- : --");
                $("#event-input-time-end-"+id).val("-- : --");
//                $("#event-time-start-off-"+id).removeClass("hide");
//                $("#event-time-end-off-"+id).removeClass("hide");
//                $("#event-input-time-start-"+id).addClass("hide");
//                $("#event-input-time-end-"+id).addClass("hide");
//                $("#event-time-start-"+id).addClass("hide");
//                $("#event-time-end-"+id).addClass("hide");
                eventCancel(id);
            }
            else{
                $("#event-input-time-start-"+id).val($("#event-time-start-"+id).text());
                $("#event-input-time-end-"+id).val($("#event-time-end-"+id).text());
                $("#event-time-start-off-"+id).addClass("hide");
                $("#event-time-end-off-"+id).addClass("hide");
                $("#event-input-time-start-"+id).addClass("hide");
                $("#event-input-time-end-"+id).addClass("hide");
                $("#event-time-start-"+id).removeClass("hide");
                $("#event-time-end-"+id).removeClass("hide");
            }
        }

        $(document).ready(function(){
            $("#cancelPermissionEditButton").on('click',function(){
                location.reload();
            });
            $(".number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                            // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                            // Allow: Ctrl+C
                        (e.keyCode == 67 && e.ctrlKey === true) ||
                            // Allow: Ctrl+X
                        (e.keyCode == 88 && e.ctrlKey === true) ||
                            // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });

        /** Pickers
         **************************************************************** **/
        function _pickers() {

            /** Date Picker
             <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false">
             ******************* **/
            var _container_1 = jQuery('.datepicker');

            if(_container_1.length > 0) {
                loadScript(plugin_path + 'bootstrap.datepicker/js/bootstrap-datepicker.min.js', function() {

                    if(jQuery().datepicker) {

                        _container_1.each(function() {
                            var _t 		= jQuery(this),
                                    _lang 	=	_t.attr('data-lang') || 'en';

                            if(_lang != 'en' && _lang != '') { // load language file
                                loadScript(plugin_path + 'bootstrap.datepicker/locales/bootstrap-datepicker.'+_lang+'.min.js');
                            }

                            jQuery(this).datepicker({
                                format:			_t.attr('data-format') 			|| 'yyyy-mm-dd',
                                language: 		_lang,
                                rtl: 			_t.attr('data-RTL') 			== "true"  ? true  : false,
                                changeMonth: 	_t.attr('data-changeMonth') 	== "false" ? false : true,
                                todayBtn: 		_t.attr('data-todayBtn') 		== "false" ? false : "linked",
                                calendarWeeks: 	_t.attr('data-calendarWeeks') 	== "false" ? false : true,
                                autoclose: 		_t.attr('data-autoclose') 		== "false" ? false : true,
                                todayHighlight: _t.attr('data-todayHighlight') 	== "false" ? false : true,

                                onRender: function(date) {
                                    // return date.valueOf() < nowDate.valueOf() ? 'disabled' : '';
                                }
                            }).on('changeDate', function(ev) {

                                // AJAX POST - OPTIONAL

                            }).data('datepicker');
                        });

                    }

                });
            }




            /** Range Picker
             <input type="text" class="form-control rangepicker" value="2015-01-01 - 2016-12-31" data-format="yyyy-mm-dd" data-from="2015-01-01" data-to="2016-12-31">
             ******************* **/
            var _container_2 = jQuery('.rangepicker');

            if(_container_2.length > 0) {
                loadScript(plugin_path + 'bootstrap.daterangepicker/moment.min.js', function() {
                    loadScript(plugin_path + 'bootstrap.daterangepicker/daterangepicker.js', function() {

                        if(jQuery().datepicker) {

                            _container_2.each(function() {

                                var _t 		= jQuery(this),
                                        _format = _t.attr('data-format').toUpperCase() || 'YYYY-MM-DD';

                                _t.daterangepicker(
                                        {
                                            format: 		_format,
                                            startDate: 		_t.attr('data-from'),
                                            endDate: 		_t.attr('data-to'),

                                            ranges: {
                                                'Today': [moment(), moment()],
                                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                            }
                                        },
                                        function(start, end, label) {
                                            // alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                        });

                            });

                        }

                    });
                });
            }



            /** Time Picker
             <input type="text" class="form-control timepicker" value="11 : 55 : PM">
             ******************* **/
            var _container_3 = jQuery('.timepicker');

            if(_container_3.length > 0) {
                loadScript(plugin_path + 'timepicki/timepicki.min.js', function() {

                    if(jQuery().timepicki) {
                        _container_3.timepicki({
                            show_meridian:false,
                            min_hour_value:0,
                            max_hour_value:23,
                            step_size_minutes:15,
                            overflow_minutes:true,
                            increase_direction:'up',
                            disable_keyboard_mobile: true});
                    }
                });
            }



            /** Color Picker
             ******************* **/
            var _container_4 = jQuery('.colorpicker');

            if(_container_4.length > 0) {
                loadScript(plugin_path + 'spectrum/spectrum.min.js', function() {

                    if(jQuery().spectrum) {

                        _container_4.each(function() {
                            var _t 					= jQuery(this),
                                    _preferredFormat 	= _t.attr('data-format') 		|| "hex", // hex, hex3, hsl, rgb, name
                                    _palletteOnly		= _t.attr('data-palletteOnly') 	|| "false",
                                    _fullPicker			= _t.attr('data-fullpicker') 	|| "false",
                                    _allowEmpty			= _t.attr('data-allowEmpty') 	|| false;
                            _flat				= _t.attr('data-flat') 			|| false;

                            if(_palletteOnly == "true" || _fullPicker == "true") {

                                var _palette = [
                                    ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                                    ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                                    ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                                    ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                                    ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                                    ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                                    ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                                    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                                ];

                            } else {
                                _palette = null;
                            }

                            if(_t.attr('data-defaultColor')) {
                                _color = _t.attr('data-defaultColor');
                            } else {
                                _color = "#ff0000";
                            }

                            if(!_t.attr('data-defaultColor') && _allowEmpty == "true") {
                                _color = null;
                            }

                            _t.spectrum({
                                showPaletteOnly: 	_palletteOnly == "true" ? true : false,
                                togglePaletteOnly: 	_palletteOnly == "true" ? true : false,

                                flat:				_flat 		== "true" ? true : false,
                                showInitial: 		_allowEmpty == "true" ? true : false,
                                showInput: 			_allowEmpty == "true" ? true : false,
                                allowEmpty:			_allowEmpty == "true" ? true : false,

                                chooseText: 		_t.attr('data-chooseText') || "Coose",
                                cancelText: 		_t.attr('data-cancelText') || "Cancel",

                                color: 				_color,
                                showInput:			true,
                                showPalette: 		true,
                                preferredFormat: 	_preferredFormat,
                                showAlpha: 			_preferredFormat == "rgb" ? true : false,
                                palette: 			_palette
                            });

                        });

                    }

                });
            }

        }
    </script>
@endsection
