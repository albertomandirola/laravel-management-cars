<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'color', 'price', 'brand'];

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
