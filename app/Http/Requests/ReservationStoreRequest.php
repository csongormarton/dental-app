<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_name' => ['required'],
            'start'       => ['required', 'date'],
            'end'         => ['date'],
            'recurring'   => ['required', 'string'],
            'day'         => ['required', 'numeric'],
            'duration'    => ['required', 'string'],
        ];
    }
}
