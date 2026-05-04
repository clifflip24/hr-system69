@extends('layouts.dashboard-layout') 

@section('title', 'L & D Activities')

@section('content')
    <h1>L & D Activities</h1>
    <p>This is the L & D content.</p>
    <div id="calendar"></div>
    
    <div class="modal fade" id="eventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Event Details (Edit Event)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <input type="hidden" id="eventId">

            <div class="mb-2">
            <label>Date:</label>
            <input type="text" id="eventDate" class="form-control" readonly>
            </div>

            <div class="mb-2">
            <label>Event:</label>
            <input type="text" id="eventName" class="form-control">
            </div>

            <div class="mb-2">
            <label>Status:</label>
            <select id="eventStatus" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Done">Done</option>
            </select>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-danger" id="deleteBtn">Delete</button>
            <button class="btn btn-primary" id="saveBtn">Save Changes</button>
        </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title">Add Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

            <div class="mb-2">
            <label>Date:</label>
            <input type="text" id="addEventDate" class="form-control" readonly>
            </div>

            <div class="mb-2">
            <label>Event:</label>
            <input type="text" id="addEventName" class="form-control">
            </div>

            <div class="mb-2">
            <label>Status:</label>
            <select id="addEventStatus" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Done">Done</option>
            </select>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-success" id="addEventBtn">Add Event</button>
        </div>

        </div>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            height: 600,

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },

            events: {
                url: '/events',
                method: 'GET'
            },

            //ADD EVENT 
            dateClick: function(info) {

            let modal = new bootstrap.Modal(document.getElementById('addEventModal'));

            document.getElementById('addEventDate').dataset.raw = info.dateStr;

            document.getElementById('addEventDate').value = formatDate(info.dateStr);

            document.getElementById('addEventName').value = '';
            document.getElementById('addEventStatus').value = 'Pending';

            modal.show();
            },

            // CLICK EVENT AND IT OPEN THE MODAL
            eventClick: function(info) {

                let modal = new bootstrap.Modal(document.getElementById('eventModal'));

                let fullTitle = info.event.title;

                let match = fullTitle.match(/(.*)\s\((.*)\)/);

                let eventName = match ? match[1] : fullTitle;
                let status = match ? match[2] : 'pending';

                document.getElementById('eventId').value = info.event.id;
                document.getElementById('eventDate').value = formatDate(info.event.startStr);
                document.getElementById('eventName').value = eventName;
                document.getElementById('eventStatus').value = status;

                modal.show();
            }
        });
        document.getElementById('addEventBtn').addEventListener('click', function () {

        let date = document.getElementById('addEventDate').dataset.raw;
        let eventName = document.getElementById('addEventName').value;
        let status = document.getElementById('addEventStatus').value;

        if (!eventName) {
            alert("Event name is required!");
            return;
        }

        fetch('/events', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                date: date,
                event: eventName,
                status: status
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Event added!");
                location.reload();
            }
        });
        });

        calendar.render();

        //SAVE & EDIT
        document.getElementById('saveBtn').addEventListener('click', function () {

            let id = document.getElementById('eventId').value;

            fetch('/events/' + id, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    event: document.getElementById('eventName').value,
                    status: document.getElementById('eventStatus').value
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Event updated!");
                    location.reload();
                }
            });
        });

        //DELETE
        document.getElementById('deleteBtn').addEventListener('click', function () {

            let id = document.getElementById('eventId').value;

            if (!confirm("Delete this event?")) return;

            fetch('/events/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Event deleted!");
                    location.reload();
                }
            });
        });
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection