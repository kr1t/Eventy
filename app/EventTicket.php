<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    protected $casts = [
        'times' => 'array',
    ];
    protected $fillable = ['start', 'end', 'price', 'event_id', 'times'];
}