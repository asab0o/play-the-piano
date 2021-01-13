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
        'display_date_from' => 'required',
        'display_date_to' => 'required',
        'application_date_from' => 'required',
        'application_date_to' => 'required',
        
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
