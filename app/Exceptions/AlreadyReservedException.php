<?php

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;

final class AlreadyReservedException extends BaseException
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct(__('reservation.already_reserved'), 400, $previous);
    }
}
