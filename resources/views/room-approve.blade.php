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
            height: 75%;
            width: 40%;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            z-index: 9999;
        }
        .left-slide {
            top: 12.5%;
            left: 0px;
            border-right: #780000 4px solid;
            border-radius: 0px 3px 3px 0px;
        }
        .right-slide {
            top: 12.5%;
            right: 0px;
            border-left: #780000 4px solid;
            border-radius: 3px 0px 0px 3px;
        }
        #slide-backdrop {
            display: none;
            position: fixed;
            background-color: rgba(0,0,0,0.08);
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            z-index: 9998;
        }
        .fc-resource-cell:hover {
            background-color: rgb(236, 236, 236);
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        var calendar,caldebug;
        function slide(columnId, columnSize) {
            $("#slide-backdrop").toggle();
            if(columnId < columnSize)
                $("#slide-bar").addClass("right-slide").data('side','right-slide');
            else
                $("#slide-bar").addClass("left-slide").data('side','left-slide');
            $("#slide-bar").animate({'width': 'toggle'}, 100);
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
                        slide(event.resourceId, calendar.fullCalendar('getResources').length/2);
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
            });

            $("#slide-backdrop").click(function(e) {
                $("#slide-backdrop").toggle();
                $("#slide-bar").animate({'width': 'toggle'}, 'fast');
                $("#slide-bar").removeClass($("#slide-bar").data('side'));
            });

            calendar.on("click", ".fc-resource-cell",function(e) {
                slide($(this).data('resource-id'), calendar.fullCalendar('getResources').length/2);
            });

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
                // add current view to cookie
                $.cookie('calendar_view', _view, {expires: 30}); 		// expire 30 days
                $.cookie('calendar_view_name', _name, {expires: 30}); 	// expire 30 days
            }
        });
    </script>
@endsection
