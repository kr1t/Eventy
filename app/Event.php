<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $appends = ['date_text', 'time_text', 'price_x'];
    protected $casts = [
        'tag' => 'array',
    ];
    protected $fillable = ['title', 'end_time', 'image1', 'image2', 'image3', 'image4', 'date', 'time', 'tag', 'des', 'map_name', 'map_address', 'google_map_url', 'mrt', 'bts', 'bus', 'near_location', 'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function types()
    {
        return $this->hasMany('App\EventBoothType')->whereStatus(1);
    }
    public function sizes()
    {
        return $this->hasMany('App\EventBoothType')->whereStatus(2);
    }
    public function extras()
    {
        return $this->hasMany('App\EventBoothType')->whereStatus(3);
    }

    public function tickets()
    {
        return $this->hasMany('App\EventTicket');
    }


    public function booth_purchases()
    {
        return $this->hasMany('App\BoothPurchase');
    }

    public function price()
    {
        return $this->hasOne('App\EventTicket');
    }

    public function prices()
    {
        return $this->hasMany('App\EventTicket');
    }


    public function getPriceXAttribute()
    {
        try {
            return $this->price->price;
        } catch (\Exception $e) {
            return  '$$';
        }
    }

    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    public function getDateTextAttribute()
    {
        return $this->DateThai($this->date);
    }
    public function getTimeTextAttribute()
    {
        return \Carbon\Carbon::parse($this->time)->format('h:m') . "-" . \Carbon\Carbon::parse($this->end_time)->format('h:m') . ' น.';
    }
}