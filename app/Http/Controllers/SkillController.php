<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'getUsers']]);
        $this->middleware('admin', ['except' => ['index', 'getUsers']]);
    }

    public function index()
    {
        $skills = Skill::paginate(20);
        return view('skills.index', compact("skills"));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);
        $skill = Skill::create($request->only('title'));
        
        return redirect()->route('skills.index')->with('success', 'The Skill Created!');
    }
    
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact("skill"));
    }

    public function update(Skill $skill, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);
        $skill->title = $request->title;
        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Skill Updated!');
    }


    public function getUsers(Skill $skill)
    {
        $users = $skill->users;
        return view('skills.users', compact(['skill', 'users']));
    }
}
