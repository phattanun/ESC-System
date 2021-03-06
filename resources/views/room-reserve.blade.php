@extends('masterpage')

@section('title')
    จองห้องประชุม/ผลการจองห้องประชุม
@endsection
@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection
@section('conferenceNavToggle')
    active
@endsection
@section('bodyTitle')
    จองห้องประชุม/ผลการจองห้องประชุม
@endsection
@section('js-top')
    <script>
        if ($(window).width() <=768){
            window.location="{{url('/room/reserve/mobile')}}";
        }
    </script>
@endsection
@section('content')
    <section  id="middle">
        <div id="content" class="padding-40">
            @if($permission&&$permission->room||$announcement['announcement']!='')
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!-- Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
								<span class="title elipsis">
									<strong>ประกาศ</strong> <!-- panel title -->
								</span>
                        </div>
                        <!-- panel content -->
                        <div class="panel-body">
                            <div id="announcement" class="text-center"><p id="announcementText">{{$announcement['announcement']}}</p></div>
                            @if($permission&&$permission->room)
                                <form novalidate="novalidate" class="validate" action="{{url().'/room/edit_announcement'}}" method="post" enctype="multipart/form-data" data-error="เกิดความผิดพลาด กรุณาลองใหม่อีกครั้ง" data-success="บันทึกสำเร็จ!<script>window.location='{{url()}}/room/reserve';</script>" data-toastr-position="top-right">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                <input id = "announcementEditBox"  name="announcement" class="form-control hidden" type="text">
                            <div id="editAnnouncementButton"  class="text-center">
                                <a class="btn btn-3d btn-reveal btn-yellow">
                                    <i class="fa fa-edit"></i>
                                    <span>แก้ไข</span>
                                </a>
                            </div>
                                <div class="row text-center hidden" id="edit-panel">
                                    <div class="col-md-offset-5 col-md-1 ">
                                        <button id="save-btn" type="submit" class="btn btn-3d btn-reveal btn-green ">
                                            <i class="fa fa-check"></i>
                                            <span>บันทึก</span>
                                        </button>
                                    </div>
                                    <div class="col-md-1">
                                        <a id="cancel-btn" class="btn btn-3d btn-reveal btn-red ">
                                            <i class="fa fa-times"></i>
                                            <span>ยกเลิก</span>
                                        </a>
                                    </div>
                                </div>
                                </form>
                            @endif
                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /Panel -->
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!-- Panel -->
                    <div id="panel-calendar" class="panel panel-default">

                        <div class="panel-heading">

								<span class="title elipsis">
									<strong>ปฏิทิน</strong> <!-- panel title -->
								</span>
                            <div class="panel-options pull-right"><!-- panel options -->
                                <ul class="options list-unstyled">
                                    <li>
                                        <a href="#" class="opt dropdown-toggle" data-toggle="dropdown"><span id="agenda_lb"><span id="agenda_btn"></span> <span class="caret"></span></span></a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a id="month" data-widget="calendar-view" data-label="label label-success"><i class="fa fa-calendar-o color-green"></i> <span>เดือน</span></a></li>
                                            <li><a id="agendaWeek" data-widget="calendar-view" data-label="label label-danger"><i class="fa fa-calendar-o color-red"></i> <span>แผนงาน</span></a></li>
                                            <li><a id="agendaDay" data-widget="calendar-view" data-label="label label-warning"><i class="fa fa-calendar-o color-yellow"></i> <span>วันนี้</span></a></li>
                                            <li><a id="basicWeek" data-widget="calendar-view" data-label="label label-default"><i class="fa fa-calendar-o color-gray"></i> <span>สัปดาห์</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                </ul>
                            </div><!-- /panel options -->
                            <a class="pull-right" data-toggle="modal" data-target="#mapModal" id="map-btn">ดูแผนที่ห้อง</a>
                        </div>

                        <!-- panel content -->
                        <div class="panel-body">
                            <div id="instruction"  class="text-center">
                                <p>วิธีจองห้อง: คลิกวันที่ต้องการเพื่อทำการจองห้อง</p>
                            </div>
                            <div id="calendar-info" class="text-center">
                                <div class="row">
                                    <p class="col-md-offset-3 col-md-2"><span style="background-color: #f0ad4e;">สีส้ม: รอการอนุมัติ</span></p>
                                    <p class="col-md-2"><span style="background-color: #5cb85c;">สีเขียว: ได้รับการอนุมัติ</span></p>
                                    <p class="col-md-2"><span style="background-color: #d9534f;">สีแดง: ไม่ได้รับการอนุมัติ</span></p>
                                </div>
                            </div>
                            <div id="calendar" data-modal-create="true"><!-- CALENDAR CONTAINER --></div>

                        </div>
                        <!-- /panel content -->

                    </div>
                    <!-- /Panel -->

                </div>

            </div>

        </div>
    </section>
    <div id="myModal" class="modal type-danger fade size-normal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-calendar"></i> จองห้อง</h4>
                </div>
                <form class="validate" id="reserve-form">
                    <div class="modal-body">
                        <p id="request-date"></p>
                        @if(!$user)
                            <div>
                                <input required id="organization" name="organization" type="text" class="form-control"
                                       placeholder="หน่วยงาน">
                            </div>
                        @else
                            <select name="project" class="form-control select2 required" id="project-selection">
                                <option selected="selected" value="0">โครงการ / กิจกรรมที่ต้องการ</option>
                                @foreach($activity as $activities)
                                    <option value="{{$activities['act_id']}}">{{$activities['name']}}</option>
                                @endforeach
                            </select>
                            <div id="no-needed-activity-div">
                                <a id="no-needed-activity"
                                   class="underline-hover">ไม่มีโครงการ/กิจกรรมที่คุณต้องการอยู่ในระบบ?</a>
                            </div>
                            <div>
                                <input required id="otherAct" name="otherAct" type="text" class="form-control hidden"
                                       placeholder="ระบุโครงการ / กิจกรรมของคุณ">
                            </div>
                            <div class="hidden margin-top-minus-20 " id="back-to-activity-div">
                                <a id="back-to-activity" class="underline-hover">กลับไปยังลิสต์รายการเดิม</a>
                            </div>
                            <select name="division" class="form-control select2 required" id="division-selection">
                                <option selected="selected" value="0">หน่วยงาน</option>
                                @foreach($generation as $generations)
                                    <option value="{{$generations['div_id']}}">รุ่น {{$generations['name']}}</option>
                                @endforeach
                                @foreach($group as $groups)
                                    <option value="{{$groups['div_id']}}">กรุ๊ป {{$groups['name']}}</option>
                                @endforeach
                                @foreach($department as $departments)
                                    <option value="{{$departments['div_id']}}">ภาควิชา{{$departments['name']}}</option>
                                @endforeach
                                @foreach($club as $clubs)
                                    <option value="{{$clubs['div_id']}}">ชมรม{{$clubs['name']}}</option>
                                @endforeach
                            </select>
                            <div id="no-needed-division-div" class="margin-bottom-20 text-right">
                                <a id="no-needed-division"
                                   class="underline-hover">ไม่มีหน่วยงานที่คุณต้องการอยู่ในระบบ?</a>
                            </div>
                            <div>
                                <input required id="otherDiv" name="otherDiv" type="text" class="form-control hidden"
                                       placeholder="ระบุหน่วยงานของคุณ">
                            </div>
                            <div class="hidden margin-top-minus-20 margin-bottom-20 text-right" id="back-to-division-div">
                                <a id="back-to-division" class="underline-hover">กลับไปยังลิสต์รายการเดิม</a>
                            </div>
                        @endif
                           <input required min="0" max="1000" type="text" class="calendar_event_input_add form-control stepper"
                                   name="numberOfPeople" id="numberOfPeople"
                                   placeholder="จำนวนคน"/>
                        <select name="room" class="form-control select2 required" id="room-selection">
                            @foreach($room as $rooms)
                                <option value="{{$rooms['room_id']}}">{{$rooms['name'].' ขนาด '.$rooms['size']}}</option>
                            @endforeach
                        </select>
                        <textarea required name="objective" class="form-control margin-top-20" id="apptEventDescription"
                                  placeholder="จุดประสงค์ในการขอใช้สถานที่" rows="3"></textarea>
                        <input type="hidden" name="date" id="apptDate" value=""/>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label class="margin-bottom-10">เลือกช่วงเวลา</label>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="margin-bottom-20">
                                        <div class="col-md-3 col-sm-3 no-margin">
                                            <label>เริ่ม</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 no-margin">
                                            <input required id="startTime" name="startTime" type="text"
                                                   class="form-control timepickerr valid">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 no-margin-left">
                                    <div class="margin-bottom-20">
                                        <div class="col-md-3 col-sm-3 no-margin">
                                            <label>สิ้นสุด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 no-margin">
                                            <input required name="endTime" id="endTime" type="text"
                                                   class="form-control timepickerr valid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($permission&&$permission->room)
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12">
                                        <label class="margin-bottom-10">เลือกช่วงวัน</label>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="margin-bottom-20">
                                            <div class="col-md-3 col-sm-3 no-margin">
                                                <label>เริ่ม</label>
                                            </div>
                                            <div class="col-md-9 col-sm-9 no-margin">
                                                <input name="dateStart" id="dateStart" type="text"
                                                       class="form-control datepicker" data-format="yyyy-mm-dd"
                                                       data-lang="en" data-RTL="false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 no-margin-left">
                                        <div class="margin-bottom-20">
                                            <div class="col-md-3 col-sm-3 no-margin">
                                                <label>สิ้นสุด</label>
                                            </div>
                                            <div class="col-md-9 col-sm-9 no-margin">
                                                <input name="dateEnd" id="dateEnd" type="text"
                                                       class="form-control datepicker" data-format="yyyy-mm-dd"
                                                       data-lang="en" data-RTL="false">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="margin-bottom-20">
                            <label style="margin-bottom: 10px;">อุปกรณ์ที่ต้องการยืมเพิ่มเติม</label>
                            <div class="row">
                                {{--<div class="col-sm-6">--}}
                                {{--<label class="checkbox">--}}
                                {{--<input id="whiteboard" name="borrow[]" type="checkbox" value="whiteboard">--}}
                                {{--<i></i> ปากกาไวท์บอร์ด--}}
                                {{--</label>--}}
                                {{--</div>--}}
                                <div class="col-sm-3">
                                    <label class="checkbox">
                                        <input id="projector" name="borrow[]" type="checkbox" value="projector">
                                        <i></i> โปรเจกเตอร์
                                    </label>

                                </div>
                                <div class="col-sm-9">
                                    <label class="checkbox">
                                        <input id="cord" name="borrow[]" type="checkbox" value="cord">
                                        <i></i> ปลั๊กพ่วง
                                    </label>
                                    <input required name="numberOfCord" type="text" class="form-control hidden number-only"
                                           id="numberOfCord"
                                           placeholder="ระบุจำนวนที่ต้องการ"/>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<label class="checkbox">--}}
                            {{--<input id="other" name="borrow[]" type="checkbox" value="other" class="pull-right">--}}
                            {{--<i></i> อื่นๆ:--}}
                            {{--</label>--}}
                            {{--<input  name="otherBorrow" type="text" class="form-control" id="otherBorrow"--}}
                            {{--placeholder="ระบุอุปกรณ์ที่ต้องการ"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        {{--<input type="text" class="form-control" id="postscript" name="postscript"--}}
                        {{--placeholder="หมายเหตุ: รายละเอียดเพิ่มเติมอื่น ๆ ที่ต้องการแจ้งผู้ดูแล"/>--}}
                        @if(!$user)
                            <hr>
                            <p><i class="fa fa-user"></i> รายละเอียดผู้จอง</p>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input required id="student_id" name="student_id" type="text"
                                               class="form-control masked" data-format="9999999999" data-placeholder="X"
                                               placeholder="รหัสนิสิต 10 หลัก">
                                        {{--<input required name="student_id" type="text" class="form-control" placeholder="รหัสนิสิต">--}}
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input required id="faculty" name="faculty" type="text" class="form-control"
                                               placeholder="คณะ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input required id="name" name="name" type="text" class="form-control"
                                               placeholder="ชื่อ">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input required id="surname" name="surname" type="text" class="form-control"
                                               placeholder="นามสกุล">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="fancy-form"><!-- input -->
                                            <i class="fa fa-phone-square"></i>
                                            <input required type="text" id="phone" name="phone"
                                                   class="form-control masked" data-format="(999) 999-9999"
                                                   data-placeholder="X" placeholder="เบอร์โทรศัพท์">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <input required id="email" name="email" type="email" class="form-control"
                                               placeholder="อีเมล">
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="submit-btn"><i
                                        class="fa fa-check"></i>
                                ส่งคำจอง
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-times"></i>
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="mapModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mapPhoto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">แผนที่ห้องประชุม</h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <img id="map-img" width="100%">
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer " style="text-align: center;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{url('assets/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/plugins/fullcalendar/add-on/scheduler.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/css/layout-calendar-reserve.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('js')
    <script type="text/javascript" src="{{url('assets/plugins/moment/moment.min.js')}}"></script>
    <script type="text/javascript">
        $('#map-btn').click(function () {
            $.get( "{{url('/room/map')}}").done(function(data) {
                $('#map-img').attr('src', data);
            });
        });
        @if($permission&&$permission->room)
        $("#editAnnouncementButton").click(function () {
            $("#announcement").hide();
            $("#announcementEditBox").val($("#announcementText").text());
            $("#announcementEditBox").removeClass('hidden');
            $("#edit-panel").removeClass('hidden');
            $(this).hide();
        });
        $("#cancel-btn").click(function(){
            $("#announcement").show();
            $("#announcementEditBox").addClass('hidden');
            $("#edit-panel").addClass('hidden');
            $("#editAnnouncementButton").show();
        });
        @endif
        $('#no-needed-activity').click(function () {
            $('#no-needed-activity-div').hide();
            $('#no-needed-activity-div').prev().hide();
            $('#otherAct').removeClass('hidden');
            $('#back-to-activity-div').removeClass('hidden');
        });
        $('#back-to-activity').click(function () {
            $('#back-to-activity-div').addClass('hidden');
            $('#project-selection').next().show();
            $('#otherAct').addClass('hidden');
            $('#no-needed-activity-div').show();
        });
        $('#no-needed-division').click(function () {
            $('#no-needed-division-div').hide();
            $('#no-needed-division-div').prev().hide();
            $('#otherDiv').removeClass('hidden');
            $('#back-to-division-div').removeClass('hidden');
        });
        $('#back-to-division').click(function () {
            $('#back-to-division-div').addClass('hidden');
            $('#division-selection').next().show();
            $('#otherDiv').addClass('hidden');
            $('#no-needed-division-div').show();
        });
        ($('#cord').is(':checked')) ? $('#numberOfCord').removeClass('hidden') : $('#numberOfCord').addClass('hidden');
        $('#cord').on('change', function () {
            ($(this).is(':checked')) ? $('#numberOfCord').removeClass('hidden') : $('#numberOfCord').addClass('hidden');
        });
        $(".number-only").keydown(function (e) {
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
        $('#submit-btn').click(function () {
            if ($('#reserve-form').valid()) {
                var URL_ROOT = '{{Request::root()}}';
                $.post(URL_ROOT +
                        @if(!$user)'/room/guest/submit_request',
                        @else '/room/user/submit_request',
                            @endif
                        {
                            date: $('#apptDate').val(),
                            @if(!$user)
                            organization: $('#organization').val(),
                            name: $('#name').val(),
                            surname: $('#surname').val(),
                            phone: $('#phone').val(),
                            email: $('#email').val(),
                            student_id: $('#student_id').val(),
                            faculty: $('#faculty').val(),
                            @endif
                            @if($user)
                            project: $('#project-selection').val(),
                            division: $('#division-selection').val(),
                            otherAct: $('#otherAct').val(),
                            otherActActivated: $('#otherAct').is(":visible"),
                            otherDiv: $('#otherDiv').val(),
                            otherDivActivated: $('#otherDiv').is(":visible"),
                            @endif
                            numberOfPeople: $('#numberOfPeople').val(),
                            room: $('#room-selection').val(),
                            objective: $('#apptEventDescription').val(),
                            startTime: $('#startTime').val(),
                            endTime: $('#endTime').val(),
                            @if($permission&&$permission->room)
                            dateStart: $('#dateStart').val(),
                            dateEnd: $('#dateEnd').val(),
                            @endif
                            //                            whiteboard: $('#whiteboard').is(':checked'),
                            projector: $('#projector').is(':checked'),
                            cord: $('#cord').is(':checked'),
//                            other: $('#other').is(':checked'),
//                            otherBorrow: $('#otherBorrow').val(),
//                            postscript: $('#postscript').val(),
                            numberOfCord: $('#numberOfCord').val(),
                            _token: '{{csrf_token()}}'
                        }).done(function (input) {
                    if (input == 'noright') {
                        _toastr("คุณไม่มีสิทธิทำรายการนี้", "top-right", "error", false);
                        return false;
                    }
                    else if (input == 'peoplenotnumber') {
                        _toastr("กรุณาระบุจำนวนคนเป็นตัวเลข", "top-right", "error", false);
                        return false;
                    }
                    else if (input == 'cordnotnumber') {
                        _toastr("กรุณาระบุจำนวนปลั๊กพ่วงเป็นตัวเลข", "top-right", "error", false);
                        return false;
                    }
                    else if (input == 'noproject') {
                        _toastr("โปรดระบุโครงการหรือกิจกรรมให้ถูกต้อง", "top-right", "error", false);
                        return false;
                    }
                    else if (input == 'nodivision') {
                        _toastr("โปรดระบุหน่วยงานให้ถูกต้อง", "top-right", "error", false);
                        return false;
                    }
                    else {
                        _toastr("ส่งคำจองสำเร็จ", "top-right", "success", false);
                        $('#calendar').fullCalendar( 'refetchEvents' );
                        $('#myModal').modal('hide');
                        return false;
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                    return false;
                });
            }
        });
        var dateTimeSchedule = <?php echo $dateTimeSchedule ?>;
        var normalSchedule = <?php echo $normalSchedule ?>;
        var normalminhour = moment(normalSchedule['start'],'HH : mm').format('HH');
        var normalmaxhour = moment(normalSchedule['end'],'HH : mm').format('HH');
        loadScript(plugin_path + "jquery/jquery.cookie.js", function () {
            loadScript(plugin_path + "jquery/jquery-ui.min.js", function () {
                loadScript(plugin_path + "jquery/jquery.ui.touch-punch.min.js", function () {
                    loadScript(plugin_path + "moment.min.js", function () {
                        loadScript(plugin_path + "bootstrap.dialog/dist/js/bootstrap-dialog.min.js", function () {
                                loadScript(plugin_path + "fullcalendar/fullcalendar.reserve.min.js", function () {
                                    loadScript(plugin_path + "fullcalendar/add-on/scheduler.min.js", function () {
                                        loadScript(plugin_path + "fullcalendar/lang/th.min.js", function () {
                                            jQuery(document).ready(function () {
                                                _fullCalendar();
                                            });
                                            function _fullCalendar() {
                                                if (jQuery('#calendar').length > 0) {
                                                    var _calendarInstance = jQuery('#calendar').fullCalendar({
                                                        lang: 'th',
                                                        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                                                        defaultView: 'month',
                                                        minTime: '8:00',
                                                        maxTime: '18:00',
                                                        slotDuration: '00:15',
                                                        height: "auto",
                                                        eventOrder: 'start',
                                                        displayEventEnd: true,
                                                        allDaySlot: false,
                                                        editable: false,
                                            			eventLimit: 6,
                                                        resources: '{{url('/room/get_room')}}',
                                                        events: '{{url('/room/get_room_reservation_schedule')}}',
                                                        dayClick: function(date, jsEvent, view, resource) {
                                                            if (jQuery("#calendar").attr('data-modal-create') == 'true') {
                                                                var check = moment(date);
                                                                var today = moment(new Date()).stripZone();
                                                                if (check.isBefore(today)||check.isSame(today)) {
                                                                    $('#calendar').fullCalendar('gotoDate', date );
                                                                    $('#calendar').fullCalendar('changeView', 'agendaDay');
                                                                    $("#agenda_btn").empty().append($("#" + $("#calendar").fullCalendar('getView').name + " span").html());
                                                                    $("#agenda_lb").attr('class',$("#agendaDay").data('label'));
                                                                }
                                                                @if(!($permission&&$permission->room))
                                                                    else if (check.diff(today,'days')>=30||$(this).closest('div[class~="fc-day"]').hasClass("closed")) {
                                                                        _toastr("ไม่สามารถจองล่วงหน้าเกิน 30 วันได้", "top-right", "error", false);
                                                                    }
                                                                @endif
                                                                else {
                                                                    @if(!($permission&&$permission->room))
                                                                        for(var i=0; i<dateTimeSchedule.length;i++){
                                                                            if(dateTimeSchedule[i]['room_closed']&&moment(check).isBetween(dateTimeSchedule[i]['start_date'],moment(dateTimeSchedule[i]['end_date']).add(1, 'd'), null, '[]')){
                                                                                _toastr("ห้องปิดระหว่าง "+dateTimeSchedule[i]['start_date']+" ถึง " +dateTimeSchedule[i]['end_date'] , "top-right", "error", false);
                                                                                return false;
                                                                            }
                                                                        }
                                                                    @endif
                                                                    var minhour = normalminhour;
                                                                    var maxhour = normalmaxhour;
                                                                    for(var i=0; i<dateTimeSchedule.length;i++){
                                                                        if(!dateTimeSchedule[i]['room_closed']&&moment(check).isBetween(dateTimeSchedule[i]['start_date'],moment(dateTimeSchedule[i]['end_date']).add(1, 'd'), null, '[]')){
                                                                            minhour = moment(dateTimeSchedule[i]['start_time'],'HH : mm').format('HH');
                                                                            maxhour = moment(dateTimeSchedule[i]['end_time'],'HH : mm').format('HH');
                                                                            break;
                                                                        }
                                                                    }
                                                                    $('.time_pick').each(function() {
                                                                        $( this ).after($(this).html());
                                                                    });
                                                                    $('.time_pick').remove();
                                                                    $('.timepicker_wrap').remove();
                                                                    $('.timepickerr').unbind();
                                                                        loadScript(plugin_path + 'timepicki/timepicki.min.js', function() {
                                                                        if(jQuery().timepicki) {
                                                                            $('.timepickerr').timepicki({
                                                                                show_meridian:false,
                                                                                min_hour_value:minhour,
                                                                                max_hour_value:maxhour,
                                                                                step_size_minutes:15,
                                                                                overflow_minutes:false,
                                                                                increase_direction:'up',
                                                                                disable_keyboard_mobile: true});
                                                                        }
                                                                    });
                                                                    $('#startTime').attr({'data-timepicki-tim':minhour,'data-timepicki-mini':'00'});
                                                                    $('#startTime').val(minhour+' : 00');
                                                                    $('#endTime').attr({'data-timepicki-tim':maxhour,'data-timepicki-mini':'00'});
                                                                    $('#endTime').val(maxhour+' : 00');
                                                                    $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
                                                                    day = moment(date).format('ddd, DD MMMM YYYY');
                                                                    dateStart = moment(date).format('YYYY-MM-DD');
                                                                    // dateEnd = moment(end).format('YYYY-MM-DD');
                                                                    @if($permission&&$permission->room)
                                                                    $("#dateStart").val(dateStart);
                                                                    $("#dateEnd").val(dateStart);
                                                                    @endif
                                                                    $("#request-date").html('<i class="fa fa-clock-o"></i> ' + day);
                                                                    $("#apptDate").val(dateStart);
                                                                    $('#myModal').modal();
                                                                }
                                                            }
                                                        },
                                                        resourceRender: function(resource, label, body) {
                                                            label.append("<br>("+resource.size+")");
                                                        },
                                                        eventRender: function (event, element, icon) {
                                                            if (!event.description == '') {
                                                                element.find('.fc-title').append("<br /><span class='font300 fsize11'>" + event.description + "</span>");
                                                            }
                                                            element.attr('title',event.title);
                                                            element.attr('data-toggle','tooltip');
//
                                                        },
                                                        eventAfterAllRender: function(){
                                                            $('[data-toggle="tooltip"]').tooltip();
                                                    }
                                                });
                                                }
                                            }

                                            $("#agenda_btn").empty().append($("#" + $("#calendar").fullCalendar('getView').name + " span").html());
                                            $("#agenda_lb").attr('class',$("#" + $("#calendar").fullCalendar('getView').name).data('label'));

                                            $("a[data-widget=calendar-view]").bind("click", function (e) {
                                                e.preventDefault();
                                                var _view = $(this).attr('id'),
                                                        _name = $('span', this).html(),
                                                        _label = $(this).data('label');
                                                if (_view) {
                                                    $("#calendar").fullCalendar('changeView', _view.trim()); // month  , basicWeek , basicDay , agendaWeek , agendaDay
                                                    $("#agenda_btn").empty().append(_name);
                                                    $("#agenda_lb").attr('class',_label);
                                                }
                                            });
                                            // jQuery(document).ready(function () {
                                            //     var calendar_view = jQuery.cookie('calendar_view');
                                            //     var calendar_view_name = jQuery.cookie('calendar_view_name');
                                            //     if (calendar_view && calendar_view_name) {
                                            //         jQuery('#calendar').fullCalendar('changeView', calendar_view.trim());
                                            //         jQuery("#agenda_btn").empty().append(calendar_view_name);
                                            //     }
                                            // });
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });
    </script>
@endsection
