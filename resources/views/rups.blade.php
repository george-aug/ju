@extends('layouts.app')

@section('title', 'Page Title')

@section('style')
    <style>
        .wrapper > ul {
            padding-left: 0;
        }
        .wrapper > ul#results li {
            margin-bottom: 1px;
            background: #f9cd9f;
            padding: 20px;
            list-style: none;
        }
    </style>

@endsection

{{--@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="mt-5 mb-5">
        <h3 class="text-muted">Registered Unrecognized Parties <bdi class="text-warning">{{'Total: '.$num}}</bdi></h3>


        <div class="wrapper">
            <!-- results appear here -->
            <ul id="results">
                @foreach ($rups as $rup)
                    <li>
                        <strong>{{ $rup->id .' '. $rup->name . ':' }}</strong>
                        <br>{{ $rup->headquarter }}
                    </li>
                @endforeach
            </ul>
        </div>
        {{--<table class="table table-bordered mb-5">
            <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>

            </tr>
            </thead>
            <tbody>
            @foreach($parties as $party)
                <tr>
                    <td>
                        <span class="bg-warning">{{$party->id}}</span>
                        {{$party->name}}
                        {{'/t'}}
                        {{$party->headquarter}}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>--}}
    </div>

    <div class="mt-3 mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item {{($pno<=1)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno-1)}}">Previous</a></li>
                @for ($i = $pno; $i <= $pno+6; $i++)
                    <li class="page-item {{($pno==$i)?'active':''}} "><a class="page-link" href="{{'?pno='.$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item  {{($pno>=$pages)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno+1)}}">Next</a></li>
            </ul>
        </nav>
    </div>
@endsection
