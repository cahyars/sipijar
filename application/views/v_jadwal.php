<div class="row">
    <div class="col-12">
        <div class="card card-default shadow">
            <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2 class="mx-auto text-uppercase">Jadwal Pemeliharaan</h2>
            </div>
            <div class="rounded border bg-white p-4">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var event = <?php echo json_encode($allEvents) ?>;
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            selectable: true,
                            dayMaxEvents: true,
                            events: event
                        });

                        calendar.render();
                    });
                </script>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>