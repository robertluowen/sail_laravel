<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function index(Request $request){
        return response("设置Cookie")->cookie('name','luowen');
//        $key = $request->cookie('name');
//        var_dump($key);
//        Cookie::queue('age',100);
//        dump(Cookie::get('age'));

        Cookie::forget('get');
    }
}
