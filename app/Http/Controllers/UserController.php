<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

class UserController extends Controller
{
    public function show() {
        if (Auth::user()) {
            return view('user.show');
        }
        // <develop>
        if (app('env') != 'production' && app('env') != 'test') {
            $user = User::find(1);
            Auth::login($user, true);
            return view('user.show');
        }
        // </develop>
        
        return redirect()->route('user.invite');
    }
    
    public function delete() {
        $user = Auth::user();
        Auth::logout();
        $user->delete();
        return redirect()->route('home');
    }

    public function invite() {
        if (Auth::user()) {
            return redirect()->route('plan.index');
        }
        return view('user.invite');
    }
}
