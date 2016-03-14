@extends('masterpage')

@section('title')
    ผลการจองห้องประชุม
@endsection
@section('body-attribute')

@endsection
@section('conferenceNavToggle')
    active
@endsection
@section('bodyTitle')
    จองห้องประชุม
@endsection
@section('content')
    <section id="middle">


        <div id="content" class="padding-20">

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
                                        <a href="#" class="opt dropdown-toggle" data-toggle="dropdown"><span
                                                    class="label label-disabled"><span
                                                        id="agenda_btn">เดือน</span> <span class="caret"></span></span></a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a data-widget="calendar-view" href="#month"><i
                                                            class="fa fa-calendar-o color-green"></i> <span>เดือน</span></a>
                                            </li>
                                            <li><a data-widget="calendar-view" href="#agendaWeek"><i
                                                            class="fa fa-calendar-o color-red"></i>
                                                    <span>วาระ</span></a></li>
                                            <li><a data-widget="calendar-view" href="#agendaDay"><i
                                                            class="fa fa-calendar-o color-yellow"></i>
                                                    <span>วันนี้</span></a></li>
                                            <li><a data-widget="calendar-view" href="#basicWeek"><i
                                                            class="fa fa-calendar-o color-gray"></i>
                                                    <span>สัปดาห์</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse"
                                           data-placement="bottom"></a></li>
                                </ul>
                            </div><!-- /panel options -->
                        </div>

                        <!-- panel content -->
                        <div class="panel-body">
                            <div id="announcement" class="text-center"><p>ประกาศ: กวศ.
                                    จะย้ายห้องประชุมไปอยู่ฝรั่งเศส</p></div>
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
                                <option selected="selected" value="0">ส่วนงาน / งาน / ชมรม / ฝ่าย / ชั้นปี</option>
                                @foreach($activity as $activities)
                                    <option value="act-{{$activities['act_id']}}">{{$activities['name']}}</option>
                                @endforeach
                                @foreach($division as $divisions)
                                    <option value="div-{{$divisions['div_id']}}">{{$divisions['name']}}</option>
                                @endforeach
                            </select>
                            <div id="no-needed-activity-div">
                                <a id="no-needed-activity"
                                   class="underline-hover">ไม่มีรายการที่คุณต้องการอยู่ในระบบ?</a>
                            </div>

                            <div>
                                <input required id="otherAct" name="otherAct" type="text" class="form-control hidden"
                                       placeholder="ระบุชื่อกิจกรรมของคุณ">
                            </div>
                            <div class="hidden margin-top-minus-20 " id="back-to-activity-div">
                                <a id="back-to-activity" class="underline-hover">กลับไปยังลิสต์รายการเดิม</a>
                            </div>
                        @endif
                        <input required type="text" class="calendar_event_input_add form-control number-only"
                               name="numberOfPeople" id="numberOfPeople"
                               placeholder="จำนวนคน"/>
                        <select name="room" class="form-control select2 required" id="room-selection">
                            <option selected="selected" value="0">เลือกห้องที่ต้องการ</option>
                            <option value="1">ห้อง 1</option>
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
                                                   class="form-control timepicker valid">
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
                                                   class="form-control timepicker valid">
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
                                    <input name="numberOfCord" type="text" class="form-control hidden number-only"
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

@endsection

@section('css')
    <link href="{{url('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/plugins/fullcalendar/add-on/scheduler.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/css/layout-calendar-reserve.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .underline-hover {
            font-size: 14px;
        }

        .underline-hover:hover {
            text-decoration: underline;
        }

        #no-needed-activity-div, #back-to-activity-div {
            margin-bottom: 20px;
            text-align: right;
        }

        #middle {
            padding-top: 0px;
        }

        .fc-unthemed .fc-today {
            background: rgba(234, 255, 246, 0.41);
        }

        /*form label {*/
        /*color: #414141;*/
        /*}*/
        form label {
            font-weight: 400;
        }

        .row {
            color: #666;
        }

        /*.timepicker {*/
        /*margin-bottom: 0px;*/
        /*}*/
        .modal .row {
            margin-bottom: 0px;
        }

        .checkbox {
            color: #666;
        }

        .no-margin {
            margin-left: 0px;
            margin-right: 0px;
            padding-left: 0px;
            padding-right: 0px;
            text-align: center;
        }

        #room-selection {
            margin-bottom: 20px;
        }

        .no-margin-left {
            margin-left: 0px;
            /*padding-left: 0px;*/
        }

        #otherBorrow {
            position: absolute;
            float: right;
            display: inline-block;
            width: 60%;
        }

        #numberOfCord {
            position: absolute;
            float: right;
            display: inline-block;
            width: 50%;
        }

        .no-margin-right {
            margin-right: 0px;
            padding-right: 0px;
        }

        .margin-right-minus-25 {
            margin-right: -25px;
        }

        .margin-top-minus-20 {
            margin-top: -20px;
        }

        .fc-day:hover {
            cursor: pointer;
            background-color: rgba(176, 255, 124, 0.29);
        }

        .select2 {
            width: 100% !important;
        }

        .fc-past, .fc-today, .fc-other-month.fc-past, .more-than-30 {
            background-image: -webkit-gradient(linear, left top, right bottom, color-stop(.25, rgba(0, 0, 0, .03)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(0, 0, 0, .03)), color-stop(.75, rgba(0, 0, 0, .03)), color-stop(.75, transparent), to(transparent));
            background-image: -webkit-linear-gradient(135deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            background-image: -webkit-linear-gradient(315deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            background-image: linear-gradient(135deg, rgba(0, 0, 0, .03) 25%, transparent 25%, transparent 50%, rgba(0, 0, 0, .03) 50%, rgba(0, 0, 0, .03) 75%, transparent 75%, transparent);
            -webkit-background-size: 16px 16px;
            background-size: 16px 16px;
        }

        .fc-grid .fc-other-month .fc-day-number {
            opacity: 1.0;
        }

        .fc-past:hover, .fc-today:hover, .more-than-30:hover {
            cursor: not-allowed;
            background-color: rgba(255, 164, 142, 0.29);
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('assets/plugins/moment/moment.min.js')}}"></script>
    <script type="text/javascript">
        $('#no-needed-activity').click(function () {
            $('#no-needed-activity-div').hide();
            $('#no-needed-activity-div').prev().hide();
            $('#otherAct').removeClass('hidden');
            $('#back-to-activity-div').removeClass('hidden');
        });
        $('#back-to-activity').click(function () {
            $('#back-to-activity-div').addClass('hidden');
            $('.select2-container').show();
            $('#otherAct').addClass('hidden');
            $('#no-needed-activity-div').show();
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
                            otherAct: $('#otherAct').val(),
                            otherActActivated: $('#otherAct').is(":visible"),
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
                    if (input == 'fail') {
                        _toastr("ไม่พบนิสิตในระบบ", "top-right", "error", false);
                        return false;
                    }
                    else if (input == 'noright') {
                        _toastr("คุณไม่มีสิทธิทำรายการนี้", "top-right", "error", false);
                        return false;
                    }
                    else {
                        _toastr("ส่งคำจองสำเร็จ", "top-right", "success", false);
                        return false;
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                    return false;
                });
            }
        });

        /* Calendar Data */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var _calendarEvents = [
            {
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, 1),
                allDay: false,
                className: ["bg-primary"],
                description: 'MT5',
                icon: 'fa-clock-o'
            },
            {
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                allDay: false,
                className: ["bg-primary"],
                description: '',
                icon: 'fa-check'
            },
            {
                id: 999,
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false,
                className: ["bg-warning"],
                description: '',
                icon: 'fa-clock-o'
            },
            {
                id: 999,
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false,
                className: ["bg-primary"],
                description: '',
                icon: 'fa-clock-o'
            },
            {
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d, 10, 00),
                end: new Date(y, m, d, 11, 00),
                allDay: false,
                className: ["bg-primary"],
                description: '',
                icon: 'fa-lock'
            },
            {
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                className: ["bg-success"],
                description: '',
                icon: 'fa-clock-o'
            },
            {
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                className: ["bg-danger"],
                description: '',
                icon: ''
            },
            {
                title: 'เข้า Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
                className: ["bg-info"],
                description: '',
                icon: 'fa-clock-o'
            }
        ];
        loadScript(plugin_path + "jquery/jquery.cookie.js", function () {
            loadScript(plugin_path + "jquery/jquery-ui.min.js", function () {
                loadScript(plugin_path + "jquery/jquery.ui.touch-punch.min.js", function () {
                    loadScript(plugin_path + "moment.js", function () {
                        loadScript(plugin_path + "bootstrap.dialog/dist/js/bootstrap-dialog.min.js", function () {
                            @if($permission&&$permission->room)
                            loadScript(plugin_path + "fullcalendar/fullcalendar.min.js", function () {
                                @else
                                loadScript(plugin_path + "fullcalendar/fullcalendar.reserve.min.js", function () {
                                    @endif
                                    loadScript(plugin_path + "fullcalendar/add-on/scheduler.min.js", function () {
                                        loadScript(plugin_path + "fullcalendar/lang/th.min.js", function () {
                                            jQuery(document).ready(function () {
                                                _calendarInit();
                                                $('#reserve-form').validate();
                                            });
                                            function _calendarInit() {
                                                _fullCalendar();
                                            }

                                            function _fullCalendar() {

                                                if (jQuery('#calendar').length > 0) {
                                                    var _calendarInstance = jQuery('#calendar').fullCalendar({
                                                        lang: 'th',
                                                        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                                                        draggable: false,
                                                        selectable: true,
                                                        selectHelper: true,
                                                        displayEventEnd: true,
                                                        unselectAuto: true,
                                                        disableResizing: true,
                                                        editable: false,
                                                        header: {
                                                            left: 'title',
                                                        },
                                                        select: function (start, end, allDay) {
                                                            if (jQuery("#calendar").attr('data-modal-create') == 'true') {
                                                                var check = moment(start).format('YYYYMMDD');
                                                                var today = moment(new Date()).format('YYYYMMDD');
                                                                var next30 = parseInt(today) + 100;
                                                                @if($permission&&$permission->room)
                                                                if (check <= today) {
                                                                }
                                                                @else
                                                                if (check <= today || parseInt(check) > next30) {
                                                                }
                                                                        @endif
                                                                else {
                                                                    $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
                                                                    day = moment(start).format('ddd, DD MMMM YYYY');
                                                                    date = moment(start).format('YYYY-MM-DD');
                                                                    @if($permission&&$permission->room)
                                                                    $("#dateStart").val(date);
                                                                    $("#dateEnd").val(date);
                                                                    @endif
                                                                    $("#request-date").html('<i class="fa fa-clock-o"></i> ' + day);
                                                                    $("#apptDate").val(date);
                                                                    $('#myModal').modal();
                                                                }
                                                            }
                                                        },
                                                        events: _calendarEvents,
                                                        eventRender: function (event, element, icon) {

                                                            if (!event.description == '') {
                                                                element.find('.fc-event-title').append("<br /><span class='font300 fsize11'>" + event.description + "</span>");
                                                            }

                                                            if (!event.icon == '') {
                                                                element.find('.fc-event-title').append("<i class='fc-icon fa " + event.icon + "'></i>");
                                                            }
                                                        }
                                                    });
                                                }
                                            }

                                            jQuery("a[data-widget=calendar-view]").bind("click", function (e) {
                                                e.preventDefault();
                                                var _href = jQuery(this).attr('href'),
                                                        _href = _href.replace('#', ''),
                                                        _name = jQuery('span', this).html();
                                                if (_href) {
                                                    jQuery('#calendar').fullCalendar('changeView', _href.trim()); // month  , basicWeek , basicDay , agendaWeek , agendaDay
                                                    jQuery("#agenda_btn").empty().append(_name);
                                                    // add current view to cookie
                                                    jQuery.cookie('calendar_view', _href, {expires: 30}); 		// expire 30 days
                                                    jQuery.cookie('calendar_view_name', _name, {expires: 30}); 	// expire 30 days
                                                }
                                            });
                                            jQuery(document).ready(function () {
                                                var calendar_view = jQuery.cookie('calendar_view');
                                                var calendar_view_name = jQuery.cookie('calendar_view_name');
                                                if (calendar_view && calendar_view_name) {
                                                    jQuery('#calendar').fullCalendar('changeView', calendar_view.trim());
                                                    jQuery("#agenda_btn").empty().append(calendar_view_name);
                                                }
                                            });
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
