<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    // シーダー使えるようにしている
    public $timestamps = false;
    protected $fillable = ['id', 'users_id', 'firstname_1', 'lastname_1', 'firstname_2', 'lastname_2', 'birth_year', 'birth_month', 'birth_day', 'gender', 'experience', 'area', 'introduction', 'image_path_1', 'image_path_2','image_path_3', 'performance'];
}