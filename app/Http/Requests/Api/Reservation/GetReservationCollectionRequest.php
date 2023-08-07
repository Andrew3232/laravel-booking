<?php

namespace App\Http\Requests\Api\Reservation;

use App\Enums\Status;
use App\Http\Requests\Api\ApiFormRequest;
use Illuminate\Validation\Rule;

class GetReservationCollectionRequest extends ApiFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user' => 'integer|exists:users,id',
            'status' => Rule::enum(Status::class),
        ];
    }
}
