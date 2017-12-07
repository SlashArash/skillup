@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>Sessions</h3>
                </div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(Auth::user()->admin)
                    <p>Create a new Session: <a href="{{ route('sessions.create') }}" class="btn btn-success">New Session</a></p>
                    @endif

                    <table class="table table-hover">
                      <tr>
                        <th>Title</th>
                        <th>Presentation</th>
                        <th>Mini Presentation</th>
                        <th>Event Date</th>
                        @if(Auth::user()->admin)
                        <th>Edit</th>
                        @endif
                      </tr>
                      @foreach($sessions as $session)
                      <tr>
                        <td><a href="{{ route('sessions.get_users', $session) }}">{{ $session->title }}</a></td>
                        <td>{{ $session->presentation }}</td>
                        <td>{{ $session->mini_presentation }}</td>
                        <td>{{ $session->event_date }}</td>
                        @if(Auth::user()->admin)
                        <td><a href="{{ route('sessions.edit', $session) }}" class="btn btn-primary">Edit</a></td>
                        @endif
                      </tr>
                      @endforeach
                    </table>
                    {{ $sessions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection