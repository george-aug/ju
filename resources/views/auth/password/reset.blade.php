@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Reset Password</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @if (isset($_GET['sms']))
                <div class="{{ $alert }}" role="alert">
                    {{$msg}}
                </div>
            @endif

            <form action="{{'reset.php'}}" method="POST">

                <input type="hidden" name="selector" value="{{$selector}}">
                <input type="hidden" name="validator" value="{{$validator}}">

                <div class="form-group">
                    <input type="password" name="pwd" placeholder="Enter a new password..." class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="pwd-repeat" placeholder="Retype new password..." class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="reset-password-submit" value="Reset Password" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>

@endsection