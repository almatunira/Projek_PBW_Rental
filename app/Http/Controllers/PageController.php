<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
    	return view('index');
    }

    public function login_admin(Request $request){
        if($request->session()->get('login') === 2) { 
            return redirect('/admin');
        }else if($request->session()->get('login') === 1){
            return redirect('/user');
        }else{
            return view('admin-login');
        }
    }

     public function login(Request $request){
    	if($request->session()->get('login') === 2) { 
    		return redirect('/admin');
    	}else if($request->session()->get('login') === 1){
    		return redirect('/user');
    	}else{
        	return view('login');
    	}
    }

     public function logout(Request $request){
        $request->session()->forget('login');
        $request->session()->forget('nama');
        $request->session()->forget('id');
        return view('login');
    }
}
