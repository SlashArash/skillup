<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Session;
use DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        $session = Session::whereDate('event_date', date('Y-m-d'))->first();
        if( ! empty($session) ){
            $session_user = DB::table('session_user')
                            ->where([
                                ['user_id', $user->id],
                                ['session_id', $session->id],
                                ])
                            ->first();;
        }
        else 
            $session_user = null;

        return view('profile.show', compact(['user', 'session', 'session_user']));
    }

    public function edit()
    {
        $user = auth()->user();
        $user_skills = $user->skills()->get()->toArray();
        $skills = Skill::all();
      
        return view('profile.edit', compact(['user', 'skills', 'user_skills']));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255'
        ]);
        $user = auth()->user();
        $user->skills()->sync($request->skills);
        $user->name = $request->name;
        $user->description = $request->description;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Your Profile Updated.');
    }
}
