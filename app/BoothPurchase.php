<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoothPurchase extends Model
{
    protected $fillable = [
        'type', 'size', 'extras', 'event_id', 'user_id', 'first_name', 'last_name', 'email', 'tel', 'des', 'sum'
    ];

    protected $casts = [
        'type' => 'array',
        'size' => 'array',
        'extras' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }


    // public function type()
    // {
    //     return $this->belongsTo('App\EventBoothType');
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}