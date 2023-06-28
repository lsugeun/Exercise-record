$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: 'load_events.php',
        editable: false,
        eventLimit: true,
        eventRender: function(event, element) {
            element.append("<br/>" + event.description);
        }
    });
});
