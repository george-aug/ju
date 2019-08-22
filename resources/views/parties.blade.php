@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center">
        <h3 class="text-muted display-4">Political Parties</h3>
    </div>

    <div class="mt-5 mb-5">

        @foreach($types as $type => $records)
            <h3>
                @if($type==1)
                    {{'National Parties'}}
                @else
                    {{'State Parties'}}
                @endif
            </h3>

            <table class="table table-bordered mb-4">
                <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Abbreviation</th>
                </tr>
                </thead>
                <tbody>
                @php $i=0 @endphp
                @foreach($records as $record)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->abbreviation}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endforeach

    </div>
    <div class="mt-5 mb-5 d-flex justify-content-end">
        <a href="{{'rups.php'}}" role="button" class="btn btn-danger">Other Registered Unrecognized Parties </a>
    </div>
@endsection