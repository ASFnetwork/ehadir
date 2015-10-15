<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SE Sejati | eKehadiran</title>

<link rel='stylesheet' href="{{ URL::asset('/admin/fullcalendar/fullcalendar.css') }}" />
  <script src="{{ URL::asset('/admin/fullcalendar/lib/moment.min.js') }}"></script>
  <script src="{{ URL::asset('/admin/fullcalendar/lib/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('/admin/fullcalendar/fullcalendar.js') }}"></script>


  </head>
  <body>


<div id='calendar'></div>          


<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});


</script>

  </body>
</html>
