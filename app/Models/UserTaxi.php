<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserTaxi extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'key', 'price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function original(): BelongsTo
    {
        return $this->belongsTo(Taxi::class, 'taxi_id');
    }

    public function color(): BelongsTo
    {
//        return $this->hasOne(Color::class, 'id', 'color_id');
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function availableColors(): HasOne
    {
        return $this->hasOne(Color::class, 'id');
    }
}
