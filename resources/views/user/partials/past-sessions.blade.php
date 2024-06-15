<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        @include('user.partials.topbar')
    </div>
    <!-- End of Main Content -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Session Calendar</h2>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom styles for FullCalendar buttons */
        .fc-button {
            background-color: #007bff !important;
            border-color: #007bff !important;
            color: #fff !important;
        }

        .fc-button:hover {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }

        /* Custom styles for event dates */
        .fc-day-grid-event .fc-content {
            background-color: #007bff !important;
            color: #fff !important;
            border-color: #007bff !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            var today = moment().startOf('day');
            var sessions = @json($sessions); // Pass the sessions data to JavaScript

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                validRange: {
                    start: today,
                    end: moment().subtract(1, 'days') // End date is the day before today
                },
                events: sessions.map(function(session) {
                    return {
                        title: session.name,
                        start: session.start_date,
                        end: session.end_date,
                        color: '#007bff', // Background color for event
                        textColor: '#fff' // Text color for event
                    };
                })
            });
        });
    </script>
</div>
