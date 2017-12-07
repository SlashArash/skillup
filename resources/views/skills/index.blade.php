@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Skills</h3></div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(Auth::user()->admin)
                        <p>Create a new Skill: <a href="{{ route('skills.create') }}" class="btn btn-success">New Skill</a></p>
                    @endif
                    

                    <table class="table table-hover">
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        @if(Auth::user()->admin)
                        <th>Edit</th>
                        @endif
                      </tr>
                      @foreach($skills as $skill)
                      <tr>
                        <td>{{ $skill->id }}</td>
                        <td> <a href="{{ route('skills.get_users', $skill) }}">{{ $skill->title }}</a></td>
                        @if(Auth::user()->admin)
                        <td><a href="{{ route('skills.edit', $skill) }}" class="btn btn-primary">Edit</a></td>
                        @endif
                      </tr>
                      @endforeach
                    </table>
                    {{ $skills->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection