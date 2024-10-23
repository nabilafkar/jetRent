<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_code',
        'name',
        'desc',
        'price',
        'brand',
        'stock',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'unit_categories');
    }

    public function unitCategories()
    {
        return $this->hasMany(UnitCategory::class);
    }


    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
