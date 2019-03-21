<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
    public function index() {
        return 'list';
    }
    public function show(Plan $plan) {
        return 'detail';
    }

    public function create() {
        return 'create';
    }
    public function store() {
        return 'store';
    }

    public function edit(Plan $plan) {
        return 'edit';
    }
    public function update(Plan $plan) {
        return 'update';
    }

    public function destroy(Plan $plan) {
        return 'destroy';
    }
}
