<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Itinerary extends Model
{
    protected $table = 'itinerary';

    protected $fillable = [
        'id_itinerarydetail'
    ];
}
