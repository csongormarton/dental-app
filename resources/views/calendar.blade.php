@extends('layouts.app')

@section('title', __('template.calendar'))

@section('content')
    <div id="calendar"></div>
    @include('modals/reservation_modal')
@endsection

@push('script')
    <script>
        let getReservationsUrl = '{{ route('api.reservations') }}';
        let storeReservationUrl = '{{ route('api.reservations.store') }}';
    </script>
    <script src='{{ mix('js/calendar.js') }}'></script>
@endpush
