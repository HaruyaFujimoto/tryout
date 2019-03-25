<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use Auth;

class SkillController extends Controller
{
    public function index() {
        $skills = Skill::latest()->get();
        return view('skill.list', compact('skills'));
    }
    public function create() {
        return view('skill.post');
    }
    public function store(Request $request) {
        $form = $request->all();
        unset($form['_token']);
        foreach($form as $item) {
            if ($item != ''){
                $plan = new Skill;
                $plan->name = $item;
                $plan->save();
            }
        }
        return redirect()->route('skill.index');
    }
    public function destroy(Skill $skill) {
        $skill->delete();
        return rediredt()->route('skill.index');
    }
}
