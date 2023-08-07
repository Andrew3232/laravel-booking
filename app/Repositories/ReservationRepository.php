<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Enums\Status;
use App\Models\Reservation;
use Illuminate\Support\Carbon;

final class ReservationRepository
{
    public function reservable(string|Carbon $date): bool
    {
        $reservationDate = ($date instanceof Carbon) ? $date : Carbon::parse($date);

        return Reservation::query()->select(['status','date_start','date_end'])
            ->whereNot('status', Status::DECLINED)
            ->where(function ($query) use($reservationDate){
                $query->where('date_start', '<=', $reservationDate->toDateString())
                    ->where('date_end', '>', $reservationDate->toDateString());
            })->doesntExist();
    }

}
