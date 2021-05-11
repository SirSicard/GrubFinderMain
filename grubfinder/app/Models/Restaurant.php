<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'description', 'address', 'phone', 'website',  'location_id', 'status_id','slug','lat','lng'];






    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

//    Location
    public function location()
    {
        return $this->belongsTo(Location::class);

    }

//    status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function links(){

        return $this->hasMany(Link::class);
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
                'source' => 'name',
            ]
        ];
    }
}
