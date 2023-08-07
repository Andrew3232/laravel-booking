<?php

declare(strict_types=1);

namespace App\Http\Presenters;

use App\Contracts\PresenterCollectionInterface;
use App\Models\Reservation;
use Illuminate\Support\Collection;

final class ReservationPresenter implements PresenterCollectionInterface
{
    public function __construct(
        private readonly UserPresenter $userPresenter
    ) {}

    public function present(Reservation $reserve): array
    {
        return [
            'id' => $reserve->getId(),
            'status' => $reserve->getStatus(),
            'phone' => $reserve->getPhone(),
            'email' => $reserve->getEmail(),
            'date_start' => $reserve->getDateStart()->toDateString(),
            'date_end' => $reserve->getDateEnd()->toDateString(),
            'created_at' => $reserve->getCreatedAt()->toDateString(),
            'user' => $reserve->user ? $this->userPresenter->present($reserve->user) : null,
        ];
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection->map(
            function (Reservation $reserve) {
                return $this->present($reserve);
            }
        )->all();
    }
}
