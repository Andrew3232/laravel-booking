<?php

namespace App\Http\Requests\Api\Admin;

use App\Enums\Status;
use App\Http\Requests\Api\ApiCollectionPaginateRequest;
use Illuminate\Validation\Rule;

class GetReservationCollectionPaginateRequest extends ApiCollectionPaginateRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        $paginateRules = parent::rules();
        $rules = [
            'user' => 'integer|exists:users,id',
            'status' => Rule::enum(Status::class),
            'date' => 'date',
        ];

        return array_merge($paginateRules, $rules);
    }
}
