<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function chatUsers() {
        return $this->hasMany('App\ChatUser');
    }
    
    public function chatMessages() {
        return $this->hasMany('App\ChatMessage');
    }
}
