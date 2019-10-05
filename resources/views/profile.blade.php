@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('style')
    <style>
        .jup>li{
            border:0;
            font-size: 24px;
            color: #808181;
            margin-bottom: 0;
            padding: 0;
        }
        .jup>li>span{
            color: #6c757d;
            margin-left: 10px;

        }

    </style>
@endsection

@section('content')

   {{-- {{var_dump($profile)}}--}}
    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Welcome {{ $profile->first_name.' '."($profile->pno)"}}</h3>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            {{-- Basic Info--}}
            <div>
                <h4 class="text-info mb-3">Basic Details:</h4>

                <ul class="list-group jup">
                    <li class="list-group-item">Name : <span>{{$profile->first_name.' '.$profile->last_name}}</span></li>
                    <li class="list-group-item">Age : <span>{{\Carbon\Carbon::parse($profile->dob)->age.' yr'}}</span></li>
                    <li class="list-group-item">Gender : <span>{{$profile->gender==1?'Male':'Female'}}</span></li>
                    <li class="list-group-item">Height : <span>{{$profile->ht}}</span></li>
                    <li class="list-group-item">Religion : <span>{{$profile->religion}}</span></li>
                    <li class="list-group-item">Community : <span>{{$profile->lang.' speaking'}}</span></li>
                    <li class="list-group-item">Marital Status : <span>{{$profile->mstatus}}</span></li>
                </ul>
            </div>
            {{--<b class="text-danger">~.~.~</b>--}}

            {{-- Education and Career--}}
            <div>
                <h4 class="text-danger mb-3 mt-5">Education & Career:</h4>

                <ul class="list-group jup">
                    <li class="list-group-item">Education : <span>{{$profile->edu}}</span></li>
                    <li class="list-group-item">Graduation : <span>{{$profile->deg}}</span></li>
                    <li class="list-group-item">University : <span>{{$profile->university}}</span></li>
                    @if($profile->other_deg)
                        <li class="list-group-item">Other Deg : <span>{{$profile->other_deg}}</span></li>
                    @endif

                    <b>...</b>
                    <li class="list-group-item">Employed : <span>{{$profile->sector}}</span></li>
                    <li class="list-group-item">Occupation : <span>{{$profile->occ}}</span></li>
                    @if($profile->working_in)
                        <li class="list-group-item">Working : <span>{{$profile->working_in}}</span></li>
                    @endif
                    <li class="list-group-item">Income : <span>{{$profile->income.' per annum'}}</span></li>
                </ul>
            </div>

            {{--Family Details--}}
            <div>
                <h4 class="text-warning mb-3 mt-5">Family Details:</h4>

                <ul class="list-group jup">
                    <li class="list-group-item">Father : <span>{!! $profile->faa?$profile->faa:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Mother : <span>{!! $profile->maa?$profile->maa:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Brothers : <span>{{$profile->bros?$profile->bros:'unknown'}}
                            {{' of which married '}}{{!is_numeric($profile->mbros)?'unknown':$profile->mbros}}</span></li>
                    <li class="list-group-item">Sisters : <span>{{$profile->sis?$profile->sis:'unknown'}}
                            {{' of which married '}}{{!is_numeric($profile->msis)?'unknown':$profile->msis}}</span></li>
                    <li class="list-group-item">Family Status : <span>{!! $profile->fama?$profile->fama:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Family Type : <span>{!! $profile->famt?$profile->famt:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Family Values : <span>{!! $profile->famv?$profile->famv:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Family Income : <span>{!! $profile->fami?$profile->fami.' per annum':'<i>Not Given</i>'!!}</span></li>
                </ul>
            </div>
            <hr>

            {{--Lifestyle--}}
            <div>
                <h4 class="text-primary mb-3 mt-5">Lifestyle:</h4>

                <ul class="list-group jup">
                    <li class="list-group-item">Diet : <span>{!! $profile->diet?$profile->diet:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Smoke : <span>{!! $profile->smoke?$profile->smoke:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Drink : <span>{!! $profile->drink?$profile->drink:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Opened to Pets : <span>{!! !is_numeric($profile->pets)?'<i>Unknown</i>':($profile->pets==1?'Yes':'No') !!}</span></li>
                    <li class="list-group-item">Own House : <span>{!! !is_numeric($profile->house)?'<i>Unknown</i>':($profile->house==1?'Yes':'No') !!}</span></li>
                    <li class="list-group-item">Own Car : <span>{!! !is_numeric($profile->car)?'<i>Unknown</i>':($profile->car==1?'Yes':'No') !!}</span></li>
                    <li class="list-group-item">Body Type : <span>{!! $profile->body?$profile->body:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Complexion : <span>{!! $profile->complexion?$profile->complexion:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Weight : <span>{!! $profile->weight_id?$profile->weight_id:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Blood Group. : <span>{!! $profile->bg?$profile->bg:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Hiv+ : <span>{!! !is_numeric($profile->hiv)?'<i>Unknown</i>':($profile->hiv==1?'Yes':'No') !!}</span></li>
                    <li class="list-group-item">Thalassemia : <span>{!! $profile->thal?$profile->thal:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Challenged : <span>{!! $profile->chal?$profile->chal:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Residential Status : <span>{!! $profile->res?$profile->res:'<i>Unknown</i>'!!}</span></li>
                    <li class="list-group-item">Languages Known : <span></span></li>
                    {{--<li class="list-group-item">Languages Known : <span>{!! $profile->langs?$profile->langs:'<i>Unknown</i>'!!}</span></li>--}}

                </ul>
            </div>

            {{--Your Likes--}}
            {{--<div>
                <h4 class="text-secondary mb-3 mt-5">Your Likes:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="hobby">Hobbies?</label>
                            <select multiple id="hobby" class="form-control">
                                <option>Choose...</option>
                                @foreach($hobbies as $hobby)
                                    <option value="{{$hobby->id}}" {{($profile->hobby_id==$hobby->value)?'Selected':''}}>{{$hobby->text}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="interest">Interests?</label>
                            <select multiple id="interest" class="form-control">
                                <option>Choose...</option>
                                @foreach($interests as $interest)
                                    <option value="{{$interest->id}}" {{($profile->interest_id==$interest->value)?'Selected':''}}>{{$interest->text}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-danger">Save</button>
                </form>
            </div>
            <hr>--}}

            {{--Horoscope--}}
            <div>
                <h4 class="text-success mb-3 mt-5">Horoscope:</h4>

                <ul class="list-group jup">
                    <li class="list-group-item">Sun Sign : <span>{!! $profile->sun?$profile->sun:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Rashi(Moon) : <span>{!! $profile->rashi?$profile->rashi:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Nakshatra : <span>{!! $profile->nak?$profile->nak:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Date of Birth : <span>{!! $profile->dob?$profile->dob:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Time of Birth : <span>{!! $profile->tob?$profile->tob:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Place of Birth : <span>{!! $profile->pob?$profile->pob:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Manglik Status: <span>{!! $profile->manglik?$profile->manglik:'<i>Not Given</i>'!!}</span></li>
                    <li class="list-group-item">Horoscope match : <span>{!! $profile->hm==1?'Required':'Not Necessary'!!}</span></li>
                </ul>
            </div>

            <br>
            <br>
            <br>
        </div>
    </div>
@endsection