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
        <form id="container" class="validate" method="post"
              enctype="multipart/form-data" style="margin:0">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
            <input type="hidden" name="approver_id" value="{{ $user['student_id'] }}">

            <div class="modal-header">
                <button type="button" class="close" onclick="hideSlide()">&times;</button>
                <h4 id="event-info-title" class="modal-title">
                    <i class="fa fa-calendar"></i> รายละเอียดการจอง: <span id="status"></span>
                    <span style="float:right"><div id="type"></div></span>
                </h4>
                <!-- TABs -->
                <ul id="event-tab" class="nav nav-tabs">
                  <li><a href="#" data-tab="reserve">ใบจอง</a></li>
                  <li><a href="#" data-tab="owner"  >ผู้จอง</a></li>
                </ul>
            </div>

            <div class="modal-body">
                        <div id="event-info-reserve">
                            <input type="hidden" name="res_id" id="res_id">
                            <input type="hidden" name="status" id="status">
                            <input type="hidden" name="allow_room_id" id="request_room_id">
                            <input type="hidden" name="allow_start_time" id="request_start_time">
                            <input type="hidden" name="allow_end_time" id="request_end_time">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>กิจกรรม <span id="activity" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>หน่วยงาน <span id="organization" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>สถานที่ <span id="room_name" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ช่วงเวลา <span id="request_start_time" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ถึง <span id="request_end_time" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>จำนวนคน <span id="number_of_people" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>โปรเจคเตอร์ <span id="request_projector" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ปลั๊กพ่วง <span id="request_plug" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-12" style="margin-bottom:10px;">
                                    <label>เหตุผล</label><span>&emsp;</span><span id="reason" class="text-blue">ไม่มีข้อมูล</span>
                                </div>
                            </div>
                        </div>

                        <div id="event-info-owner">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>รหัสนิสิต <span id="student_id" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อ <span id="name" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>นามสกุล <span id="surname" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ชื่อเล่น <span id="nickname" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>รุ่น <span id="generation" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>ภาควิชา <span id="department" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>เบอร์ติดต่อ <span id="phone_number" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>E-mail <span id="email" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Facebook <span id="facebook_link" class="text-blue">ไม่มีข้อมูล</span></label>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="approve(1)">
                    <i class="fa fa-check"></i>อนุมัติ
                </button>
                <button type="button" class="btn btn-danger" onclick="approve(0)">
                    <i class="fa fa-times"></i>ไม่อนุมัติ
                </button>
                <button type="button" class="btn btn-default" onclick="hideSlide()">
                    <i class="fa fa-minus"></i>ยกเลิก
                </button>
            </div>

        </form>
    </div>


    <div id="tools-template" style="display:none">
        <form id="container" class="validate" method="post"
              enctype="multipart/form-data" style="margin:0">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

            <div class="modal-header">
                <button type="button" class="close" onclick="hideSlide()">&times;</button>
                <h4 id="tools-info-title" class="modal-title">
                    <i class="fa fa-calendar"></i> เครื่องมือจัดการ: <span id="room-name" class="text-blue"></span>
                </h4>
                <!-- TABs -->
                <ul id="tools-tab" class="nav nav-tabs">
                  <li><a href="#" data-tab="event">รายการจอง</a></li>
                  <li><a href="#" data-tab="tools">เครื่องมือ</a></li>
                </ul>
            </div>

            <div class="modal-body">

                    <div id="tools-info-event">
                        <div class="row">
                            <div id="events-list" class="col-xs-12">
                                <div style="text-align:center">ไม่มีรายการกิจกรรมในห้องนี้</div>
                            </div>
                        </div>
                    </div>

                    <div id="tools-info-tools">
                        <div style="text-align:center">ไม่มีเครื่องมือในการจัดห้อง</div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="">
                    <i class="fa fa-random"></i>จัดรายการ
                </button>
                <button type="button" class="btn btn-success" onclick"">
                    <i class="fa fa-check"></i>อนุมัติทั้งหมด
                </button>
                <button type="button" class="btn btn-danger" onclick="hideSlide()">
                    <i class="fa fa-times"></i>ยกเลิก
                </button>
            </div>
        </form>
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
            position: fixed;
            bottom: 12.5%;
            width: 40%;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            z-index: 9999;
            overflow: hidden;
        }
        .full-height-slide {
            bottom: 0 !important;
            min-height: 100% !important;
            min-width: 300px !important;
            width: 40%;
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
        .modal-header {
            position: absolute;
            top: 0;
            width: 100%;
            padding-bottom: 0;
            border-bottom: none;
        }
        .modal-header > .close {
            margin-left: 10px;
        }
        .nav-tabs {
            padding-top: 10px;
        }
        .modal-body {
            position: absolute;
            width: 100%;
            overflow: auto;
        }
        .modal-footer {
            position: absolute;
            bottom: 0;
            width:100%;
            padding-right: 55px;
        }
        @media (max-height: 667px) {
            #slide-bar { /* FULL HEIGHT */
                bottom: 0;
                min-height: 100% !important;
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
        function replace(contentType, data, postCallback) {
            var slideBar = $("#slide-bar");
            //console.log(data);
            slideBar.html($("#"+contentType+"-template").html());

            var infoTabs = Object.getOwnPropertyNames(data);
            for(i in infoTabs) {
                var names = Object.getOwnPropertyNames(data[infoTabs[i]]);
                for(j in names) {
                    $("#slide-bar #"+contentType+"-info-"+infoTabs[i]+" *[id="+names[j]+"]:not(input)").html(data[infoTabs[i]][names[j]]);
                    $("#slide-bar #"+contentType+"-info-"+infoTabs[i]+" input[id="+names[j]+"]").val(data[infoTabs[i]][names[j]]);
                    if(postCallback != null)
                        postCallback(names[j],$("#slide-bar #"+contentType+"-info-"+infoTabs[i]+" *[id="+names[j]+"]"),data[infoTabs[i]][names[j]]);
                }
            }

            slideBar.find("#"+contentType+"-tab a[data-tab]").click(function(e) {
                    e.preventDefault();
                    $("#slide-bar #"+contentType+"-tab > li").removeClass('active');
                    $(this.parentElement).addClass('active');
                    $("#slide-bar div[id*='"+contentType+"-info-']").addClass('hide').scrollTop(0);
                    $("#slide-bar #"+contentType+"-info-"+$(this).data('tab')).removeClass('hide');
                });
            var headerHeight = $("#slide-bar > #container > .modal-header").outerHeight(),
                footerHeight = $("#slide-bar > #container > .modal-footer").outerHeight(),
                bodyHeight = 0;
            $("#slide-bar > #container > .modal-body > div").each(function(index) {
                bodyHeight = Math.max(bodyHeight,$(this).outerHeight());
                if(index != 0)$(this).addClass('hide');
            });
            var fullHeight = headerHeight + bodyHeight + parseInt($(".modal-body").css('padding'))*2 + footerHeight;
            $("#slide-bar > #container > .modal-header > .nav-tabs > li:first-child").addClass("active");
            $("#slide-bar > #container > .modal-body").css({"top":headerHeight+"px","bottom":footerHeight+"px"});
            if(fullHeight > $(window).height()) {
                fullHeight = $(window).height();
                slideBar.addClass("full-height-slide");
            }
            slideBar.animate({"min-height":fullHeight},100).css('height','');
        }

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
                            replace(contentType,response,function(name, element, data) {
                                switch(name) {
                                case "status":
                                    if(data==0)
                                        element.addClass("text-red").html("ไม่อนุมัติ");
                                    else if(data==1)
                                        element.addClass("text-green").html("อนุมัติ");
                                    else
                                        element.addClass("text-orange").html("รอการอนุมัติ");
                                    break;
                                case "facebook_link":
                                    if(data!="")
                                        element.html("<a href='https://"+data+"'><u>Link</u></a>");
                                    else
                                        element.html("ไม่มี");
                                    break;
                                case "request_projector":
                                    if(data)
                                        element.html("ต้องการ");
                                    else
                                        element.html("ไม่ต้องการ");
                                }
                            });
                        },
                        error : function(e) {
                            var response = e.responseText;
                            if (response == 'login')
                                _toastr("กรุณาเข้าสู่ระบบ", "top-right", "error", false);
                            else if (response == 'permission')
                                _toastr("คุณไม่มีสิทธิทำรายการนี้", "top-right", "error", false);
                            else if (response == 'noinfo' || response == 'noowner')
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
                    var data = {
                        "title": {
                            "room-name":contentId
                        }
                    };
                    replace(contentType,data,function(name, element, data) {
                    });
                }
            });
        }

        function approve(status) {
            $("#slide-bar input[name=status]").val(status);
            var formData = new FormData($("#slide-bar > #container")[0]);
            $.ajax({
                url:  '{{url("/room/approve")}}',
                type: 'POST',
                headers: { "X-CSRF-Token" : $("input[name='_token']").val() },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response=="approve")
                        _toastr("ยืนยันการอนุมัติสำเร็จ", "top-right", "success", false);
                    else if (response="disapprove")
                        _toastr("ยืนยันการไม่อนุมัติสำเร็จ", "top-right", "success", false);
                    calendar.fullCalendar('refetchEvents');
                    hideSlide();
                    return false;
                },
                error: function(e) {
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

        function hideSlide() {
            $("#slide-backdrop").toggle();
            $("#slide-bar").empty().removeClass("full-height-slide")
                .animate({'width': 'toggle'}, 100, function() {
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
                    element.find('.fc-title').append("<br><span class='color-red'>" + event._start + "-" + event._end + "</span");
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
