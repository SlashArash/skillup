@extends('layouts.app')

@push('scripts')
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#taPresentation' ), {
            toolbar: [ 'bold', 'italic', 'link' ,'|' , 'undo', 'redo']
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#taMiniPresentation' ), {
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
                <div class="panel-heading"><h3>Edit a Session</h3></div>

                <div class="panel-body">
                    
                    <form action="{{ route('sessions.update', $session) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <label for="txtTitle">Title</label>
                        <input type="text" name="title" value="{{ $session->title }}" id="txtTitle" class="form-control"  placeholder="Title of session">
                        @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="taPresentation">Presentation</label>
                        <textarea name="presentation" id="taPresentation" class="form-control editor" placeholder="Presentation Description">{{ $session->presentation }}</textarea>
                        @if($errors->has('presentation'))
                            <span class="text-danger">{{ $errors->first('presentation') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="taMiniPresentation">Mini Presentation</label>
                        <textarea name="mini_presentation" id="taMiniPresentation" class="form-control editor" placeholder="Mini Presentation Description">{{ $session->mini_presentation }}</textarea>
                        @if($errors->has('mini_presentation'))
                            <span class="text-danger">{{ $errors->first('mini_presentation') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="dateEvent">Event Date</label>
                        <input type="date" name="event_date" value="{{ $session->event_date }}" id="dateEvent" class="form-control">
                        @if($errors->has('event_date'))
                            <span class="text-danger">{{ $errors->first('event_date') }}</span>
                        @endif
                      </div>
                      <input type="submit" class="btn btn-primary" value="Edit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection