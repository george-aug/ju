@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')


    <div class="mt-5 mb-5">
        <h2>Profile List</h2>
        <table class="table table-bordered table-responsive">
            <thead class="thead-light">
            <tr>
                <th scope="col">S No.</th>
                <th scope="col">Profile Id</th>
                <th scope="col">Photo</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Height</th>
                <th scope="col">Religion</th>
                <th scope="col">Language</th>
                <th scope="col">Country</th>
                <th scope="col">Income</th>
                <th scope="col">mStatus</th>
                <th scope="col">Manglik</th>
                <th scope="col">horoscope</th>
                <th scope="col">Education</th>
                <th scope="col">Occupation</th>
                <th scope="col">Diet</th>
                <th scope="col">Smoke</th>
                <th scope="col">Drink</th>
                <th scope="col">Challenged</th>
                <th scope="col">Hiv+</th>
                <th scope="col">Settle Abroad?</th>

            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->id}}</td>
                    <td><a href="profile.php?id={{$profile->pno}}">{{$profile->pno}}</a></td>
                    <td>@if($profile->photo==1)
                            <a href=""><img src="{{'public/images/blue-128.png'}}" alt="" width="45px" height="45px"></a>
                        @else
                            <img src="{{'public/images/default-128.png'}}" alt="" width="45px" height="45px">
                        @endif
                    </td>
                    <td>{{$profile->first_name}}</td>
                    <td>{{$profile->last_name}}</td>
                    <td>{{($profile->gender==1) ? 'Male':'Female' }}</td>
                    <td>{{\Carbon\Carbon::parse($profile->dob)->age}}</td>
                    <td>{{$profile->ht}}</td>
                    <td>{{$profile->religen}}</td>
                    <td>{{$profile->lang}}</td>
                    <td>{{$profile->country}}</td>
                    <td>{{$profile->income}}</td>
                    <td>{{$profile->mstatus}}</td>
                    <td>{{$profile->manglik}}</td>
                    <td>{{($profile->horoscope==1) ? 'Avbl.':'N-Avbl.' }}</td>
                    <td>{{$profile->edu}}</td>
                    <td>{{$profile->occ}}</td>
                    <td>{{$profile->diet}}</td>
                    <td>{{$profile->smoke}}</td>
                    <td>{{$profile->drink}}</td>
                    <td>{{$profile->challeng}}</td>
                    <td>{{$profile->hiv}}</td>
                    <td>{{$profile->rsa}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection