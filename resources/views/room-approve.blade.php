@extends('masterpage')

@section('title')
    อนุมัติการจองห้องประชุม
@endsection
@section('body-attribute')

@endsection
@section('conferenceNavToggle')
    active
@endsection
@section('bodyTitle')
    อนุมัติการจองห้องประชุม
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
                                        <a href="#" class="opt dropdown-toggle" data-toggle="dropdown"><span id="agenda_lb"><span id="agenda_btn"></span> <span class="caret"></span></span></a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a id="month" data-widget="calendar-view" data-label="label label-success"><i class="fa fa-calendar-o color-green"></i> <span>เดือน</span></a></li>
                                            <li><a id="agendaWeek" data-widget="calendar-view" data-label="label label-danger"><i class="fa fa-calendar-o color-red"></i> <span>วาระ</span></a></li>
                                            <li><a id="agendaDay" data-widget="calendar-view" data-label="label label-warning"><i class="fa fa-calendar-o color-yellow"></i> <span>วันนี้</span></a></li>
                                            <li><a id="basicWeek" data-widget="calendar-view" data-label="label label-default"><i class="fa fa-calendar-o color-gray"></i> <span>สัปดาห์</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                </ul>
                            </div><!-- /panel options -->
                        </div>
                        <!-- panel content -->
                        <div class="panel-body">
                            <div id="announcement" class="text-center"><p>ประกาศ: กวศ. จะย้ายห้องประชุมไปอยู่ฝรั่งเศส</p></div>
                            <div id="calendar" data-modal-create="true"><!-- CALENDAR CONTAINER --></div>
                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /Panel -->
                </div>
            </div>
        </div>
    </section>

    <div id="slide-backdrop" ></div>
    <div id="slide-bar" class="navbar-default" style="display:none"></div>
    <div id="loading-template" style="display:none">
        <div style="display:table;height:100%;padding-left:15px;">
            <div style="display: table-cell;vertical-align: middle;">
                <i class="fa fa-refresh fa-spin fa-2x"></i>
                <span>&nbsp;&nbsp;กำลังโหลด...</span>
            </div>
        </div>
    </div>

    <div id="event-template" style="display:none">
        <div id="event-container">
            <div class="modal-header">
                <button type="button" class="close" onclick="hideSlide()">&times;</button>
                <h4 class="modal-title"><i class="fa fa-calendar"></i> รายละเอียดการจอง</h4>
            </div>
            <!-- TABs -->
            <ul id="event-tab" class="nav nav-tabs">
              <li class="active">
                  <a href="#" data-tab="reserve">ใบจอง</a></li>
              <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
            </ul>
            <div class="modal-body">
                <form class="validate" action="" method="post"
                      enctype="multipart/form-data" data-success="ยืนยันสำเร็จ<script>window.location='{{url()}}';</script>"
                      data-toastr-position="top-right">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                    <div id="event-info-reserve" class="">
                        <!--div class="row">
                            <div class="col-sm-12">
                                <label>เหตุผล</label>
                                <p class="text-blue">
                                    &emsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in ante magna. Pellentesque at accumsan mi. Suspendisse metus justo, convallis vitae enim porta, congue feugiat turpis. Sed venenatis molestie turpis, et auctor justo vestibulum eget. Vivamus nec porttitor eros. Vivamus ante nulla, eleifend sit amet elementum vel, tristique eu ante. Curabitur ultrices, massa ut ultrices viverra, diam nulla varius lacus, in egestas massa nunc ornare lectus.
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <label>สถานที่ <span class="text-blue">ห้องเขียว</span></label>
                            </div>
                            <div class="col-sm-4">
                                <label>ช่วงเวลา <span class="text-blue">12:00 น.</span></label>
                            </div>
                            <div class="col-sm-4">
                                <label>ถึง <span class="text-blue">16:00 น.</span></label>
                            </div>
                        </div-->
                    </div>

                    <div id="event-info-owner" class="hide">
                        <!--div class="row">
                            <div class="col-sm-4">
                                <label>รหัสนิสิต <span class="text-blue">563XXXXXXX</span></label>
                            </div>
                            <div class="col-sm-4">
                                <label>ชื่อ <span class="text-blue">นายนายนาย</span></label>
                            </div>
                            <div class="col-sm-4">
                                <label>นามสกุล <span class="text-blue">ไม่มีไม่มีไม่มีไม่มีไม่มี</span></label>
                            </div>
                        </div-->
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submit-btn">
                    <i class="fa fa-check"></i>อนุมัติ
                </button>
                <button type="button" class="btn btn-danger" onclick="hideSlide()">
                    <i class="fa fa-times"></i>ยกเลิก
                </button>
            </div>
        </div>
    </div>


    <div id="tools-template" style="display:none">
        <div id="tools-container">
            <div class="modal-header">
                <button type="button" class="close" onclick="hideSlide()">&times;</button>
                <h4 class="modal-title"><i class="fa fa-calendar"></i> เครื่องมือจัดการ: <span id="tools-info-title" class="text-blue"></span></h4>
            </div>
            <!-- TABs -->
            <ul id="tools-tab" class="nav nav-tabs">
              <li class="active">
                  <a href="#" data-tab="event">รายการจอง</a></li>
              <li><a href="#" data-tab="tools">เครื่องมือ</a></li>
            </ul>
            <div class="modal-body">
                <form class="validate" action="" method="post"
                      enctype="multipart/form-data" data-success="ยืนยันสำเร็จ<script>window.location='{{url()}}';</script>"
                      data-toastr-position="top-right">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                    <div id="tools-info-event" class="">
                    </div>

                    <div id="tools-info-tools" class="hide">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" id="submit-btn">
                    <i class="fa fa-random"></i>จัดรายการ
                </button>
                <button type="button" class="btn btn-success" id="submit-btn">
                    <i class="fa fa-check"></i>อนุมัติทั้งหมด
                </button>
                <button type="button" class="btn btn-danger" onclick="hideSlide()">
                    <i class="fa fa-times"></i>ยกเลิก
                </button>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{url('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/plugins/fullcalendar/add-on/scheduler.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/layout-calendar.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #middle {
            padding-top: 0px;
        }
        #slide-bar {
            display: block;
            position: fixed;
            bottom: 12.5%;
            width: 40%;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            z-index: 9999;
            overflow: hidden;
        }
        .left-slide {
            left: 0px;
            border-right: #780000 4px solid;
            border-radius: 0px 3px 3px 0px;
        }
        .right-slide {
            right: 0px;
            border-left: #780000 4px solid;
            border-radius: 3px 0px 0px 3px;
        }
        .modal-footer {
            padding-right: 55px;
        }
        .modal-header {
            border-bottom: none;
        }
        @media (max-height: 667px) {
            #slide-bar { /* FULL HEIGHT */
                bottom: 0;
                height: 100%;
                min-width: 300px;
                width: 40%;
            }
        }
        @media (max-width: 667px) {
            #slide-bar { /* FULL WIDTH */
                bottom: 0;
                max-height: 50%;
                width: 100%;
            }
        }
        #slide-backdrop {
            display: none;
            position: fixed;
            background-color: rgba(0,0,0,0.02);
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            z-index: 9998;
        }
        .fc-resource-cell:hover {
            background-color: rgb(236, 236, 236);
        }
        .fc-content {
            margin: 3px;
        }
        .fc-event > .fc-bg {
            border: black 1px solid;
        }
        .fc-event > .fc-bg:hover {
            opacity: 0;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        var calendar,caldebug;
        function slide(columnId, columnSize, contentId, contentType) {
            $("#slide-bar")
                .addClass((columnId < columnSize ? "right-slide" : "left-slide"))
                .data("side",(columnId < columnSize ? "right-slide" : "left-slide"));
            $("#slide-bar").html($('#loading-template').html());
            $("#slide-backdrop").toggle();

            $("#slide-bar").css('height','50px').animate({"width": "toggle"}, 100, function() {
                if(contentType == 'event') {
                    $.ajax({
                        type: "POST",
                        url: (contentId.split("-")[0].localeCompare('u')==0 ?
                            '{{ url("/room/get_user_reservation") }}': '{{ url("/room/get_guest_reservation") }}'),
                        data: {
                          _token: $("input[name='_token']").val(),
                          id: contentId.split("-")[1]
                        },
                        success: function(response) {
                            caldebug = response;
                            $("#slide-bar").html($("#event-template").html());
                            $("#slide-bar").find("#event-info-reserve").append(JSON.stringify(caldebug.reserve, null, 4));
                            $("#slide-bar").find("#event-info-owner").append(JSON.stringify(caldebug.owner, null, 4));
                            $("#slide-bar").find("#event-tab a[data-tab]").click(function(e) {
                                    e.preventDefault();
                                    $("#slide-bar #event-tab > li").removeClass('active');
                                    $(this.parentElement).addClass('active');
                                    $("#slide-bar div[id*='event-info-']").addClass('hide');
                                    $("#slide-bar #event-info-"+$(this).data('tab')).removeClass('hide');
                                });
                            $("#slide-bar").animate({"min-height":$("#event-container").height()},100);
                        },
                        error : function(e) {
                            var response = e.responseText;
                            if (response == 'login')
                                _toastr("กรุณาเข้าสู่ระบบ", "top-right", "error", false);
                            else if (response == 'permission')
                                _toastr("คุณไม่มีสิทธิทำรายการนี้", "top-right", "error", false);
                            else if (response == 'requestid' || response == 'noowner')
                                _toastr("ข้อมูลการจองไม่ถูกต้อง กรุณาติดต่อผู้ดูแลระบบ", "top-right", "error", false);
                            else if (response == 'notfound')
                                _toastr("ไม่พบข้อมูลการจอง", "top-right", "error", false);
                            else _toastr("ระบบมีปัญหา กรุณาติดต่อผู้ดูแลระบบ", "top-right", "error", false);
                            hideSlide();
                            return false;
                        }
                    });
                }
                else if(contentType == 'tools') {
                    $("#slide-bar").html($("#tools-template").html());
                    $("#slide-bar").find("#tools-info-title").append(contentId);
                    $("#slide-bar").find("#tools-tab a[data-tab]").click(function(e) {
                            e.preventDefault();
                            $("#slide-bar #tools-tab > li").removeClass('active');
                            $(this.parentElement).addClass('active');
                            $("#slide-bar div[id*='tools-info-']").addClass('hide');
                            $("#slide-bar #tools-info-"+$(this).data('tab')).removeClass('hide');
                        });
                    $("#slide-bar").animate({"min-height":$("#tools-container").height()},100);
                }
            });
        }
        function hideSlide() {
            $("#slide-backdrop").toggle();
            $("#slide-bar").empty();
            $("#slide-bar").animate({'width': 'toggle'}, 100, function() {
                $(this).removeClass($(this).data('side'));
                $(this).css({'min-height':'','height':''});
            });
        }

        loadScript(plugin_path + "jquery/jquery.cookie.js", function(){
        loadScript(plugin_path + "jquery/jquery-ui.min.js", function(){
        loadScript(plugin_path + "jquery/jquery.ui.touch-punch.min.js", function(){
        loadScript(plugin_path + "moment.js", function(){
        loadScript(plugin_path + "bootstrap.dialog/dist/js/bootstrap-dialog.min.js", function(){
        loadScript(plugin_path + "fullcalendar/fullcalendar.js", function(){
        loadScript(plugin_path + "fullcalendar/gcal.js", function(){
        loadScript(plugin_path + "fullcalendar/add-on/scheduler.min.js", function() {
        loadScript(plugin_path + "fullcalendar/lang/th.js", function() {
            calendar = $('#calendar').fullCalendar({
                lang: 'th',
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                defaultView: 'agendaDay', // 'month',
                minTime: '8:00',
                maxTime: '18:00',
                slotDuration: '00:15',
                allDaySlot: false,
                height: 'auto',
                editable: true,
    			selectable: false,
    			eventLimit: true, // allow "more" link when too many events
                resources: '{{url('/room/get_room')}}',
                events: '{{url('/room/get_room_reservation_schedule')}}',
    			dayClick: function(date, jsEvent, view, resource) {
                    calendar.fullCalendar('gotoDate', date );
                    calendar.fullCalendar('changeView', 'agendaDay');
                    $("#agenda_btn").empty().append($("#" + calendar.fullCalendar('getView').name + " span").html());
                    $("#agenda_lb").attr('class',$("#agendaDay").data('label'));
    			},
                resourceRender: function(resource, label, body) {
                    label.append("<br>("+resource.size+")");
                },
                eventClick: function(event, jsEvent, view) {
                    if(calendar.fullCalendar('getView').name == 'agendaDay') {
                        slide(event.resourceId, calendar.fullCalendar('getResources').length/2,event.id,'event');
                    }
                },
                eventRender: function (event, element, icon) {
                    if (!event.description == '') {
                        element.find('.fc-title').append("<br /><span class='font300 fsize11'>" + event.description + "</span>");
                    }
                    caldebug = event;
                    element.find('.fc-title').append("<br><span class='color-red'>" + event._start + "-" + event._end + "</span")
                    element.attr('title',event.title);
                    element.attr('data-toggle','tooltip');
                },
                eventAfterAllRender: function(){
                    $('[data-toggle="tooltip"]').tooltip();
                }
            }).on("click", ".fc-resource-cell",function(e) {
                slide(
                    $(this).data('resource-id'),
                    calendar.fullCalendar('getResources').length/2,
                    calendar.fullCalendar('getResourceById',$(this).data('resource-id')).title,
                    'tools'
                );
            });

            $("#slide-backdrop").click(hideSlide);
            $('.fc-center').append('คลิกชื่อห้องเพื่อใช้เครื่องมือจัดห้อง');
            $("#agenda_btn").empty().append($("#" + calendar.fullCalendar('getView').name + " span").html());
            $("#agenda_lb").attr('class',$("#"+calendar.fullCalendar('getView').name).data('label'));

        });});});});});});});});});
            $("a[data-widget=calendar-view]").bind("click", function (e) {
            e.preventDefault();
            var _view = $(this).attr('id'),
                    _name = $('span', this).html(),
                    _label = $(this).data('label');
            if (_view) {
                calendar.fullCalendar('changeView', _view.trim()); // month  , basicWeek , basicDay , agendaWeek , agendaDay
                $("#agenda_btn").empty().append(_name);
                $("#agenda_lb").attr('class',_label);
            }
        });
    </script>
@endsection
