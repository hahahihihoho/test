<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agent extends Model
{
	use Sluggable;

	protected $table = 'agents';

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name_agent'
            ]
        ];
    }

    protected $fillable = [
        'name_agent', 'alamat', 'hp', 'user_id'
    ];
}
