@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('style')

@endsection

@section('content')
    {{--{{var_dump($_SESSION)}}--}}

    @php
        use Carbon\Carbon;
    @endphp
    <div class="row justify-content-center mb-5">
        <h2 class="text-muted">Profile Dashboard ({{$_SESSION['mno']}})</h2>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <h4 class="text-muted">Interests Send: <span class="text-primary">{{$isNo}}</span></h4>
            <ul class="list-group">
                @foreach($profiles as $profile)
                    <li class="list-group-item border-info text-primary"><a class="text-decoration-none" href="#">{{$profile->profile_no.' '}}</a>
                        <span class="text-muted font-italic text-right">{{ ' sent: '.Carbon::createFromTimeStamp(strtotime($profile->created_at))->diffForHumans()}}</span>
                    </li>
                @endforeach
                @if($isNo<3)
                    @for($i=1;$i<=3-$isNo;$i++)
                        <li class="list-group-item border-info">
                            <span class="text-muted font-italic">{{'Interest send list'}}</span>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>

        <div class="col-md-6">
            <h4 class="text-muted">Interests Received: <span class="text-primary">{{$irNo}}</span></h4>
            <ul class="list-group">
                @foreach($profiles2 as $profile2)
                    <li class="list-group-item border-info text-primary"><a class="text-decoration-none" href="#">{{$profile2->profile_no.' '}}</a>
                        <span class="text-muted font-italic text-right">{{ ' received: '.Carbon::createFromTimeStamp(strtotime($profile2->created_at))->diffForHumans()}}</span>
                    </li>
                @endforeach
                @if($irNo<3)
                    @for($i=1;$i<=3-$irNo;$i++)
                        <li class="list-group-item border-info">
                            <span class="text-muted font-italic">{{'Interest received List'}}</span>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h4 class="text-muted">Connected Profiles: <span class="text-primary">{{$cpNo}}</span></h4>
            <ul class="list-group">
                @foreach($profiles3 as $profile3)
                    <li class="list-group-item border-success text-primary"><a class="text-decoration-none" href="#">{{$profile3->profile_no.' '}}</a>
                        <span class="text-muted font-italic text-right">{{ ' received: '.Carbon::createFromTimeStamp(strtotime($profile3->created_at))->diffForHumans()}}</span>
                    </li>
                @endforeach
                @if($cpNo<3)
                    @for($i=1;$i<=3-$cpNo;$i++)
                        <li class="list-group-item border-success">
                            <span class="text-muted font-italic">{{'connect profiles list will appear here'}}</span>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <h4 class="text-muted">Favourite Profiles: <span class="text-primary">{{$favNo}}</span></h4>
            <ul class="list-group">
                @foreach($profiles4 as $profile4)
                    <li class="list-group-item border-warning text-primary"><a class="text-decoration-none" href="#">{{$profile4->profile_no.' '}}</a>
                        <span class="text-muted font-italic text-right">{{ 'on: '.Carbon::createFromTimeStamp(strtotime($profile4->created_at))->diffForHumans()}}</span>
                    </li>
                @endforeach
                    @if($favNo<3)
                        @for($i=1;$i<=3-$favNo;$i++)
                            <li class="list-group-item border-warning">
                                <span class="text-muted font-italic">{{'favourite list will appear here'}}</span>
                            </li>
                        @endfor
                    @endif
            </ul>
        </div>

        <div class="col-md-6">
            <h4 class="text-muted">Hidden Profiles: <span class="text-primary">{{$hnNo}}</span></h4>
            <ul class="list-group">
                @foreach($profiles5 as $profile5)
                    <li class="list-group-item border-danger text-primary"><a class="text-decoration-none" href="#">{{$profile5->profile_no.' '}}</a>
                        <span class="text-muted font-italic text-right">{{ 'on: '.Carbon::createFromTimeStamp(strtotime($profile5->created_at))->diffForHumans()}}</span>
                    </li>
                @endforeach
                @if($hnNo<3)
                    @for($i=1;$i<=3-$hnNo;$i++)
                        <li class="list-group-item border-danger">
                            <span class="text-muted font-italic">{{'hidden list will appear here'}}</span>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
    <hr>
    <br><br><br><br>
@endsection