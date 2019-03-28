<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Skill;
use Auth;
use DB;

class PlanController extends Controller
{
    public function index() {
        $plans = Plan::with('user', 'skills')->orderBy('id', 'desc')->paginate(15);
        return view('plan.list', compact('plans'));
    }

    public function create() {
        $user = Auth::user();
        if ($user) {
            if ($user->id > 1 && DB::table('plans')->where('user_id', $user->id)->count() > 9) {
                return '現在、1カウント10記事までの制限をかけております<br>もし申し出がありましたら上限を解除致します。<br>解除を希望する方は恐れ入りますが<a href="https://twitter.com/hal822tw">https://twitter.com/hal822tw</a>までご報告ください。';
            }
            $skills = Skill::with('plans')->get();
            return view('plan.post', compact('skills'));
        }
        return redirect()->route('plan.index');
    }
    public function store(Request $request) {
        $user = Auth::user();
        if ($user) {
            if ($user->id > 1 && DB::table('plans')->where('user_id', $user->id)->count() > 9) {
                return '現在、1カウント10記事までの制限をかけております<br>もし申し出がありましたら上限を解除致します。<br>解除を希望する方は恐れ入りますが<a href="https://twitter.com/hal822tw">https://twitter.com/hal822tw</a>までご報告ください。';
            }
            $this->validate($request, Plan::$rules);
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
        }
        return redirect()->route('plan.index');
    }


    public function show(Plan $plan) {
        $isLiked = '';
        $user = Auth::user();
        if ($user) {
            $relate = DB::table('plan_user')->where('user_id', $user->id)->where('plan_id', $plan->id)->first();
            $isLiked = $relate ? 'true' : '';
        }
        return view('plan.detail', compact('plan', 'isLiked'));
    }
    public function edit(Plan $plan) {
        if (Auth::user() == $plan->user) {
            $skills = Skill::with('plans')->get();
            return view('plan.edit', compact('plan', 'skills'));
        }
        return redirect()->route('plan.index');
    }
    public function update(Request $request, Plan $plan) {
        if ($plan->user != Auth::user()) {
            return redirect()->route('plan.index');
        }
        $rules = Plan::$rules;
        $rules['name'] = 'required|unique:plans,name,'.$plan->id.'|between:3,40';
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
        if ($plan->user != Auth::user()) {
            return redirect()->route('plan.index');
        }
        $plan->delete();
        return redirect()->route('plan.index');
    }

    public function like(Request $request, Plan $plan) {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $user->liked_plans()->toggle($plan);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            abort(500);
        }
        $relate = DB::table('plan_user')->where('user_id', $user->id)->where('plan_id', $plan->id)->first();
        return $relate ? 'true' : 'false';
    }
}