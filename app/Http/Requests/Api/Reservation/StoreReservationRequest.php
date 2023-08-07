<?php

namespace App\Http\Requests\Api\Reservation;

use App\Http\Requests\Api\ApiFormRequest;

class StoreReservationRequest extends ApiFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {

        return [
            'date_start' => 'required|date|before:date_end',
            'date_end' => 'required|date|after:date_start',
            'phone' => 'required|numeric|digits:12',
            'email' => 'required|email',
        ];
    }
}
