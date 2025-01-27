<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'color', 'code', 'price',
    ];

    public function userTaxi(): BelongsTo
    {
        return $this->belongsTo(UserTaxi::class);
    }
}
