<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Session;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'getUsers']]);
        $this->middleware('admin', ['except' => ['index', 'getUsers']]);
    }
    
    public function index()
    {
        $sessions = Session::orderBy('event_date', 'desc')->paginate(20);
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'event_date' => 'date',
        ]);
        Session::create($request->except('_token'));
        
        return redirect()->route('sessions.index')->with('success', 'The Session Created!');
    }

    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Session $session, Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'event_date' => 'date',
        ]);
        $session->title = $request->title;
        $session->presentation = $request->presentation;
        $session->mini_presentation = $request->mini_presentation;
        $session->event_date = $request->event_date;
        $session->save();

        return redirect()->route('sessions.index')->with('success', 'The Session Updated!');
    }
    public function getUsers(Session $session)
    {
        $users = $session->users;
        return view('sessions.users', compact(['session', 'users']));
    }

}
