<?php

namespace App\Models;

use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    public const DEFAULT_SORT = 'id';
    public const DEFAULT_DIRECTION = 'desc';
    public const DEFAULT_PAGE = 1;

    protected $perPage = 15;

    protected $fillable = [
        'status',
        'phone',
        'email',
        'date_start',
        'date_end',
        'user_id',
    ];

    protected $casts = [
      'status' => Status::class,
      'date_start' => 'datetime',
      'date_end' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateStart(): Carbon
    {
        return $this->date_start;
    }

    public function getDateEnd(): Carbon
    {
        return $this->date_end;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }
}
