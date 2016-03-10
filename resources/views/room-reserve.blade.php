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
                {{--<form class="validate" action="{{url().'/room/submit_request'}}" method="post"--}}
                      {{--enctype="multipart/form-data" data-success="ส่งคำจองสำเร็จ"--}}
                      {{--data-toastr-position="top-right">--}}
                    {{--<input type="hidden" name="_token" value="{{{ csrf_token() }}}">--}}
                    <div class="modal-body">
                        <p id="request-date"><i class="fa fa-clock-o"></i></p>
                        <select name="project" class="form-control select2 required">
                            <option selected="selected" value="1">ส่วนงาน / งาน / ชมรม / ฝ่าย / ชั้นปี</option>
                            <option value="2">โครงการ 2</option>
                        </select>
                        <input required type="text" class="calendar_event_input_add form-control" id="numberOfPeople"
                               placeholder="จำนวนคน"/>
                        <textarea class="form-control" id="apptEventDescription" placeholder="จุดประสงค์ในการขอใช้สถานที่" rows="3"></textarea>
                        <input type="hidden" id="apptStartTime" value="' + start + '"/>
                        <input type="hidden" id="apptEndTime" value="' + end + '"/>
                        <input type="hidden" id="apptAllDay" value="' + allDay + '"/>
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
                                            <input type="text" class="form-control timepicker valid"
                                                   value="08 : 00 : AM"
                                                   data-timepicki-tim="08" data-timepicki-mini="00"
                                                   data-timepicki-meri="AM">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 no-margin-left">
                                    <div class="margin-bottom-20">
                                        <div class="col-md-3 col-sm-3 no-margin">
                                            <label>สิ้นสุด</label>
                                        </div>
                                        <div class="col-md-9 col-sm-9 no-margin">
                                            <input type="text" class="form-control timepicker valid"
                                                   value="07 : 00 : PM"
                                                   data-timepicki-tim="07" data-timepicki-mini="00"
                                                   data-timepicki-meri="PM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="margin-bottom-20">
                            <label>อุปกรณ์ที่ต้องการยืมเพิ่มเติม</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1">
                                        <i></i> ปากกาไวท์บอร์ด
                                    </label>

                                </div>
                                <div class="col-sm-6">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1">
                                        <i></i> โปรเจกเตอร์
                                    </label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1">
                                        <i></i> ปลั๊กพ่วง
                                    </label>

                                </div>
                                <div class="col-sm-6">
                                    <label class="checkbox">
                                        <input type="checkbox" value="1" class="pull-right">
                                        <i></i> อื่นๆ:
                                    </label>
                                    <input type="text" class="form-control" id="otherBorrow"
                                           placeholder="ระบุอุปกรณ์ที่ต้องการ"/>
                                </div>
                            </div>
                        </div>
                        <input required type="text" class="form-control" id="postscript"
                               placeholder="หมายเหตุ: รายละเอียดเพิ่มเติมอื่น ๆ ที่ต้องการแจ้งผู้ดูแล"/>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"><i
                                        class="fa fa-check"></i>
                                ส่งคำจอง
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-times"></i>
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link href="{{url('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/css/layout-calendar-reserve.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        #middle {
            padding-top: 0px;
        }

        /*label {*/
        /*color: #414141;*/
        /*}*/
        .no-margin {
            margin-left: 0px;
            margin-right: 0px;
            padding-left: 0px;
            padding-right: 0px;
            text-align: center;
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

        .no-margin-right {
            margin-right: 0px;
            padding-right: 0px;
        }

        .margin-right-minus-25 {
            margin-right: -25px;
        }

        .fc-day:hover {
            cursor: pointer;
            background-color: rgba(176, 255, 124, 0.29);
        }

        .select2 {
            margin-bottom: 20px;
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
            <!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

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
                            @if($permission->room)
                            loadScript(plugin_path + "fullcalendar/fullcalendar.js", function () {
                                @else
                                loadScript(plugin_path + "fullcalendar/fullcalendar.reserve.js", function () {
                                    @endif
                                        loadScript(plugin_path + "fullcalendar/gcal.js", function () {
                                        jQuery(document).ready(function () {
                                            _calendarInit();
                                        });
                                        function _calendarInit() {

                                            _fullCalendar();
                                            _calendarEventAdd();

                                        }

                                        function _fullCalendar() {

                                            if (jQuery('#calendar').length > 0) {
                                                /**
                                                 AVAILABLE BACKGROUNDS:
                                                 bg-info
                                                 bg-primary
                                                 bg-success
                                                 bg-warning
                                                 bg-danger

                                                 USAGE:
                                                 className: ["bg-primary"],

                                                 By default, use "bg-primary"
                                                 **/
                                                var _calendarInstance = jQuery('#calendar').fullCalendar({
                                                    draggable: false,
                                                    selectable: true,
                                                    selectHelper: true,
                                                    unselectAuto: true,
                                                    disableResizing: true,
                                                    editable: false,
                                                    header: {
                                                        left: 'title',
                                                    },
                                                    select: function (start, end, allDay) {
                                                        if (jQuery("#calendar").attr('data-modal-create') == 'true') {
                                                            var check = $.fullCalendar.formatDate(start, 'yyyyMMdd');
                                                            var today = $.fullCalendar.formatDate(new Date(), 'yyyyMMdd');
                                                            var next30 = parseInt(today) + 100;
                                                            @if($permission->room)
                                                            if (check <= today) {
                                                            }
                                                            @else
                                                            if (check <= today || parseInt(check) > next30) {
                                                            }
                                                                    @endif
                                                            else {
                                                                $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
                                                                day = jQuery.fullCalendar.formatDate(start, 'ddd, d MMMM yyyy');
                                                                $("#request-date").html('<i class="fa fa-clock-o"></i> ' + day);
                                                                $('#myModal').modal();
//                                                        BootstrapDialog.show({
//                                                            type: BootstrapDialog.TYPE_DANGER,
//                                                            title: '<i class="fa fa-calendar"></i> จองห้อง',
//                                                            message: '<p><i class="fa fa-clock-o"></i> ' + _when_ + '</p>' +
//                                                            '<select name="group" class="form-control select2 required"> <option selected="selected" value="">ส่วนงาน / งาน / ชมรม / ฝ่าย / ชั้นปี</option> <option value="">โครงการ 2</option> </select>' +
//                                                            '<input required type="text" class="calendar_event_input_add form-control" id="numberOfPeople" placeholder="จำนวนคน" />' +
//                                                            '<textarea class="calendar_event_textarea_add form-control" id="apptEventDescription" placeholder="จุดประสงค์ในการขอใช้สถานที่" rows="3"></textarea>' +
//
//                                                            '<input type="hidden" id="apptStartTime" value="' + start + '" />' + /** start date hidden **/
//                                                            '<input type="hidden" id="apptEndTime" value="' + end + '" />' + /** end date hidden **/
//                                                            '<input type="hidden" id="apptAllDay" value="' + allDay + '" />' + /** allday hidden **/
//
//                                                                /* start event color */
//                                                                //'<div class="sky-form">' +
//                                                                //'<div class="block inline-group">' +
//                                                                //	'<label class="fsize11 block margin-top-20">เลือกสีของการจอง</label>' +
//                                                                //	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-primary" checked="checked" /><i></i> <span class="text-primary">Default</span></label>' +
//                                                                //	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-danger" /><i></i> <span class="text-danger">Red</span></label>' +
//                                                                //	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-warning" /><i></i> <span class="text-warning">Yellow</span></label>' +
//                                                                //	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-success" /><i></i> <span class="text-success">Green</span></label>' +
//                                                                //	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-info" /><i></i> <span class="text-info">Blue</span></label>' +
//                                                                //'</div>' +
//                                                                //'</div>' +
//                                                                /* end event color */
//
//                                                            '',
//                                                            buttons: [
//                                                                {
//                                                                    label: '<i class="fa fa-check"></i> ส่งคำจอง',
//                                                                    cssClass: 'btn-success',
//                                                                    hotkey: 13, // Enter.
//                                                                    action: function (dialogItself) {
//                                                                        _calendarEventAdd();
//                                                                        dialogItself.close();
//                                                                        _calendarInstance.fullCalendar('unselect');
//                                                                    }
//                                                                },
//                                                                {
//                                                                    label: '<i class="fa fa-times"></i> ยกเลิก',
//                                                                    cssClass: 'btn-default',
//                                                                    action: function (dialogItself) {
//                                                                        dialogItself.close();
//                                                                        _calendarInstance.fullCalendar('unselect');
//                                                                    }
//                                                                }
//                                                            ]
//                                                        });
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

                                        /**
                                         EVENT ADD
                                         ************************************** **/
                                        function _calendarEventAdd() {
                                            /**
                                             apptEventTitle
                                             apptEventUrl
                                             apptEventDescription

                                             apptStartTime
                                             apptEndTime
                                             apptAllDay
                                             **/

                                            if (jQuery('#apptEventTitle').val()) {
                                                var cal_title = jQuery('#apptEventTitle').val(),
                                                        cal_start = new Date(jQuery('#apptStartTime').val()),
                                                        cal_end = new Date(jQuery('#apptEndTime').val()),
                                                        cal_allDay = (jQuery('#apptAllDay').val() == "true"),
                                                        cal_url = jQuery('#apptEventUrl').val(),
                                                        cal_className = [jQuery("input:radio[name=calendar_event_color]:checked").val()],
                                                        cal_description = jQuery('#apptEventDescription').val(),
                                                        cal_icon = [jQuery("input:radio[name=calendar_ico]:checked").val()] || '';

                                                jQuery("#calendar").fullCalendar('renderEvent', {
                                                    title: cal_title,
                                                    start: cal_start,
                                                    end: cal_end,
                                                    allDay: cal_allDay,

                                                    url: cal_url,
                                                    className: cal_className,
                                                    description: cal_description,
                                                    icon: cal_icon
                                                }, true);
                                                /* make the event "stick" */

                                                // Send data via ajax
                                                var data_action = jQuery('#calendar').attr('data-action');
                                                var data_method = jQuery('#calendar').attr('data-method') || 'GET';

                                                if (data_action) {
                                                    jQuery.ajax({
                                                        url: data_action,
                                                        data: {
                                                            'action': 'create',
                                                            'cal_title': cal_title,
                                                            'cal_start': cal_start,
                                                            'cal_end': cal_end,
                                                            'cal_allDay': cal_allDay.start,
                                                            'cal_url': cal_url.end,
                                                            'cal_className': cal_className,
                                                            'cal_description': cal_description,
                                                            'cal_icon': cal_icon
                                                        },
                                                        type: data_method,

                                                        error: function (XMLHttpRequest, textStatus, errorThrown) {

                                                            // by default, on error, print uri
                                                            jQuery("#toast-container").remove();
                                                            toastr.options.positionClass = 'toast-top-full-width';
                                                            toastr.options.timeOut = 10000;
                                                            toastr.error("Method: " + data_method + "<br />" + data_action + '&action=create&cal_title=' + cal_title + '&cal_start=' + cal_start + '&cal_end=' + cal_end + '&cal_allDay=' + cal_allDay + '&cal_url=' + cal_url + '&cal_className=' + cal_className + '&cal_description=' + cal_description + '&cal_icon=' + cal_icon, "Demo : Calendar Event Add");

                                                        },

                                                        success: function (data) {
                                                        }
                                                    });
                                                }
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

    </script>
@endsection
