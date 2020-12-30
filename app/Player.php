<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = array('id');
    public static $rules = array (
        
        'firstname_1' => 'required',
        'lastname_1' => 'required',
        'firstname_2' => 'required',
        'lastname_2' => 'required',
        'gender' => 'required',
        'experience' => 'required',
        'introduction' => 'required',
        
        );
}