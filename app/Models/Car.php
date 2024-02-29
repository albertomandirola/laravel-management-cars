<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'brand', 'year', 'type_of_engine', 'plate', 'type_of_gear', 'n_chassis', 'price', 'doors', 'seats', 'color', 'power', 'photos', 'description'];

    public function optionals()
    {
        return $this->belongsToMany(Optional::class);
    }
}
