@extends('masterpage')

@section('title')
    ตั้งค่าห้องประชุม
@endsection

@section('body-attribute')
    style ="background-color:#F6F6F6;"
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
                    <form novalidate="novalidate" class="validate" action="" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>window.location='{{url()}}/setting';</script>" data-toastr-position="top-right">
                        <fieldset>
                            <!-- required [php action request] -->
                            {{--<input type="hidden" name="_token" value="{{{ csrf_token() }}}">--}}
                            <div class="row" >
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label class="margin-bottom-20">Upload รูปแผนที่ห้องประชุม </label>
                                        <input class="custom-file-upload" type="file" id="file" name="contact[attachment]" id="contact:attachment" data-btn-text="Select a File" />
                                        <small class="text-muted block">Max file size: 10Mb (zip/pdf/jpg/png)</small>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <br>
                                        <img src="{{url('assets/images/patterns/pattern6.png')}}" style="width: 100%">
                                        <br><br>
                                        <div>
                                            <a class="btn btn-3d btn-reveal btn-yellow">
                                                <i class="fa fa-save"></i>
                                                <span>บันทึก</span>
                                            </a>
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
                    <form class="validate" action="{{url().'/room/room-manage/edit_room'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="เปลี่ยนแปลงสิทธิ์สำเร็จ" data-toastr-position="top-right">
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
                                    <input id="room-input-size-new" type="text" class="form-control" placeholder="จำนวนคนที่จุได้">
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
                                            <tr >
                                                <th style="vertical-align:middle">ชื่อห้องประชุม</th>
                                                <th style="vertical-align:middle">จำนวนคนที่จุดได้</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id="room-1">
                                                <td>
                                                    <div id="room-name-1">ห้องประชุมใหญ่ 1</div>
                                                    <div id="room-input-name-1" class="hide">
                                                        <input id="room-input-name-box-1" type="text" class="form-control" name="room[1][name]" placeholder="ชื่อห้องประชุม" value="ห้องประชุมใหญ่1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="room-size-1">30 คน</div>
                                                    <div id="room-input-size-1" class="hide">
                                                        <div class="col-xs-12 no-padding">
                                                            <input id="room-input-size-box-1" type="text" class="form-control" style="display: inline; width: 80%;" name="room[1][size]" placeholder="จำนวนคนที่จุได้" value="30">
                                                            คน
                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="text-center">
                                                    <a id="room-edit-button-1" onclick="roomEdit(1)" class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="room-cancel-button-1" onclick="roomCancel(1)" class="btn btn-3d btn-reveal btn-red hide">
                                                        <i class="fa fa-times"></i>
                                                        <span>ยกเลิก</span>
                                                    </a>
                                                    <a id="room-remove-button-1" onclick="roomRemove(1)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบห้องประชุมนี้" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr id="room-2">
                                                <td>
                                                    <div id="room-name-2">ห้องประชุมใหญ่ 2</div>
                                                    <div id="room-input-name-2" class="hide">
                                                        <input id="room-input-name-box-2" type="text" class="form-control" name="room[2][name]" placeholder="ชื่อห้องประชุม" value="ห้องประชุมใหญ่2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="room-size-2">20 คน</div>
                                                    <div id="room-input-size-2" class="hide">
                                                        <div class="col-xs-12 no-padding">
                                                            <input id="room-input-size-box-2" type="text" class="form-control" style="display: inline; width: 80%;" name="room[2][size]" placeholder="จำนวนคนที่จุได้" value="20">
                                                            คน
                                                        </div>
                                                    </div>
                                                </td>


                                                <td class="text-center">
                                                    <a id="room-edit-button-2" onclick="roomEdit(2)" class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="room-cancel-button-2" onclick="roomCancel(2)" class="btn btn-3d btn-reveal btn-red hide">
                                                        <i class="fa fa-times"></i>
                                                        <span>ยกเลิก</span>
                                                    </a>
                                                    <a id="room-remove-button-2" onclick="roomRemove(2)" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบห้องประชุมนี้" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash" data-toggle="modal" data-target=".room-modal"></i>
                                                    </a>
                                                </td>
                                            </tr>


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
                                            <input type="text" class="form-control timepicker valid" value="08 : 00" name="time-start-default" data-timepicki-tim="08" data-timepicki-mini="00">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="07 : 00" name="time-end-default" data-timepicki-tim="07" data-timepicki-mini="00">
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-time-start-new" type="text" class="form-control timepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input id="event-time-end-new" type="text" class="form-control timepicker">
                                        </div>
                                    </div>
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
                                        <table class="table time-table" id="permission-table">
                                            <tr>
                                                <th style="vertical-align:middle">ตั้งแต่วันที่</th>
                                                <th style="vertical-align:middle">ถึงวันที่</th>
                                                <th style="vertical-align:middle">เวลาเปิด</th>
                                                <th style="vertical-align:middle">เวลาปิด</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id="event-1"><input type="hidden" id="delete" name="" value="" />
                                                <td><div id="event-date-start-1">21-03-2016</div><input type="text" id="event-input-date-start-1" class="form-control datepicker text-center hide" value="21-03-2016" name="event-date-start-1" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>
                                                <td><div id="event-date-end-1">23-03-2016</div><input type="text" id="event-input-date-end-1" class="form-control datepicker text-center hide" value="23-03-2016" name="event-date-end-1" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"></td>
                                                <td><div id="event-time-start-1">08 : 00</div><input type="text" id="event-input-time-start-1" class="form-control timepicker valid text-center hide" value="08 : 00" name="event-time-start-1" data-timepicki-tim="08" data-timepicki-mini="00"></td>
                                                <td><div id="event-time-end-1">16 : 00</div><input type="text" id="event-input-time-end-1" class="form-control timepicker valid text-center hide" value="16 : 00" name="event-time-end-1" data-timepicki-tim="16" data-timepicki-mini="00"></td>
                                                <td class="text-center" style="padding-right: 0px; padding-left: 0px;">
                                                    <a id="event-edit-button-1" class="btn btn-3d btn-reveal btn-yellow" onclick="eventEdit(1)">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="event-cancel-button-1" onclick="eventCancel(1)" class="btn btn-3d btn-reveal btn-red hide">
                                                        <i class="fa fa-times"></i>
                                                        <span>ยกเลิก</span>
                                                    </a>
                                                    <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" onclick="eventRemove(1)" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash"  data-toggle="modal" data-target=".event-modal"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--แถบปุ่มบันทึก----------------------------------------------------------------------------------------------}}


                        <div class="row">
                            <div class="col-xs-5 col-md-1 col-sm-2">
                                <button type="submit" class="btn btn-3d btn-reveal btn-green">
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
        .time-table th,.time-table td{
            text-align: center;
        }
        .time-table td{
            line-height: 2.5 !important;
            width: 10%;
        }
        @media screen and (max-width: 700px) {
            .time-table input {
                min-width: 90px;
            }
        }
        .no-padding{
            padding: 0px;
        }
        .room-table td{
            line-height: 2.5 !important;
            width: 35%;
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
    </style>
@endsection

@section('js-top')
    <script>
        var room_count = 2;
        function roomEdit(id){
            $("#room-name-"+id).addClass("hide");
            $("#room-size-"+id).addClass("hide");
            $("#room-input-name-"+id).removeClass("hide");
            $("#room-input-size-"+id).removeClass("hide");
            $("#room-edit-button-"+id).addClass("hide");
            $("#room-cancel-button-"+id).removeClass("hide");
        }
        function roomCancel(id){
            //var name = $("#room-input-name-"+id).value;
            var name = document.getElementById("room-name-"+id).innerText;
            document.getElementById("room-input-name-box-"+id).value = name;
            var size = document.getElementById("room-size-"+id).innerText;
            size = size.split(" ");
            size = size[0];
            document.getElementById("room-input-size-box-"+id).value = size;
            $("#room-name-"+id).removeClass("hide");
            $("#room-size-"+id).removeClass("hide");
            $("#room-input-name-"+id).addClass("hide");
            $("#room-input-size-"+id).addClass("hide");
            $("#room-edit-button-"+id).removeClass("hide");
            $("#room-cancel-button-"+id).addClass("hide");
        }
        function roomRemove(id){
            $("#room-confirm-remove-button").attr("onclick","roomConfirmRemove("+id+")");
        }
        function roomConfirmRemove(id){
            $("#room-"+id).addClass("hide");
        }
        function roomCreate(){
            var name = document.getElementById("room-input-name-new").value;
            var size = document.getElementById("room-input-size-new").value;
            document.getElementById("room-input-name-new").value = "";
            document.getElementById("room-input-size-new").value = "";
            room_count = room_count + 1;
            var i = room_count;
            var txt ='<tr id="room-'+i+'">'
                    +'<td>'
                    +'  <div id="room-name-'+i+'">'+name+'</div>'
                    +'  <div id="room-input-name-'+i+'" class="hide">'
                    +'      <input id="room-input-name-box-'+i+'" type="text" class="form-control" name="room['+i+'][name]" placeholder="ชื่อห้องประชุม" value="'+name+'">'
                    +'  </div>'
                    +' </td>'
                    +'<td>'
                    +'  <div id="room-size-'+i+'">'+size+' คน</div>'
                    +'  <div id="room-input-size-'+i+'" class="hide">'
                    +'      <div class="col-xs-12 no-padding">'
                    +'          <input id="room-input-size-box-'+i+'" type="text" class="form-control" style="display: inline; width: 90%;" name="room['+i+'][size]" placeholder="จำนวนคนที่จุได้" value="'+size+'">'
                    +'          คน'
                    +'      </div>'
                    +'  </div>'
                    +'</td>'


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

        function eventCreate(){
            var dateStart = document.getElementById("event-date-start-new").value;
            var dateEnd = document.getElementById("event-date-end-new").value;
            var timeStart = document.getElementById("event-time-start-new").value;
            var timeEnd = document.getElementById("event-time-end-new").value;
            document.getElementById("event-date-start-new").value = "";
            document.getElementById("event-date-end-new").value = "";
            document.getElementById("event-time-start-new").value = "";
            document.getElementById("event-time-end-new").value = ""
            alert(dateStart + " " + dateEnd + " " + timeStart + " " + timeEnd);
        }

        function eventEdit(id){
            $("#event-date-start-"+id).addClass("hide");
            $("#event-date-end-"+id).addClass("hide");
            $("#event-time-start-"+id).addClass("hide");
            $("#event-time-end-"+id).addClass("hide");
            $("#event-input-date-start-"+id).removeClass("hide");
            $("#event-input-date-end-"+id).removeClass("hide");
            $("#event-input-time-start-"+id).removeClass("hide");
            $("#event-input-time-end-"+id).removeClass("hide");
            $("#event-edit-button-"+id).addClass("hide");
            $("#event-cancel-button-"+id).removeClass("hide");
        }
        function eventCancel(id){
            $("#event-date-start-"+id).removeClass("hide");
            $("#event-date-end-"+id).removeClass("hide");
            $("#event-time-start-"+id).removeClass("hide");
            $("#event-time-end-"+id).removeClass("hide");
            $("#event-input-date-start-"+id).addClass("hide");
            $("#event-input-date-end-"+id).addClass("hide");
            $("#event-input-time-start-"+id).addClass("hide");
            $("#event-input-time-end-"+id).addClass("hide");
            $("#event-edit-button-"+id).removeClass("hide");
            $("#event-cancel-button-"+id).addClass("hide");
        }

        function eventRemove(id){
            $("#event-confirm-remove-button").attr("onclick","eventConfirmRemove("+id+")");
        }
        function eventConfirmRemove(id){
            $("#event-"+id).addClass("hide");
        }
    </script>
@endsection
