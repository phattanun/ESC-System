	jQuery(document).ready(function() {
		_calendarInit();
	});
	function _calendarInit() {
		_fullCalendar();
	}
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
				//header: {
				//	left: 'title',
				//},
				allDaySlot: true,
				events: _calendarEvents,
				eventRender: function (event, element, icon) {

					if (!event.description == '') {
						element.find('.fc-event-title').append("<br /><span class='font300 fsize11'>" + event.description + "</span>");
					}
                    //
					//if (!event.icon == '') {
					//	element.find('.fc-event-title').append("<i class='fc-icon fa " + event.icon + "'></i>");
					//}

				}
			});

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
