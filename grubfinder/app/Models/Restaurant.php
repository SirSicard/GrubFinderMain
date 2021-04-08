<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'phone', 'website', 'gmap', 'location_id', 'status_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }




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
}
