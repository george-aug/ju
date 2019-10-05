@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mt-2 mb-5">
        <h2 class="text-muted">Advance Search Form</h2>
    </div>

    {{-- @php
         {{ $_GET['srch_language']; }}
         {{ $_GET['srch_cover']; }}
     @endphp--}}
    <form method="post" id="search_form" name="search_form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_gen">Search For:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_gen-1" name="gen" class="custom-control-input"
                               {{ (1==$gen)?'checked':null }}
                               value="1">
                        <label class="custom-control-label" for="srch_gen-1">Groom</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_gen-2" name="gen" class="custom-control-input"
                               {{ (2==$gen)?'checked':null }}
                               value="2">
                        <label class="custom-control-label" for="srch_gen-2">Bride</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_age">Age From:</label>
                            <select id="srch_age" name="minAge" class="custom-select">
                                <option selected value=''>Select age</option>
                                @foreach($age_rows as $row)
                                    <option value="{{$row}}" {{($row==$minAge)?'selected':null}}>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_age">Age To:</label>
                            <select id="srch_age" name="maxAge" class="custom-select">
                                <option selected value=''>Select age</option>
                                @foreach($age_rows as $row)
                                    <option value="{{$row}}" {{($row==$maxAge)?'selected':null}}>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="srch_rel">Religion:</label>
                    <select multiple id="srch_rel" name="rel[]" class="form-control">
                        <option selected value=''>Select religion</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}"
                                    {{ (in_array($religion->id,$rel)) ?'selected':null }}>
                                {{$religion->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                     <label for="srch_language">Language:</label>
                     <select multiple id="srch_language" name="lan[]" class="form-control">
                         <option selected value=''>Select language</option>
                         @foreach($languages as $language)
                             <option value="{{$language->value}}" {{ (in_array($language->value,$lan)) ?'selected':null }}>
                                 {{$language->text}}
                             </option>
                         @endforeach
                     </select>
                 </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_photo">Photo:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_photo-1" name="pho" class="custom-control-input"
                               {{ (0==$pho)?'checked':null }}
                               value=0>
                        <label class="custom-control-label" for="srch_photo-1">All Profiles</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_photo-2" name="pho" class="custom-control-input"
                               {{ (1==$pho)?'checked':null }}
                               value=1>
                        <label class="custom-control-label" for="srch_photo-2">Profile with Photo only</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_height">Heights:</label>
                            <select id="srch_height" name="minHt" class="form-control">
                                <option selected value=''>Select height</option>
                                @foreach($heights as $height)
                                    <option value="{{$height->id}}" {{($height->id==$minHt)?'selected':null}}>{{$height->feet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_height">Heights:</label>
                            <select id="srch_height" name="maxHt" class="form-control">
                                <option selected value=''>Select height</option>
                                @foreach($heights as $height)
                                    <option value="{{$height->id}}" {{($height->id==$maxHt)?'selected':null}}>{{$height->feet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{--Country--}}
                <div class="form-group">
                    <label for="srch_country">Country:</label>
                    <select multiple id="srch_country" name="con[]" class="form-control">
                        <option selected value=''>Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"
                           {{ (in_array($country->id,$con)) ?'selected':null }}>
                                {{$country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{--Marital Status--}}
                <div class="form-group">
                    <label for="srch_marital">Marital Status:</label>
                    <select multiple id="srch_marital" name="mar[]" class="form-control">
                        <option selected value=''>Select marital</option>
                        @foreach($maritals as $marital)
                            <option value="{{$marital->id}}"
                                    {{ (in_array($marital->id,$mar)) ?'selected':null }}>
                                {{$marital->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>


        {{--

            Main Section: Astrology

        --}}
        <div class="row justify-content-center mt-4 mb-2">
            <h4>Astrology:</h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_religion">Manglik Status:</label>
                    <select multiple id="srch_religion" name="man[]" class="form-control">
                        <option selected value=''>Select religion</option>
                        @foreach($mangliks as $manglik)
                            <option value="{{$manglik->id}}"
                                    {{ (in_array($manglik->id,$man)) ?'selected':null }}>
                                {{$manglik->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_horoscope">Having Horoscope:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_horoscope-1" name="hor" class="custom-control-input"
                                    {{ (1==$hor)?'checked':null }}
                               value="1">
                        <label class="custom-control-label" for="srch_horoscope-1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_horoscope-2" name="hor" class="custom-control-input"
                               {{ (0==$hor)?'checked':null }}
                               value="0">
                        <label class="custom-control-label" for="srch_horoscope-2">Doesn't Matter</label>
                    </div>
                </div>
            </div>
        </div>
        <hr>


        {{--
            Education & Career
         --}}
        <div class="row justify-content-center mt-4 mb-2">
            <h4>Education & Career:</h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_education">Education:</label>
                    <select multiple id="srch_education" name="edu[]" class="form-control">
                        <option selected value=''>Select education</option>
                        @foreach($educations as $education)
                            <option value="{{$education->id}}"
                           {{(in_array($education->id,$edu))?'selected':null }}>
                                {{$education->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_occupation">Occupation:</label>
                    <select multiple id="srch_occupation" name="ocu[]" class="form-control">
                        <option selected value=''>Select occupation</option>
                        @foreach($occupations as $occupation)
                            <option value="{{$occupation->id}}"
                            {{(in_array($occupation->id,$ocu))?'selected':null}}>
                                {{$occupation->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>

        {{--
            Main Section: Lifestyle
         --}}
        <div class="row justify-content-center mt-4 mb-2">
            <h4>Lifestyle:</h4>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="srch_diet">Diet:</label>
                    <select multiple id="srch_diet" name="die[]" class="form-control">
                        <option selected value=''>Select diet</option>
                        @foreach($diets as $diet)
                            <option value="{{$diet->id}}"
                                    {{ (in_array($diet->id,$die)) ?'selected':null }}>
                                {{$diet->type}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="srch_drink">Drink:</label>
                    <select multiple id="srch_drink" name="dri[]" class="form-control">
                        <option selected value=''>Select drink</option>
                        @foreach($drinks as $drink)
                            <option value="{{$drink->id}}"
                                    {{ (in_array($drink->id,$dri)) ?'selected':null }}>
                                {{$drink->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="srch_smoke">Smoke:</label>
                    <select multiple id="srch_smoke" name="smo[]" class="form-control">
                        <option selected value=''>Select smoke</option>
                        @foreach($smokes as $smoke)
                            <option value="{{$smoke->id}}"
                                    {{ (in_array($smoke->id,$smo)) ?'selected':null }}>
                                {{$smoke->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>

        {{--
            Main Section: Others Search Parameters
         --}}
        <div class="row justify-content-center mt-4 mb-2">
            <h4>More Options:</h4>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_rsa">Ready to settle abroad?</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_rsa-1" name="rsa" class="custom-control-input"
                               {{(1==$rsa)?'checked':null}}
                               value=1>
                        <label class="custom-control-label" for="srch_rsa-1">Yes</label>
                    </div>
                    {{--Generally not used so commented out--}}
                    {{--<div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_rsa-2" name="rsa" class="custom-control-input"
                               {{(2==$rsa)?'checked':null}}
                               value=2>
                        <label class="custom-control-label" for="srch_rsa-2">No</label>
                    </div>--}}
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_rsa-3" name="rsa" class="custom-control-input"
                               {{(0==$rsa)?'checked':null}}
                               value=0>
                        <label class="custom-control-label" for="srch_rsa-3">Doesn't Matter</label>{{--Undecided--}}
                    </div>
                </div>


                <div class="form-group">
                    <label for="srch_ch">Challenged:</label>
                    <select multiple id="srch_ch" name="cha[]" class="form-control">
                        <option selected value=''>Select challenged</option>
                        @foreach($challenges as $ch)
                            <option value="{{$ch->id}}"
                                    {{ (in_array($ch->id,$cha)) ?'selected':null }}>
                                {{$ch->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_hiv">HIV +ive ?</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_hiv-1" name="hiv" class="custom-control-input"
                               {{(1==$hiv)?'checked':null}}
                               value=1>
                        <label class="custom-control-label" for="srch_hiv-1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_hiv-2" name="hiv" class="custom-control-input"
                               {{(2==$hiv)?'checked':null}}
                               value=2>
                        <label class="custom-control-label" for="srch_hiv-2">No</label>
                    </div>
                    {{--Generally not used so commented out--}}
                   {{-- <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_hiv-0" name="hiv" class="custom-control-input"
                               {{(0==$hiv)?'checked':null}}
                               value=0>
                        <label class="custom-control-label" for="srch_hiv-0">Doesn't Matter</label>
                    </div>--}}
                </div>

                <div class="form-group">
                    <label for="srch_for">Keyword Search:</label>
                    <input type="text" class="form-control" name="srch_for" id="srch_for" placeholder="Enter text" style="height:100px">
                </div>
            </div>
        </div>




        <div class="row justify-content-center mt-5 mb-5">
            <input class="btn btn-primary mr-2 " name="srch-submit" type="submit" value="Search Profiles">
            <a class="btn btn-dark mr-2" href="{{'newsearch.php'}}" role="button">Reset</a>
        </div>

    </form>

    {{--



    Display Results below




    --}}

    <div class="mt-5 mb-5">
        <h2>Profile List {{'Total: '.$num}}</h2>
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