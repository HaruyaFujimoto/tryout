<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
use Auth;

class SkillController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user && $user->id == User::with('plans')->orderBy('id', 'asc')->first()->id) {
            $skills = Skill::with('plans')->orderBy('id', 'asc')->get();
            return view('skill.list', compact('skills'));
        }
        return redirect()->route('plan.index');
    }
    public function create() {
        $user = Auth::user();
        if ($user && $user->id == User::with('plans')->orderBy('id', 'asc')->first()->id) {
            return view('skill.post');
        }
        return redirect()->route('plan.index');
    }
    public function store(Request $request) {
        $user = Auth::user();
        if ($user && $user->id == User::with('plans')->orderBy('id', 'asc')->first()->id) {

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
        return redirect()->route('plan.index');
    }
    public function destroy(Skill $skill) {
        $user = Auth::user();
        if ($user && $user->id != User::with('plans')->orderBy('id', 'asc')->first()->id) {
            $skill->delete();
            return rediredt()->route('skill.index');
        }
        return redirect()->route('plan.list');
    }
}
