<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;
    protected $fillable = [
        'penalty_code',
        'max_day',
        'price'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
