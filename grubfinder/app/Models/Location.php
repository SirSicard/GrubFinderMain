<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','slug'];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
