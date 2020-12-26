<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBoothType extends Model
{
    protected $fillable = ['name', 'price', 'status', 'amount', 'event_id'];
}