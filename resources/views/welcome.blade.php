@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="text-center main-page flex-center">
    <div class="content">
        <div class="title">
            <h1>SkillUp Event</h1>
        </div>
        <div class="links ">
            <a class="pull-left" href="https://t.me/joinchat/AtvKuENB6upcZBjzXk0exw"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram Group</a>
            <a class="pull-left" href="https://t.me/skillupevent"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram Channel</a>
            <a class="pull-left" href="https://instagram.com/skillupevent"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
            <a class="pull-left" href="https://twitter.com/skillupevent"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
            <a class="pull-left" href="https://www.facebook.com/skillupevent"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a>
            <a class="pull-left" href="https://plus.google.com/114194027276524642387"><i class="fa fa-google-plus-official" aria-hidden="true"></i> Google Plus</a>
            
        </div>
    </div>
</div>
@endsection
