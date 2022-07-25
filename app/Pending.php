<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
   public function booking()
   {
    return $this->belongsTo('App\Booking');
   }
}
