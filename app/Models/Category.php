<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_categories');
    }
    public function unitCategories()
    {
        return $this->hasMany(UnitCategory::class);
    }
}
