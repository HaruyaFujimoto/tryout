<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

class UserController extends Controller
{
    public function show() {
        $user = Auth::user();
        if ($user) {
            return view('user.show', compact('user'));
        }
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
        return 'invite page';
    }
}
