jQuery(document).ready(function($) {
/////////////// Calendar ////////////////////
$('#calendar').fullCalendar({
    // put your options and callbacks here
    events: [
        {
            title: 'Event1',
            start: '2016-05-15'
        },
        {
            title: 'Event2',
            start: '2016-05-20'
        }
        // etc...
    ]
});
////////////////// end calendar ////////////
    
});