@include('fullcalendar.modais.events')
<div id='external-events-list'>
</div>
<div id='calendar' data-route-load-events="{{ action('EventController@loadEvents',[$classe,$idLigClasProf])}}" data-route-event-update="{{ route('routeEventUpdate') }}" data-route-event-store="{{ route('routeEventStore') }}" data-route-event-delete="{{ route('routeEventDelete') }}" data-route-fast-event-delete="{{ route('routeFastEventDelete') }}" data-route-fast-event-update="{{ route('routeFastEventUpdate') }}" data-route-fast-event-store="{{ route('routeFastEventStore') }}">
</div>