<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Trip extends Model
{
	use Sluggable;

    protected $table = 'trip';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul_trip'
            ]
        ];
    }

    protected $fillable = [
        'id_operator', 'judul_trip', 'photo', 'tujuan', 'tgl_mulai', 'tgl_selesai', 'tujuan', 'meeting_point', 'kuota', 'deskripsi', 'id_itinerary', 'price', 'include', 'exclude', 'syarat', 'perlengkapan', 'info', 'aktif'
    ];
}
