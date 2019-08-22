@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Login Form</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @include('layouts.partials.alert')

            <form action="{{'login.php'}}" method="POST">

                <input type="hidden" name="csrf_token" value="{{$csrf_token}}">

                <div class="form-group">
                    <label for="uid">Name:</label>
                    <!-- uid stands for unique identity -->
                    <input class="form-control" id="uid" name="uid" placeholder="Username/Email..." type="text"
                           value="{{ isset($_GET['uid']) ? $_GET['uid'] : '' }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" id="password" name="password" placeholder="Password..." type="password"
                           value="">
                </div>
                <div class="form-group">
                    <label for="remember-me">
                        <input type="checkbox" id="remember-me" name="remember-me" value=1 checked />
                    </label>&nbsp;Remember Me
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="login-submit">Login</button>
                    <a href="{{'signup.php'}}" class="btn btn-light"> or Signup</a>
                </div>

                <div class="form-group">
                    <a href="{{'forgot.php'}}">Forgot your Password?</a>
                </div>

            </form>
        </div>
    </div>

@endsection