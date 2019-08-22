@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Change Password</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @if (isset($_GET['sms']))
                <div class="{{ $alert }}" role="alert">
                    {{$msg}}
                </div>
            @endif

            <form action="{{'change.php'}}" method="POST">

                <div class="form-group">
                    <input type="hidden" name="email" class="form-control" value="{{ $_SESSION['email'] }}">
                </div>

                <div class="form-group">
                    <input type="password" name="old_password" placeholder="Enter your current password..." class="form-control">
                </div>

                <br><hr><br>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter a new password..." class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Retype new password..." class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="change-password-submit" value="Change Password" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>

@endsection