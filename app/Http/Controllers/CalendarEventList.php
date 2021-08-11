<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalendarEventList extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        return ReservationResource::collection(Reservation::all());
    }
}
