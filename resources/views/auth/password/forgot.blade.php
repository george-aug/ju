@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Forgot Password</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @if (isset($_GET['sms']))
                <div class="{{ $alert }}" role="alert">
                    {{$msg}}
                </div>
            @endif

            <form action="{{'forgot.php'}}" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email.." value="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="forgot-password-submit">Submit</button>
                </div>
            </form>

        </div>
    </div>

@endsection