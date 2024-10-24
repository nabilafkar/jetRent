<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'unit_id',
        'rent_start',
        'rent_end',
        'rent_return',
        'returned',
        'penalty_id',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function penalty()
    {
        return $this->belongsTo(Penalty::class);
    }
}
