document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale:'pt-br',
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true,
      selectable: false,
      editable: false,
      droppable:false,
      defaultDate: '2019-08-12',

      businessHours: true, // display business hours
      editable: true,
      events: routeEvents('routeLoadEventos'),

    });

    calendar.render();
  });
