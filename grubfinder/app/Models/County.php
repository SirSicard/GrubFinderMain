<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function restaurants()
    {
        return $this->hasManyThrough(Restaurant::class, Location::class);
    }
}
