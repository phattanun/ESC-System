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

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
                            <a id="confirm-remove-button" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">
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
                                                            <input id="room-input-size-box-1" type="text" class="form-control" style="display: inline; width: 90%;" name="room[1][size]" placeholder="จำนวนคนที่จุได้" value="30">
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
                                                        <i class="fa fa-trash" data-toggle="modal" data-target=".bs-example-modal-sm"></i>
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
                                                            <input id="room-input-size-box-2" type="text" class="form-control" style="display: inline; width: 90%;" name="room[2][size]" placeholder="จำนวนคนที่จุได้" value="20">
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
                                                        <i class="fa fa-trash" data-toggle="modal" data-target=".bs-example-modal-sm"></i>
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
                        <!--div class="row">
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
                                            <input type="text" class="form-control timepicker valid" value="08 : 00 : AM" data-timepicki-tim="08" data-timepicki-mini="00" data-timepicki-meri="AM">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="07 : 00 : PM" data-timepicki-tim="07" data-timepicki-mini="00" data-timepicki-meri="PM">
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
                                            <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>ถึงวันที่</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาเปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="08 : 00 : AM" data-timepicki-tim="08" data-timepicki-mini="00" data-timepicki-meri="AM">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="container-fluid margin-bottom-20">
                                        <div class="col-md-3 col-sm-3" style="line-height: 2">
                                            <label>เวลาปิด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control timepicker valid" value="07 : 00 : PM" data-timepicki-tim="07" data-timepicki-mini="00" data-timepicki-meri="PM">
                                        </div>
                                    </div>
                                    <a class="btn btn-3d btn-reveal btn-success pull-right">
                                        <i class="fa fa-plus"></i>
                                        <span>เพิ่ม</span>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 time-table">
                                    <label class="margin-bottom-20 ">กรณีพิเศษ</label>
                                    <div class="table-responsive margin-bottom-30">
                                        <table class="table" id="permission-table">
                                            <tr>
                                                <th style="vertical-align:middle">ตั้งแต่วันที่</th>
                                                <th style="vertical-align:middle">ถึงวันที่</th>
                                                <th style="vertical-align:middle">เวลาเปิด</th>
                                                <th style="vertical-align:middle">เวลาปิด</th>
                                                <th style="vertical-align:middle"></th>
                                            </tr>
                                            <tr id=""><input type="hidden" id="delete" name="" value="" />
                                                <td>21-03-2016</td>
                                                <td>23-03-2016</td>
                                                <td>08 : 00 : AM</td>
                                                <td>16 : 00 : PM</td>
                                                <td class="text-center">
                                                    <a class="btn btn-3d btn-reveal btn-yellow">
                                                        <i class="fa fa-edit"></i>
                                                        <span>แก้ไข</span>
                                                    </a>
                                                    <a id="" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-toggle="tooltip" data-placement="top" title="ลบจากสิทธิ์ทั้งหมด" style="vertical-align:middle">
                                                        <i class="fa fa-minus"></i>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div-->

{{--แถบปุ่มบันทึก----------------------------------------------------------------------------------------------}}


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
    <style>
        .time-table th,.time-table td{
            text-align: center;
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
            $("#confirm-remove-button").attr("onclick","confirmRemove("+id+")");
        }
        function confirmRemove(id){
            $("#room-"+id).remove();
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
                    +'      <i class="fa fa-trash" data-toggle="modal" data-target=".bs-example-modal-sm"></i>'
                    +'  </a>'
                    +'</td>'
                    +'</tr>';
            $(".room-table").append(txt);
        }
    </script>
@endsection
