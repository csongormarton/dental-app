<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar', [
            'reservationTypes' => Reservation::RECURRING,
        ]);
    }

    public function store(ReservationStoreRequest $request)
    {
        Reservation::create($request->all());

        return response([
            'status'  => 'success',
            'message' => __('template.reservation_store_success'),
        ]);
    }
}
