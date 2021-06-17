<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    //登录页面
    public function create(){
        return view('sessions.create');
    }


    //提交登录信息
    public function store(Request $request){
        $credentials = $this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials,$request->has('remember'))){
            //登录成功后相关操作
            session()->flash('success','欢迎回来');
            $fallback = route('users.show', [Auth::user()]);
            return redirect()->intended($fallback);
        }else{
            //登录失败后的相关操作
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

        return;
    }



    public function destroy(){
        Auth::logout();
        session()->flash('success','您已经退出登录');
        return redirect('login');
    }
}
