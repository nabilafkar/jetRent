<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory;
    protected $fillable = ['unit_id', 'category_id'];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
