@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mt-2 mb-5">
        <h2 class="text-muted">Advance Search Test Form</h2>
    </div>

    <form method="get" id="search_form" name="search_form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_location">Marital Status:</label><br>
                    @foreach($maritals as $marital)
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" id="srch_mar-{{$marital->id}}" name="srch_mar-{{$marital->id}}" class="custom-control-input"
                                   {{('srch_mar-'.$marital->id==isset($_GET['srch_mar-'.$marital->id]))?'checked':null}} value="{{$marital->id}}">
                            <label class="custom-control-label" for="srch_mar-{{$marital->id}}">{{$marital->status}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_rel">Religion:</label>
                    <select multiple id="srch_rel" name="srch_rel_array[]" class="form-control">
                        <option selected value=''>Select religion</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}">
                                {{$religion->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5 mb-5">
            <input class="btn btn-primary btn-lg" name="srch-submit" type="submit" value="Search">
        </div>
    </form>

@endsection