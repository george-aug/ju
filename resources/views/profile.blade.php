@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="mt-5 mb-5">
        <h2 class="text-muted">{{$profile->profile_no}}</h2>
        <h3 class="text-muted">{{$profile->first_name.' '.$profile->last_name}}</h3>

    </div>
@endsection