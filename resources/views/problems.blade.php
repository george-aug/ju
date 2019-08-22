@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')


    <div class="mt-5 mb-5">
        <h2>Problems</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th scope="col">S No.</th>
                <th scope="col">Problems</th>

            </tr>
            </thead>
            <tbody>
            @foreach($problems as $problem)
                <tr>
                    <td>{{$problem->id}}</td>
                    <td>{{$problem->title}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection