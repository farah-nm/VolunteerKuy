<div class="text-sm text-gray-700 space-y-2">
    <p>📅 <strong>Periode:</strong><br>
        {{ $event->start_date->format('d M Y') }} – {{ $event->end_date->format('d M Y') }}
    </p>
    <p>📍 <strong>Lokasi:</strong><br>
        {{ $event->location_city }}, {{ $event->location_province }}
    </p>
    <p>⏳ <strong>Deadline:</strong><br>
        {{ $event->registration_deadline->format('d M Y') }}
    </p>
    <p>👥 <strong>Kuota:</strong><br>
        {{ $event->slots_available }} orang
    </p>
</div>
