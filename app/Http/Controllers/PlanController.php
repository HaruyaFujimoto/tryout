<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function show() {
        return 'list';
    }
    public function detail() {
        return 'detail';
    }
    public function post() {
        return 'post';
    }
}
