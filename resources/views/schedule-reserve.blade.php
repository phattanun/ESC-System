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
                                        <a href="#" class="opt dropdown-toggle" data-toggle="dropdown"><span class="label label-disabled"><span id="agenda_btn">เดือน</span> <span class="caret"></span></span></a>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a data-widget="calendar-view" href="#month"><i class="fa fa-calendar-o color-green"></i> <span>เดือน</span></a></li>
                                            <li><a data-widget="calendar-view" href="#agendaWeek"><i class="fa fa-calendar-o color-red"></i> <span>วาระ</span></a></li>
                                            <li><a data-widget="calendar-view" href="#agendaDay"><i class="fa fa-calendar-o color-yellow"></i> <span>วันนี้</span></a></li>
                                            <li><a data-widget="calendar-view" href="#basicWeek"><i class="fa fa-calendar-o color-gray"></i> <span>สัปดาห์</span></a></li>
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

@endsection

@section('css')
    <link href="{{url('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/layout-calendar-reserve.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #middle {
            padding-top: 0px;
        }
        .fc-day:hover{
            cursor: pointer;
            background-color: rgba(176, 255, 124, 0.29);
        }
        .fc-past,.fc-today,.fc-other-month.fc-past {
            background-image: -webkit-gradient(linear,left top,right bottom,color-stop(.25,rgba(0,0,0,.03)),color-stop(.25,transparent),color-stop(.5,transparent),color-stop(.5,rgba(0,0,0,.03)),color-stop(.75,rgba(0,0,0,.03)),color-stop(.75,transparent),to(transparent));
            background-image: -webkit-linear-gradient(135deg,rgba(0,0,0,.03) 25%,transparent 25%,transparent 50%,rgba(0,0,0,.03) 50%,rgba(0,0,0,.03) 75%,transparent 75%,transparent);
            background-image: -webkit-linear-gradient(315deg,rgba(0,0,0,.03) 25%,transparent 25%,transparent 50%,rgba(0,0,0,.03) 50%,rgba(0,0,0,.03) 75%,transparent 75%,transparent);
            background-image: linear-gradient(135deg,rgba(0,0,0,.03) 25%,transparent 25%,transparent 50%,rgba(0,0,0,.03) 50%,rgba(0,0,0,.03) 75%,transparent 75%,transparent);
            -webkit-background-size: 16px 16px;
            background-size: 16px 16px;
        }
        .fc-grid .fc-other-month .fc-day-number {
            opacity: 1.0 ;
        }
        .fc-past:hover, .fc-today:hover{
            cursor: not-allowed;
            background-color: rgba(255, 164, 142, 0.29);
        }
    </style>
@endsection

@section('js')
        <!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

        /* Calendar Data */
        var date 	= new Date();
        var d 		= date.getDate();
        var m 		= date.getMonth();
        var y 		= date.getFullYear();

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
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2),
                allDay: false,
                className: ["bg-primary"],
                description: '',
                icon: 'fa-check'
            },
            {
                id: 999,
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false,
                className: ["bg-warning"],
                description: '',
                icon: 'fa-clock-o'
            },
            {
                id: 999,
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d+4, 16, 0),
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
                start: new Date(y, m, d+1, 19, 0),
                end: new Date(y, m, d+1, 22, 30),
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

        loadScript(plugin_path + "jquery/jquery.cookie.js", function(){
            loadScript(plugin_path + "jquery/jquery-ui.min.js", function(){
                loadScript(plugin_path + "jquery/jquery.ui.touch-punch.min.js", function(){
                    loadScript(plugin_path + "moment.js", function(){
                        loadScript(plugin_path + "bootstrap.dialog/dist/js/bootstrap-dialog.min.js", function(){
                            loadScript(plugin_path + "fullcalendar/fullcalendar.js", function(){
                                loadScript(plugin_path + "fullcalendar/gcal.js", function(){

                                    // Load Calendar Demo Script
                                    loadScript("{{url('assets/js/calendar.reserve.js')}}");

                                });
                            });
                        });
                    });
                });
            });
        });

    </script>
@endsection
