<?php

namespace App\Services;

use Carbon\Carbon;

class DateService
{
    public static function getDatesFromRange($start, $end, string $format = 'Y-m-d'): array
    {
        $period = Carbon::parse($start)->toPeriod(Carbon::parse($end));

        $formattedPeriod = collect($period->map(function ($item) use($format) {
            return $item->format($format);
        }));

        return $formattedPeriod->toArray();
    }
}
