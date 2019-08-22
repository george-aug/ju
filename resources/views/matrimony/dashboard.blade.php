@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Welcome {{ $profile->first_name.' '."($profile->profile_no)"}}</h3>
    </div>
    <div class="row justify-content-center">

    </div>
@endsection