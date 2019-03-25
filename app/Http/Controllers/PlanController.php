<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Skill;
use Auth;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::with('user', 'skills')->get();
        return view('plan.list', compact('plans'));
    }
    public function show(Plan $plan) {
        return view('plan.detail', compact('plan'));
    }

    public function create() {
        if (Auth::user()) {
            $skills = Skill::all();
            return view('plan.post', compact('skills'));
        }
        return redirect()->route('plan.index');
    }
    public function store(Request $request) {
        $this->validate($request, Plan::$rules);
        $user = Auth::user();
        $plan = new Plan;
        $post = $request->all();
        $plan->fill($post);
        DB::beginTransaction();
        try {
            $user->plans()->save($plan);
            $plan->skills()->attach($request->skills);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('plan.index');
    }

    public function edit(Plan $plan) {
        if (Auth::user() == $plan->user) {
            $skills = Skill::with('plans')->get();
            return view('plan.edit', compact('plan', 'skills'));
        }
        return redirect()->route('plan.index');
    }
    public function update(Request $request, Plan $plan) {
        $rules = Plan::$rules;
        $rules['name'] = 'required|unique:plans,name,'.$plan->id.'|between:3,20';
        $this->validate($request, $rules);
        $form = $request->all();
        DB::beginTransaction();
        try { 
            $plan->fill($form)->save();
            $plan->skills()->detach();
            $plan->skills()->attach($request->skills);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('plan.show', $plan);
    }

    public function destroy(Plan $plan) {
        $plan->delete();
        return redirect()->route('plan.index');
    }
}
