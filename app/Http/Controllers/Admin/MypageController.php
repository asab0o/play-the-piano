<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MypageController extends Controller
{
    public function index(Request $request)
    {
        // $gendersList = [
        //         'genders' => $this->genders,
        //         ];
                
        // $prefList = [
        //         'prefectures' => $this->prefectures,
        //         ];
         
        return view('admin.mypage.index', $gendersList, $prefList);
    }
}
