<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    public function chat() {
        return $this->belongsTo('App\Chat');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
