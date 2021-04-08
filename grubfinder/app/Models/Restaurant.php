<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;



//    category relationship

    public function category()
    {
        return $this->belongsTo(Category::class);
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
