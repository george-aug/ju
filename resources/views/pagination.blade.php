@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

<div class="mt-5 mb-5">
    <h2>Profile List {{'Total: '.$num}}</h2>
    <table class="table table-bordered mb-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">S No.</th>
            <th scope="col">Profile Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
        <tr>
            <td>{{$profile->id}}</td>
            <td><a href="profile.php?id={{$profile->profile_id}}">{{$profile->profile_id}}</a></td>
            <td>{{$profile->first_name}}</td>
            <td>{{$profile->last_name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3 mb-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{($pno<=1)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $pages; $i++)
                <li class="page-item {{($pno==$i)?'active':''}} "><a class="page-link" href="{{'?pno='.$i}}">{{$i}}</a></li>
            @endfor
            <li class="page-item  {{($pno>=$pages)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno+1)}}">Next</a></li>
        </ul>
    </nav>
</div>
@endsection
