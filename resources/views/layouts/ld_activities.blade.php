@extends('layouts.dashboard-layout') 

@section('title', 'L & D Activities')

@section('content')
    <h1>L & D Activities</h1>
    <p>This is the L & D content.</p>
    <div id="calendar"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            height: 600, // ✅ consistent height

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: '' // remove extra clutter
            },

            events: {
                url: '/events',
                method: 'GET'
            },

            dateClick: function(info) {
                let eventName = prompt("Enter Event:");
                if (!eventName) return;

                let status = prompt("Enter Status (pending/done):");
                if (!status) return;

                fetch('/events', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        date: info.dateStr,
                        event: eventName,
                        status: status
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Event added successfully!");
                        calendar.refetchEvents();
                    }
                });
            },
            eventClick: function(info) {
 
            let eventId = info.event.id;

            let choice = prompt("Type 'edit' to update or 'delete' to remove:");

            //DELETE
            if (choice === 'delete') {
                if (confirm("Are you sure you want to delete this event?")) {

                    fetch('/events/' + eventId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Event deleted!");
                            calendar.refetchEvents();
                        }
                    });
                }
            }

            //EDIT
            else if (choice === 'edit') {

                let newEvent = prompt("Enter new event:");
                if (!newEvent) return;

                let newStatus = prompt("Enter new status:");
                if (!newStatus) return;

                fetch('/events/' + eventId, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        event: newEvent,
                        status: newStatus
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Event updated!");
                        calendar.refetchEvents();
                    }
                });
            }
        }
            
        });

        calendar.render();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
@endsection