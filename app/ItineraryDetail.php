<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItineraryDetail extends Model
{
    protected $table = 'itinerary_detail';

    protected $fillable = [
        'judul', 'deskripsi'
    ];
}
