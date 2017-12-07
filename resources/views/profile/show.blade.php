@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                
        @if( ! empty($session) and !Auth::user()->admin )
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Roll Call</h4>
                </div>
                <div class="panel-body">
                   <p>
                   {{$session->title}} is being held. Are you present? 
                @if (empty($session_user))
                   <a href="{{ route('users.session', $session) }}" class="btn btn-success">Yeah!</a>
                @else
                    <span class="text-success">I'm Present!</span>
                @endif
                   </p>
                </div>
            </div>
        @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Your Public Profile</h3>
                </div>

                <div class="panel-body">


                    <div>Name: <span><b>{{$user->name }}</b></span></div>
                    <div>Email: </span><span><b>{{$user->email }}</b></span></div>
                    <div>Bio: </span>
                        <div>{!! $user->description !!}</div>
                    </div>      
                    <div>Skills: 
                        <div>
                        @foreach($user->skills as $skill)
                        <span class="label label-info">{{ $skill->title }}</span>
                        @endforeach
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('profile.edit') }}"  role="button">Edit Your Information</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
