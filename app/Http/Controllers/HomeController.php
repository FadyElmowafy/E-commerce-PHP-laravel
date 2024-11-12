<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// npm run dev          git bash
//php artisan serve     

//admin
//name: mohamed@yahoo.com
//Pass: LoLwhyme0110

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::user()->role == 1){
            return view('admin.home');
        }else{
            return view('user.all');
        }
    }

    public function changeLang($lang){
        if($lang == 'ar'){
            session()->put("lang" , "ar");
        }else{
            session()->put("lang" , "en");
        }
        return redirect()->back();
    }



}
