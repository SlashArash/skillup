<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['present']]);
    }

    public function index()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    public function present(Session $session)
    {
        if( $session->event_date !== date('Y-m-d') )
            return redirect()->route('profile.show')->with('success', 'ey baba az daste shoma bacheha');

        $user = auth()->user();
        $user->sessions()->attach($session);

        return redirect()->route('profile.show');
    }
}
