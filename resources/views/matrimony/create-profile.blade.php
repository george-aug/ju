@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h2 class="text-muted">Create Profile</h2>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
        <form action="{{'create-profile.php'}}" method="post" autocomplete="off">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cFor">Created For</label>
                    <select id="cFor" class="form-control">
                        <option selected>Choose...</option>
                        @foreach($fors as $for)
                            <option value="{{$for->id}}">{{$for->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select id="gender" class="form-control">
                        <option selected>Choose...</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" value="{{$profile->dob}}"  min="1951-01-01" max="1998-12-31">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="marital">Marital Status</label>
                    <select id="marital" class="form-control">
                        <option selected>Choose...</option>
                        @foreach($maritals as $marital)
                            <option value="{{$marital->id}}">{{$marital->status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <select id="religion" class="form-control">
                        <option selected>Choose...</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                </div>


            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        I agree with JU-Matrimony terms & conditions
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Matrimony Profile</button>
        </form>
        </div>
    </div>

    <br>    
    <br>

    <br><br>

@endsection

@section('script')
    <script>
        

    </script>

@endsection