@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

<div class="row justify-content-center mb-5">
    <h1 class="text-muted display-1">Just Unite</h1>
</div>
<div class="row justify-content-center">

       @include('layouts.partials.alert')

</div>

@if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true)
    {{--<div class="row justify-content-center">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>--}}
    <div class="row justify-content-center">
        <form class="form-inline" action="#" method="">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="name" name="name" disabled
                   value="{{ isset($_SESSION['name']) ? $_SESSION['name'] : '' }}" placeholder="Name">
            <label class="sr-only" for="mobile">Email / Mobile No.</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="mobile" name="mobile" disabled
                   value="{{ isset($_SESSION['mobile']) ? $_SESSION['mobile'] : 'NFY' }}" placeholder="Mobile (10 digits)">
            <a class="btn btn-secondary mb-2" href="{{'account.php'}}" role="button">Edit</a>
        </form>
    </div>
@else
    <div class="row justify-content-center">
        <form class="form-inline" action="{{'join.php'}}" method="POST">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="name" name="name"
                   value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" placeholder="Name">
            <label class="sr-only" for="mobile">Email / Mobile No.</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="mobile" name="mobile"
                   value="{{ isset($_GET['mobile']) ? $_GET['mobile'] : '' }}" placeholder="Mobile (10 digits)">
            <button type="submit" name="join-submit" class="btn btn-primary mb-2">Join</button>
        </form>
    </div>
@endif

<div class="row justify-content-center mx-1 mt-5 text-muted">
    <a href="#"><b>Blog</b></a><b class="mx-3">|</b>
    <a href="#"><b>Video</b></a><b class="mx-3">|</b>
    <a href="{{'matrimony.php'}}"><b>Matrimony</b></a><b class="mx-3">|</b>
    <a href="#"><b>Discus</b></a><b class="mx-3">|</b>
    <a href="{{'problems.php'}}"><b>Problems</b></a><b class="mx-3">|</b>
    <a href="{{'parties.php'}}"><b>Parties</b></a><b class="mx-3">|</b>
    <a href="#"><b>Survey</b></a></a>
    {{--<a href="{{'organization.php'}}"><b>Organization</b></a>--}}
</div>

@endsection

