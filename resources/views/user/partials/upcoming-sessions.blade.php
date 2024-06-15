<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        @include('user.partials.topbar')
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
    </div>
    <!-- End of Main Content -->

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
                    start: today
                },
                events: sessions.map(function(session) {
                    return {
                        title: session.name,
                        start: session.start_date,
                        end: session.end_date
                    };
                }),
                themeSystem: 'bootstrap4', // Use Bootstrap 4 theme for the calendar
                eventTextColor: '#fff', // Event text color
                eventBorderColor: '#007bff', // Event border color
                eventBackgroundColor: '#007bff', // Event background color
                eventBorderRadius: '5px', // Event border radius
                eventRender: function(event, element) {
                    element.find('.fc-title').addClass('font-weight-bold'); // Make event titles bold
                }
            });
        });
    </script>
</div>
