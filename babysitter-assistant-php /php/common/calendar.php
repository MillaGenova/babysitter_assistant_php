<?php

include '../common/config.php';

// session_start();

$parent_or_babysitter = "";
if (array_key_exists('parent_id', $_SESSION)) {
    $user_id = $_SESSION['parent_id'];
    $parent_or_babysitter = "parent";
} else {
    $user_id = $_SESSION['babysitter_id'];
    $parent_or_babysitter = "babysitter";
}
$child_id = $_SESSION['child_id'];
$_SESSION['parent_or_babysitter'] = $parent_or_babysitter;
if (!isset($user_id)) {
    header('location:../common/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- <script src="../../dist/calendar.js"></script> -->
    <input type="hidden" value="<?php echo $_SESSION['parent_or_babysitter']; ?>" id="parent_or_babysitter" />

</head>

<body>
    <section class="calendar-section">
        <div class="calendar-form">
            <div id="calendar"></div>
        </div>
    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>
<script src='../../fullcalendar/dist/index.global.js'></script>
<script type="module">
    $(document).ready(function () {
        display_events();
    });

    function display_events() {
        var eventsPath = '../' + jQuery.trim($('#parent_or_babysitter').val()) + '/events.php'
        var events = new Array();
        $.ajax({
            url: eventsPath,
            dataType: 'json',
            success: function (response) {

                var result = response.data;
                $.each(result, function (i, item) {
                    events.push({
                        event_id: result[i].event_id,
                        title: result[i].title,
                        start: result[i].start,
                        end: result[i].end,
                        color: result[i].color,
                        url: result[i].url
                    });
                })
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'timeGridDay,dayGridMonth,listDay'
                    },
                    initialView: 'timeGridDay',
                    firstDay: 1,
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    eventShortHeight: 80,
                    // Day grid specific:
                    allDaySlot: false,
                    slotMinTime: "06:00:00",
                    slotMaxTime: "23:15:00",
                    slotDuration: '00:15',
                    slotLabelInterval: "00:15",

                    slotLabelFormat: {
                        hour: '2-digit',
                        minute: '2-digit',
                        omitZeroMinute: false,
                        meridiem: 'short',
                        hour12: false,
                    },
                    events: events,
                    eventRender: function (event, element, view) {
                        element.bind('click', function () {
                            alert(event.event_id);
                        });
                    },
                    eventClick: function (event) {
                        event.jsEvent.preventDefault(); // don't let the browser navigate
                        document.cookie = "event_id=" + event.event.extendedProps.event_id;
                        window.location.replace('calendar_event.php');
                    }

                });
                calendar.render();

            },
            error: function (response, xhr, status) {
                alert(response.msg);
            }
        });
    }
</script>

</html>