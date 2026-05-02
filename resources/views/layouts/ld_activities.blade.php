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
            }
        });

        calendar.render();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
@endsection