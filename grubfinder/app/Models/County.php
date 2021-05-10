<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'description','slug'];


    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function restaurants()
    {
        return $this->hasManyThrough(Restaurant::class, Location::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
