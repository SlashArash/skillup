@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Users who were present at the {{ $session->title }}</h3></div>

                <div class="panel-body">                    
                    <table class="table table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>skills</th>
                      </tr>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{!! $user->description !!}</td>
                        <td>
                          @foreach( $user->skills as $skill)
                            <span class="label label-info">
                              <a style="color: white" href="{{ route('skills.get_users', $skill) }}">{{ $skill->title}}</a>
                            </span>
                          @endforeach
                        </td>
                      </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection