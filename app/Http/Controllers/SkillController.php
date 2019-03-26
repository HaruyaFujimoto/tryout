<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use Auth;

class SkillController extends Controller
{
    public function index() {
        if (Auth::user()->id != User::with('plans')->orderBy('id', 'asc')->first()->id) {
            return redirect()->route('plan.index');
        }
        $skills = Skill::with('plans')->orderBy('id', 'asc')->get();
        return view('skill.list', compact('skills'));
    }
    public function create() {
        return view('skill.post');
    }
    public function store(Request $request) {
        if (Auth::user()->id != User::with('plans')->orderBy('id', 'asc')->first()->id) {
            return redirect()->route('plan.index');
        }
        $form = $request->all();
        unset($form['_token']);
        foreach($form as $item) {
            if ($item != ''){
                $skill = new Skill;
                $skill->name = $item;
                $skill->save();
            }
        }
        return redirect()->route('skill.index');
    }
    public function destroy(Skill $skill) {
        if (Auth::user() != User::with('plans')->orderBy('id', 'asc')->first()) {
            return redirect()->route('plan.list');
        }
        $skill->delete();
        return rediredt()->route('skill.index');
    }
}
