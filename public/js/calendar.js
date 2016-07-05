var eventsData= '[';
var eventsContent= [];

function loadEvents(reference, sedes) {
  for (var i = 0; i < reference.length; i++) {
    eventsData+= '{"title": "'+ reference[i].title +'", "start": "'+ reference[i].event_date.split(" ")[0] +'", "info": {"fecha": "'+ reference[i].event_date.split(" ")[0] +'", "img": "'+ reference[i].url_img +'", "document": "'+ reference[i].url_document +'", "sede": "';
    for (var s = 0; s < sedes.length; s++) {
      if(sedes[s].id == reference[i].sede_id)
        eventsData+= sedes[s].name;
    }
    eventsData+= '", "content_id": "'+ eventsContent.length +'"}}';
    eventsContent.push(reference[i].content);
    if (i != (reference.length-1))
      eventsData+= ',';
    else
      eventsData+= ']';
  }
  try {
    eventsData= JSON.parse(eventsData);
  } catch(err) {
    eventsData= JSON.parse('{}');
  }
}

jQuery(document).ready(function($) {
  /////////////// Calendar ////////////////////
  $('#calendar').fullCalendar({
    eventSources: [
      {
        events: eventsData
      }
      // any other event sources...
    ],
    eventClick: function(calEvent) {
      console.log(calEvent.info);
      $('#eventTitle').text(calEvent.title);
      if(calEvent.info.img !== "null") {
        $('#eventImg').attr('src', "../img/eventos/"+ calEvent.info.img);
        $('#eventImg').addClass('col-xs-12 col-md-6');
        $('#blockDivider').removeClass('hide');
      } else {
        $('#eventImg').removeAttr('src');
        $('#eventImg').removeClass('col-xs-12 col-md-6');
        $('#blockDivider').addClass('hide');
      }
      $('#eventInfo').html('Fecha: ' + calEvent.info.fecha + '<br>Sede: ' + calEvent.info.sede);
      if(calEvent.info.document !== 'null') {
        $('#eventDocument > a').removeClass('hide');
        $('#eventDocument > a').attr('href', '/file/getEvento/'+ calEvent.info.document);
        $('#eventDocument > a > span').text(' '+ calEvent.info.document);
      } else {
        $('#eventDocument > a').addClass('hide');
        $('#eventDocument > a').attr('href', '');
        $('#eventDocument > a > span').text(' ');
      }
      $('#eventContent').html(eventsContent[calEvent.info.content_id]);
      $('#allEvents').fadeOut();
      $('#eventDetails').fadeIn();
    }
  });

  $('#event_Exit').on('click', function () {
    $('#eventDetails').fadeOut();
    $('#allEvents').fadeIn();
  });
});
