<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js'></script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                themeSystem: 'bootstrap5',
                timeZone: 'UTC',
                eventContent: function(arg) {
                    const event = arg.event;
                    let customHtml = '';
                    customHtml += "<span class='r10 font-xxs font-bold' style='overflow: hidden;'>" + event.title + "</span><br>";
                    customHtml += "<span class='r10 highlighted-badge font-xxs font-bold'>" + event.extendedProps.description + "</span>";
                    return { html: customHtml }
                 }
            });
            calendar.render();

            fetch("/getData").then(res => res.json()).then(data => {
                data.data.forEach(day => {
                    let description = day.note;
                    let descriptionArr = [];
                    if (description) {
                        if (description.includes(";")) {
                            description = '';
                            descriptionArr = day.note.split(";");
                            console.log(descriptionArr);
                            for(let i = 0; i < descriptionArr.length; i++) {
                                if (i === descriptionArr.length) {
                                    description += descriptionArr[i];
                                } else {
                                    description += descriptionArr[i] + "<br>";
                                }
                            } 
                        }
                    }
                    calendar.addEvent({
                        title: `${day.name} (${day.room})`,
                        allDay: false,
                        html: true,
                        description: day.note ? description : "",
                        start: day.startingTime,
                        end: day.endingTime
                    });
                });
            });
        });
    </script>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>