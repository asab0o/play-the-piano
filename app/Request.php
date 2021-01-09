<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array (
        
        'title' => 'required',
        'name' => 'required',
        'date_time' => 'required',
        'area' => 'required',
        'rewards' => 'required',
        'parking_lots' => 'required',
        'genres' => 'required',
        'dress' => 'required',
        'introduction' => 'required',
        'display_from' => 'required',
        'display_to' => 'required',
        'application_from' => 'required',
        'application_to' => 'required',
        
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
