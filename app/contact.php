<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
   public function user(){
    return $this->belongsTo(User::class,'user_id','id');
   }
}
