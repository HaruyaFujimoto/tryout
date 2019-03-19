<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;

class UserController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }
    
    public function delete() {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home');
    }
}
