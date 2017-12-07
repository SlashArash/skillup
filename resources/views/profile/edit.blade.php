@extends('layouts.app')

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor' ), {
            toolbar: [ 'bold', 'italic', 'link' ,'|' , 'undo', 'redo']
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edit Your Profile</h3>
                </div>

                <div class="panel-body">
                    <form action="{{ route('profile.update') }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <label for="txtName">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" id="txtName" class="form-control"  placeholder="Your Name">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="taDescription">Bio</label>
                        <textarea name="description" id="taDescription" class="form-control editor" placeholder="Describe Yourself">{{ $user->description }}</textarea>
                      </div>
                      <div class="checkbox">
                        @foreach($skills as $skill)
                          <label class="checkbox-inline">
                            <input
                              type="checkbox"
                              id="inlineCheckbox1"
                              name="skills[]" 
                              value="{{ $skill->id }}" 
                              @foreach($user_skills as $user_skill)
                              {{ in_array($skill->id, $user_skill) ? 'checked' : ''}}
                              @endforeach
                              > {{ $skill->title }}
                          </label>
                        @endforeach
                      </div>
                      <input type="submit" class="btn btn-primary" value="Edit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

