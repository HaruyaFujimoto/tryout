<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::latest()->get();
        return view('plan.list', compact('plans'));
    }
    public function show(Plan $plan) {
        return view('plan.detail', compact('plan'));
    }

    public function create() {
        return view('plan.post');
    }
    public function store(Request $request) {
        $this->validate($request, Plan::$rules);
        $plan = new Plan;
        $form = $request->all();
        unset($form['_token']);
        $plan->fill($form)->save();
        return redirect()->route('plan.index');
    }

    public function edit(Plan $plan) {
        return view('plan.edit', compact('plan'));
    }
    public function update(Request $request, Plan $plan) {
        $rules = Plan::$rules;
        $rules['name'] = 'required|unique:plans,name,'.$plan->id.'|between:3,20';
        $this->validate($request, $rules);
        $form = $request->all();
        unset($form['_token']);
        $plan->fill($form)->save();
        return redirect()->route('plan.show', $plan);
    }

    public function destroy(Plan $plan) {
        $plan->delete();
        return redirect()->route('plan.index');
    }
}
