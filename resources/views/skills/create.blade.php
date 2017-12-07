@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Create a new Skill</h3></div>

                <div class="panel-body">
                    
                    <form action="{{ route('skills.store') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="txtTitle">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" id="txtTitle" class="form-control"  placeholder="Title">
                        @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                      <input type="submit" class="btn btn-success" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection