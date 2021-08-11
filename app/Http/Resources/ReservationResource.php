<?php

namespace App\Http\Resources;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $response = [];
        if ($this->recurring == 'none') {
            $response = [
                'start' => $this->start->toDateTimeString(),
                'end'   => $this->end->toDateTimeString(),
            ];
        } else {
            $response['rrule'] = [
                'freq'      => 'weekly',
                'byweekno'  => config('calendar.' . $this->recurring),
                'byweekday' => Reservation::DAYS[$this->day],
                'dtstart'   => $this->start->toDateTimeString(),
                'until'     => $this->end ? $this->end->toDateTimeString() : null,
            ];
            $response['duration'] = $this->duration;
        }
        $response['title'] = $this->client_name;

        return $response;
    }
}
