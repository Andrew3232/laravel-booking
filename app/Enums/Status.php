<?php
declare(strict_types=1);

namespace App\Enums;

enum Status: int
{
    case PROCESSING = 1;
    case DECLINED = 2;
    case APPROVED = 3;
}
