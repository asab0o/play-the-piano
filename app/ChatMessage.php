<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['chat_id', 'user_id', 'messages'];
    
    public function chat() {
        return $this->belongsTo('App\Chat');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
