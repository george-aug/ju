@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Join Us</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @if (isset($_GET['sms']))
                <div class="{{ $alert }}" role="alert">
                    {{$msg}}
                </div>
            @endif

            <form action="{{'join.php'}}" method="POST">

                {{--<input type="hidden" name="csrf_token" value="{{$csrf_token}}">--}}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <!-- uid stands for unique identity -->
                    <input class="form-control" id="name" name="name" placeholder="Enter your Name" type="text"
                           value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input class="form-control" id="mobile" name="mobile" placeholder="Mobile no. (10 digits only)" type="text"
                           value="{{ isset($_GET['mobile']) ? $_GET['mobile'] : '' }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="join-submit">Join Us</button>
                </div>


            </form>
        </div>
    </div>

@endsection