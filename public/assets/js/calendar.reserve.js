/** Calendar
	calendar.html

		<!-- PAGE LEVEL STYLES -->
		<link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript" src="assets/plugins/fullcalendar/fullcalendar.js"></script>
		<script type="text/javascript" src="assets/js/view/demo.calendar.js"></script>

 ************************************************* **/
	jQuery(document).ready(function() {
		_calendarInit();
	});


	/** 
		CALENDAR INIT [ajax usage too]
	************************************** **/
	function _calendarInit() {

		_fullCalendar();		// full calendar
		_calendarEventAdd(); 	// modal create event

	}


	/** 
		CALENDAR
	************************************** **/
	function _fullCalendar() {

		if(jQuery('#calendar').length > 0) {
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
				draggable: 			false,
				selectable: 		true,
				selectHelper: 		true,
				unselectAuto: 		true,
				disableResizing: 	true,
				editable: 			false,

				/** ******************************
				// language example
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
				****************************** **/
				

				header: {
					left: 'title',
				},

				select: function(start, end, allDay) {

					if(jQuery("#calendar").attr('data-modal-create') == 'true') {

						var check = $.fullCalendar.formatDate(start, 'yyyy-MM-dd');
						var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
						var thisMonth = date.getMonth();
						var nextMonth = $.fullCalendar.formatDate(end, 'M');
						alert(nextMonth);
						if (check < today) {
						}
						else {
							endtime = jQuery.fullCalendar.formatDate(end, 'h:mm tt');
							starttime = jQuery.fullCalendar.formatDate(start, 'ddd, MMM d, h:mm tt');
							var _when_ = starttime + ' - ' + endtime;

							BootstrapDialog.show({
								type: BootstrapDialog.TYPE_DANGER,
								title: '<i class="fa fa-calendar"></i> จองห้อง',
								message: '<p><i class="fa fa-clock-o"></i> ' + _when_ + '</p>' +

									/* start icon buttons */
									//'<div class="form-group">' +
									//'	<label class="fsize11">Icon Event</label>' +
									//'	<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">' +
									//'		<label class="btn btn-default active" title="no icon">' +
									//'			<input type="radio" name="calendar_ico" value="" checked="checked">' +
									//'			<i class="fa fa-times"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-info">' +
									//'			<i class="fa fa-info"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-warning">' +
									//'			<i class="fa fa-warning"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-check">' +
									//'			<i class="fa fa-check"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-user">' +
									//'			<i class="fa fa-user"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-lock">' +
									//'			<i class="fa fa-lock"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-clock-o">' +
									//'			<i class="fa fa-clock-o"></i>' +
									//'		</label>' +
									//'		<label class="btn btn-default">' +
									//'			<input type="radio" name="calendar_ico" value="fa-link">' +
									//'			<i class="fa fa-link"></i>' +
									//'		</label>' +
									//'	</div>' +
									//'</div>' +
									/* end icon buttons */

								'<input required type="text" class="calendar_event_input_add form-control" id="apptEventTitle" placeholder="โครงการ" />' +
								'<textarea class="calendar_event_textarea_add form-control" id="apptEventDescription" placeholder="รายละเอียด" rows="3"></textarea>' +

								'<input type="hidden" id="apptStartTime" value="' + start + '" />' + /** start date hidden **/
								'<input type="hidden" id="apptEndTime" value="' + end + '" />' + /** end date hidden **/
								'<input type="hidden" id="apptAllDay" value="' + allDay + '" />' + /** allday hidden **/

									/* start event color */
									//'<div class="sky-form">' +
									//'<div class="block inline-group">' +
									//	'<label class="fsize11 block margin-top-20">เลือกสีของการจอง</label>' +
									//	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-primary" checked="checked" /><i></i> <span class="text-primary">Default</span></label>' +
									//	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-danger" /><i></i> <span class="text-danger">Red</span></label>' +
									//	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-warning" /><i></i> <span class="text-warning">Yellow</span></label>' +
									//	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-success" /><i></i> <span class="text-success">Green</span></label>' +
									//	'<label class="radio"><input type="radio" name="calendar_event_color" value="bg-info" /><i></i> <span class="text-info">Blue</span></label>' +
									//'</div>' +
									//'</div>' +
									/* end event color */

								'',
								buttons: [
									{
										label: '<i class="fa fa-check"></i> ส่งคำจอง',
										cssClass: 'btn-success',
										hotkey: 13, // Enter.
										action: function (dialogItself) {
											_calendarEventAdd();
											dialogItself.close();
											_calendarInstance.fullCalendar('unselect');
										}
									},
									{
										label: '<i class="fa fa-times"></i> ยกเลิก',
										cssClass: 'btn-default',
										action: function (dialogItself) {
											dialogItself.close();
											_calendarInstance.fullCalendar('unselect');
										}
									}
								]
							});

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

		if(jQuery('#apptEventTitle').val()) {
			var cal_title 		= jQuery('#apptEventTitle').val(),
				cal_start		= new Date(jQuery('#apptStartTime').val()),
				cal_end			= new Date(jQuery('#apptEndTime').val()),
				cal_allDay		= (jQuery('#apptAllDay').val() == "true"),
				cal_url			= jQuery('#apptEventUrl').val(),
				cal_className	= [jQuery("input:radio[name=calendar_event_color]:checked").val()],
				cal_description	= jQuery('#apptEventDescription').val(),
				cal_icon		= [jQuery("input:radio[name=calendar_ico]:checked").val()] || '';
				
			jQuery("#calendar").fullCalendar('renderEvent', {
				title: 			cal_title,
				start: 			cal_start,
				end: 			cal_end,
				allDay: 		cal_allDay,

				url: 			cal_url,
				className: 		cal_className,
				description: 	cal_description,
				icon: 			cal_icon
			}, true ); /* make the event "stick" */

			// Send data via ajax
			var data_action = jQuery('#calendar').attr('data-action');
			var data_method = jQuery('#calendar').attr('data-method') || 'GET';

			if(data_action) {
				jQuery.ajax({
					url: 	data_action,
					data: 	{ 'action':'create', 'cal_title':cal_title, 'cal_start':cal_start,'cal_end':cal_end, 'cal_allDay':cal_allDay.start, 'cal_url':cal_url.end, 'cal_className':cal_className, 'cal_description':cal_description, 'cal_icon':cal_icon},
					type: 	data_method,

					error: 	function(XMLHttpRequest, textStatus, errorThrown) {

						// by default, on error, print uri
						jQuery("#toast-container").remove();
						toastr.options.positionClass 		= 'toast-top-full-width';
						toastr.options.timeOut 				= 10000;
						toastr.error("Method: " + data_method + "<br />" + data_action + '&action=create&cal_title='+cal_title+'&cal_start='+cal_start+'&cal_end='+cal_end+'&cal_allDay='+cal_allDay+'&cal_url='+cal_url+'&cal_className='+cal_className+'&cal_description='+cal_description+'&cal_icon='+cal_icon, "Demo : Calendar Event Add");						

					},

					success: function(data) {}
				});
			}
		}
	}

/* ========================================== CALENDAR VIEW SWITCHER ========================================= */
	jQuery("a[data-widget=calendar-view]").bind("click", function(e) {
		e.preventDefault();

		var _href 	= jQuery(this).attr('href'),
			_href	= _href.replace('#', ''),
			_name	= jQuery('span', this).html();

		if(_href) {

			jQuery('#calendar').fullCalendar('changeView', _href.trim()); // month  , basicWeek , basicDay , agendaWeek , agendaDay 
			jQuery("#agenda_btn").empty().append(_name);

			// add current view to cookie
			jQuery.cookie('calendar_view', _href, { expires: 30 }); 		// expire 30 days
			jQuery.cookie('calendar_view_name', _name, { expires: 30 }); 	// expire 30 days

		}
	});


	// On Load - switch view [from cookie]
	jQuery(document).ready(function() {

		var calendar_view 		= jQuery.cookie('calendar_view');
		var calendar_view_name 	= jQuery.cookie('calendar_view_name');

		if(calendar_view && calendar_view_name) {

			jQuery('#calendar').fullCalendar('changeView', calendar_view.trim());
			jQuery("#agenda_btn").empty().append(calendar_view_name);

		}

	});
/* ========================================== /CALENDAR VIEW SWITCHER ========================================= */
