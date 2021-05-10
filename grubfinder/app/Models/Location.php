<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'description','slug'];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
