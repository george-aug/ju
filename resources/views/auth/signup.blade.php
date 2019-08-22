@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Signup Form</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @if (isset($_GET['sms']))
                <div class="{{ $alert }}" id="myAlert" role="alert">
                    {{$msg}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{'signup2.php'}}" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" id="username" name="username" placeholder="Username" type="text"
                           value="{{ $un }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" id="email" name="email" placeholder="Email" type="text"
                           value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password"
                           value="">
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password"
                           type="password" value="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="signup-submit">Submit</button>
                </div>

            </form>
        </div>
    </div>


@endsection

@section('script')
{{--    <script>--}}
{{--        $('#myAlert').on('closed.bs.alert', function () {--}}
{{--            alert("Hello! I am an alert box!!");--}}
{{--        })--}}
{{--    </script>--}}
@endsection