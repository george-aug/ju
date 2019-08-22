@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h2 class="text-muted">JU Matrimony</h2>
    </div>
    <div class="row justify-content-center">
        @if($num>0)
            @foreach($profiles as $profile)
                <a href="#" class="btn btn-outline-dark ml-2 mr-2 ajaxCP" data-id="{{$profile->id}}" data-no="{{$profile->pno}}" data-gen="{{$profile->gender}}">{{$profile->pno}}</a>

                {{--<form action="chg-profile.php" method="post" class="form-inline my-2 my-lg-0 ml-2 mr-2">
                    <input type="hidden" name="pid" value="{{$profile->id}}">
                    <input type="hidden" name="pno" value="{{$profile->pno}}">
                    <button class="btn btn-outline-dark my-2 my-sm-0" name="matri-submit" type="submit">{{$profile->pno}}</button>
                </form>--}}
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Welcome to JU Matrimony!</h4>
                <p>Searching life partner (jeevansathi) for Indians especially Hindus is like a celebration, while
                    finding a perfect match for your son, daughter, brother, sister, friend and relative can be
                    challenging and difficult also. Combining these celebration and challenges, is where comes JU Matrimony.
                The JU Matrimony is completely free so that you can pick a your soulmate from among thousand of profiles</p>
                <hr>
                <p class="mb-0">JU Matrimony! a free matrimonial service started by Just Unite Foundation</p>
            </div>
        @endif
    </div>
@endsection