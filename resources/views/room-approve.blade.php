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
    <link href="{{url('assets/plugins/fullcalendar/add-on/scheduler.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/layout-calendar.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #middle {
            padding-top: 0px;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">

        /* Calendar Data */
        var date 	= new Date();
        var d 		= date.getDate();
        var m 		= date.getMonth();
        var y 		= date.getFullYear();

        var _calendarEvents = [
            {
                id: '1',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, 1),
                allDay: false,
                description: 'MT5',
                icon: 'fa-clock-o'
            },
            {
                id: '2',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2),
                allDay: false,
                description: '',
                icon: 'fa-check'
            },
            {
                id: '3',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false,
                description: '',
                icon: 'fa-clock-o'
            },
            {
                id: '4',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d+4, 16, 0),
                allDay: false,
                description: '',
                icon: 'fa-clock-o'
            },
            {
                id: '5',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d, 10, 00),
                end: new Date(y, m, d, 11, 00),
                allDay: false,
                description: '',
                icon: 'fa-lock'
            },
            {
                id: '6',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                resourceId: 'a',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                description: '',
                icon: 'fa-clock-o'
            },
            {
                id: '7',
                resourceId: 'a',
                title: 'วิษณุกรรมบุตร',
                start: new Date(y, m, d+1, 19, 0),
                end: new Date(y, m, d+1, 22, 30),
                allDay: false,
                description: '',
                icon: ''
            },
            {
                id: '8',
                resourceId: 'a',
                title: 'เข้า Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
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
        loadScript(plugin_path + "fullcalendar/add-on/scheduler.min.js", function() {
        loadScript(plugin_path + "fullcalendar/lang/th.js", function() {
            $('#calendar').fullCalendar({
                lang: 'th',
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                header: {
                    center: 'month,agendaWeek,agendaDay',
                },
                defaultView: 'agendaDay',
                editable: true,
    			selectable: true,
    			eventLimit: true, // allow "more" link when too many events
                resources: [
    				{ id: 'a', title: 'ห้อง A' },
    				{ id: 'b', title: 'ห้อง B', eventColor: 'green' },
    				{ id: 'c', title: 'ห้อง C', eventColor: 'orange' },
    				{ id: 'd', title: 'ห้อง D', eventColor: 'red' }
    			],
                events: _calendarEvents,
                select: function(start, end, jsEvent, view, resource) {
    				console.log(
    					'select',
    					start.format(),
    					end.format(),
    					resource ? resource.id : '(no resource)'
    				);
    			},
    			dayClick: function(date, jsEvent, view, resource) {
    				console.log(
    					'dayClick',
    					date.format(),
    					resource ? resource.id : '(no resource)'
    				);
    			}
            });
        });});});});});});});});});

    </script>
@endsection
