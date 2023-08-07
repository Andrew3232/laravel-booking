<?php

namespace App\Http\Requests\Api\Admin;

use App\Enums\Status;
use App\Http\Requests\Api\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateStatusReserveByAdminRequest extends ApiFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                Rule::enum(Status::class),
            ],
        ];
    }
}
