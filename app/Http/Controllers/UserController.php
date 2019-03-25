<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function show() {
        if (Auth::user()) {
            return view('user.show');
        }
        // <develop>
        if (app('env') != 'production' && app('env') != 'test') {
            $user = User::all()->first();
            if ($user) {
                Auth::login($user, true);
                return view('user.show');
            }
            return redirect()->route('plan.index');
        }
        // </develop>
        
        return redirect()->route('user.invite');
    }
    
    public function destroy(User $user) {
        if ($user = Auth::user()) {
            Auth::logout();
            $user->delete();
        }
        return redirect()->route('plan.index');
    }

    public function invite() {
        if (Auth::user()) {
            return redirect()->route('plan.index');
        }
        return view('user.invite');
    }
}
