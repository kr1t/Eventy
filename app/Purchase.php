<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'times', 'event_id', 'user_id', 'first_name', 'last_name', 'email', 'tel', 'des'
    ];
    protected $casts = [
        'times' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}