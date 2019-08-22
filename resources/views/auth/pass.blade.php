@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Thanks for Joining!</h3>
    </div>

    <div class="row justify-content-center mb-5">

        <div class="card border-info mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-info">Password Generated Successfully</div>
            <div class="card-body text-default">
                <h5 class="card-title">Your Password</h5>
                <span class="border border-warning pt-1 pr-2 pb-1 pl-2 bg-warning text-dark">
                    <b>{{$pass}}</b>
                </span>

                <p class="card-text mt-2">Password has been generated successfully, please note down your password.
                    You can now login with this password</p>
            </div>
            <div class="card-footer bg-transparent border-info">
                <a href="{{'login.php'}}" class="btn btn-success">Login to continue...</a>
            </div>
        </div>

    </div>

@endsection