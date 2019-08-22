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
    <form method="get" id="search_form" name="search_form" action="{{'search-results.php'}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_gen">Search For:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_gen-1" name="srch_gen" class="custom-control-input"
                               {{(isset($_GET['srch_gen']) && (1==$_GET['srch_gen']))?'checked':null}}
                               value="1">
                        <label class="custom-control-label" for="srch_gen-1">Groom</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_gen-2" name="srch_gen" class="custom-control-input"
                               {{(isset($_GET['srch_gen']) && (2==$_GET['srch_gen']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_gen-2">Bride</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_age">Age From:</label>
                            <select id="srch_age" name="srch_age" class="custom-select">
                                <option selected value=''>Select age</option>
                                @foreach($age_rows as $row)
                                    <option value="{{$row}}" @if(isset($_GET['srch_age'])){{($row==$_GET['srch_age'])?'selected':null}}@endif>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_age">Age To:</label>
                            <select id="srch_age" name="srch_age" class="custom-select">
                                <option selected value=''>Select age</option>
                                @foreach($age_rows as $row)
                                    <option value="{{$row}}" @if(isset($_GET['srch_age'])){{($row==$_GET['srch_age'])?'selected':null}}@endif>{{$row}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="srch_rel">Religion:</label>
                    <select multiple id="srch_rel" name="srch_rel[]" class="form-control">
                        <option selected value=''>Select religion</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}"
                            @if(isset($_GET['srch_rel'])){{ (in_array($religion->id, $_GET['srch_rel']))?'selected':null }}@endif>
                                {{$religion->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="srch_language">Language:</label>
                    <select multiple id="srch_language" name="srch_language" class="form-control">
                        <option selected value=''>Select language</option>
                        @foreach($languages as $language)
                            <option value="{{$language->id}}"
                            @if(isset($_GET['srch_language'])){{($language->id==$_GET['srch_language'])?'selected':null}}@endif>
                                {{$language->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_cover">Photo:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_cover-1" name="srch_cover" class="custom-control-input"
                               {{(isset($_GET['srch_cover']) && (1==$_GET['srch_cover']))?'checked':null}}
                               value="1">
                        <label class="custom-control-label" for="srch_cover-1">All Profiles</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_cover-2" name="srch_cover" class="custom-control-input"
                               {{(isset($_GET['srch_cover']) && (2==$_GET['srch_cover']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_cover-2">Profile with Photo only</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_height">Heights:</label>
                            <select id="srch_height" name="srch_height" class="custom-select">
                                <option selected value=''>Select height</option>
                                @foreach($heights as $height)
                                    <option value="{{$height->feet}}" @if(isset($_GET['srch_age'])){{($height->feet==$_GET['srch_height'])?'selected':null}}@endif>{{$height->feet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="srch_height">Heights:</label>
                            <select id="srch_height" name="srch_height" class="custom-select">
                                <option selected value=''>Select height</option>
                                @foreach($heights as $height)
                                    <option value="{{$height->feet}}" @if(isset($_GET['srch_age'])){{($height->feet==$_GET['srch_height'])?'selected':null}}@endif>{{$height->feet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{--Country--}}
                <div class="form-group">
                    <label for="srch_country">Country:</label>
                    <select multiple id="srch_country" name="srch_country" class="form-control">
                        <option selected value=''>Select country</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"
                            @if(isset($_GET['srch_country'])){{($country->id==$_GET['srch_country'])?'selected':null}}@endif>
                                {{$country->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{--Marital Status--}}
                <div class="form-group">
                    <label for="srch_marital">Marital Status:</label>
                    <select multiple id="srch_marital" name="srch_marital" class="form-control">
                        <option selected value=''>Select marital</option>
                        @foreach($maritals as $marital)
                            <option value="{{$marital->id}}"
                            @if(isset($_GET['srch_marital'])){{($marital->id==$_GET['srch_marital'])?'selected':null}}@endif>
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
                    <select multiple id="srch_religion" name="srch_religion" class="form-control">
                        <option selected value=''>Select religion</option>
                        @foreach($mangliks as $manglik)
                            <option value="{{$manglik->id}}"
                            @if(isset($_GET['srch_manglik'])){{($manglik->id==$_GET['srch_manglik'])?'selected':null}}@endif>
                                {{$manglik->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_cover">Having Horoscope:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_cover-1" name="srch_cover" class="custom-control-input"
                               {{(isset($_GET['srch_cover']) && (1==$_GET['srch_cover']))?'checked':null}}
                               value="1">
                        <label class="custom-control-label" for="srch_cover-1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_cover-2" name="srch_cover" class="custom-control-input"
                               {{(isset($_GET['srch_cover']) && (2==$_GET['srch_cover']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_cover-2">Doesn't Matter</label>
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
                    <select multiple id="srch_education" name="srch_education" class="form-control">
                        <option selected value=''>Select education</option>
                        @foreach($educations as $education)
                            <option value="{{$education->id}}"
                            @if(isset($_GET['srch_education'])){{($education->id==$_GET['srch_education'])?'selected':null}}@endif>
                                {{$education->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_occupation">Occupation:</label>
                    <select multiple id="srch_occupation" name="srch_occupation" class="form-control">
                        <option selected value=''>Select occupation</option>
                        @foreach($occupations as $occupation)
                            <option value="{{$occupation->id}}"
                            @if(isset($_GET['srch_occupation'])){{($occupation->id==$_GET['srch_occupation'])?'selected':null}}@endif>
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
                    <select multiple id="srch_diet" name="srch_diet" class="form-control">
                        <option selected value=''>Select diet</option>
                        @foreach($diets as $diet)
                            <option value="{{$diet->id}}"
                            @if(isset($_GET['srch_diet'])){{($diet->id==$_GET['srch_diet'])?'selected':null}}@endif>
                                {{$diet->type}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="srch_drink">Drink:</label>
                    <select multiple id="srch_drink" name="srch_drink" class="form-control">
                        <option selected value=''>Select drink</option>
                        @foreach($drinks as $drink)
                            <option value="{{$drink->id}}"
                            @if(isset($_GET['srch_drink'])){{($drink->id==$_GET['srch_drink'])?'selected':null}}@endif>
                                {{$drink->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="srch_smoke">Smoke:</label>
                    <select multiple id="srch_smoke" name="srch_smoke" class="form-control">
                        <option selected value=''>Select smoke</option>
                        @foreach($smokes as $smoke)
                            <option value="{{$smoke->id}}"
                            @if(isset($_GET['srch_smoke'])){{($smoke->id==$_GET['srch_smoke'])?'selected':null}}@endif>
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
                        <input type="radio" id="srch_rsa-1" name="srch_rsa" class="custom-control-input"
                               {{(isset($_GET['srch_rsa']) && (1==$_GET['srch_rsa']))?'checked':null}}
                               value="1">
                        <label class="custom-control-label" for="srch_rsa-1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_rsa-2" name="srch_rsa" class="custom-control-input"
                               {{(isset($_GET['srch_rsa']) && (2==$_GET['srch_rsa']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_rsa-2">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_rsa-3" name="srch_rsa" class="custom-control-input"
                               {{(isset($_GET['srch_rsa']) && (2==$_GET['srch_rsa']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_rsa-3">Undecided</label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="srch_ch">Challenged:</label>
                    <select multiple id="srch_ch" name="srch_ch" class="form-control">
                        <option selected value=''>Select challenged</option>
                        @foreach($challenges as $ch)
                            <option value="{{$ch->id}}"
                            @if(isset($_GET['srch_ch'])){{($ch->id==$_GET['srch_ch'])?'selected':null}}@endif>
                                {{$ch->status}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="srch_rsa">HIV +ive ?</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_hiv-1" name="srch_hiv" class="custom-control-input"
                               {{(isset($_GET['srch_hiv']) && (1==$_GET['srch_hiv']))?'checked':null}}
                               value="1">
                        <label class="custom-control-label" for="srch_hiv-1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="srch_hiv-2" name="srch_hiv" class="custom-control-input"
                               {{(isset($_GET['srch_hiv']) && (2==$_GET['srch_hiv']))?'checked':null}}
                               value="2">
                        <label class="custom-control-label" for="srch_hiv-2">No</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="srch_for">Keyword Search:</label>
                    <input type="text" class="form-control" name="srch_for" id="srch_for" placeholder="Enter text" style="height:100px">
                </div>
            </div>
        </div>




        <div class="row justify-content-center mt-5 mb-5">
            <input class="btn btn-primary btn-lg" name="srch-submit" type="submit" value="Search Profiles">
        </div>


    </form>
@endsection