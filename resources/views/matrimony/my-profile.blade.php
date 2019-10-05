@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('style')
    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/assets/app.css">
    <style>
        /*.container{
            margin: 20px;
        }*/
    </style>
@endsection

@section('content')
    @if(!isset($_SESSION['pid']))
        <div class="row justify-content-center mb-5">
            <h3 class="text-muted">{{'Sorry! but no matrimonial profile is associated with this account.'}}</h3>
        </div>
        <div class="row justify-content-center mb-5">
            <a role="button" href="{{'matrimony.php'}}" class="btn btn-outline-info my-2 my-sm-0 mr-2">Create Profile</a>
            <a role="button" href="{{'referral.php'}}" class="btn btn-outline-success my-2 my-sm-0">Earn Money</a>
        </div>
    @else

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Welcome {{ $profile->first_name.' '}}<a href="{{'profile.php?id='.$profile->pno}}">{{$profile->pno}}</a></h3>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            {{-- Basic Info--}}
            <div>
                <h4 class="text-secondary mb-3">Basic Details:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name" value="{{$profile->first_name}}">
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last name" value="{{$profile->last_name}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control">
                                <option selected>Choose...</option>
                                <option value="1" {{($profile->gender==1)?'Selected':''}}>Male</option>
                                <option value="2" {{($profile->gender==2)?'Selected':''}}>Female</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{$profile->dob}}"  min="1951-01-01" max="1998-12-31">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="height">Height</label>
{{--                            <input type="text" class="form-control" name="height" id="height" placeholder="" value="{{$profile->height_id}}">--}}
                            <select id="height" class="form-control">
                                <option>Choose...</option>
                                @foreach($heights as $height)
                                    <option value="{{$height->id}}" {{($profile->height_id==$height->id)?'Selected':''}}>{{$height->feet}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="religion">Religion</label>
                            {{--<input type="text" class="form-control" name="religion" id="religion" placeholder="" value="{{$profile->religion_id}}">--}}
                            <select id="religion" class="form-control">
                                <option>Choose...</option>
                                @foreach($religions as $religion)
                                    <option value="{{$religion->id}}" {{($profile->religion_id==$religion->id)?'Selected':''}}>{{$religion->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="mTongue">Mother Tongue</label>
                            {{--<input type="text" class="form-control" name="mTongue" id="mTongue" placeholder="" value="{{$profile->language_id}}">--}}
                            <select id="mTongue" class="form-control">
                                <option>Choose...</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}" {{($profile->language_id==$language->id)?'Selected':''}}>{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="marital">Marital Status</label>
                            <select id="marital" class="form-control">
                                <option>Choose...</option>
                                @foreach($maritals as $marital)
                                    <option value="{{$marital->id}}" {{($profile->marital_id==$marital->id)?'Selected':''}}>{{$marital->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-danger">Save</button>
                </form>
            </div>
            <hr>

            {{-- Education and Career--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Education & Career:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="education">Highest Education</label>
                            <select id="education" class="form-control">
                                <option>Choose...</option>
                                @foreach($educations as $education)
                                    <option value="{{$education->id}}" {{($profile->education_id==$education->id)?'Selected':''}}>{{$education->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="degree">UG Degree</label>
                            {{--<input type="text" class="form-control" name="degree" id="degree" placeholder="" value="{{$profile->degree_id}}">--}}
                            <select id="degree" class="form-control">
                                <option>Choose...</option>
                                @foreach($degrees as $degree)
                                    <option value="{{$degree->id}}" {{($profile->degree_id==$degree->id)?'Selected':''}}>{{$degree->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="university">University</label>
                            <select id="university" class="form-control">
                                <option>Choose...</option>
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}" {{($profile->university_id==$university->id)?'Selected':''}}>{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="otherDeg">Other UG Degree</label>
                            <input type="text" class="form-control" name="otherDeg" id="otherDeg" placeholder="Other Degree" value="{{$profile->other_deg}}">
                        </div>
                    </div>
                    <b>...</b>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="sector">Employed In (Sector)</label>
                            <select id="sector" class="form-control">
                                <option>Choose...</option>
                                @foreach($sectors as $sector)
                                    <option value="{{$sector->id}}" {{($profile->sector_id==$sector->id)?'Selected':''}}>{{$sector->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="occupation">Occupation</label>
                            <select id="occupation" class="form-control">
                                <option>Choose...</option>
                                @foreach($occupations as $occupation)
                                    <option value="{{$occupation->id}}" {{($profile->occupation_id==$occupation->id)?'Selected':''}}>{{$occupation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="organization">Working In</label>
                            <input type="text" class="form-control" name="organization" id="organization" placeholder="Name of Organization" value="{{$profile->working_in}}">
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="occupation">Occupation</label>
                            <select id="occupation" class="form-control">
                                <option>Choose...</option>
                                @foreach($incomes as $income)
                                    <option value="{{$income->id}}" {{($profile->income_id==$income->id)?'Selected':''}}>{{$income->ranze}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </form>
            </div>
            <hr>

            {{--Family Details--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Family Details:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="father">Father Is</label>
                            <select id="father" class="form-control">
                                <option>Choose...</option>
                                @foreach($fathers as $father)
                                    <option value="{{$father->id}}" {{($profile->father_id==$father->id)?'Selected':''}}>{{$father->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="mother">Mother Is</label>
                            <select id="mother" class="form-control">
                                <option>Choose...</option>
                                @foreach($mothers as $mother)
                                    <option value="{{$mother->id}}" {{($profile->mother_id==$mother->id)?'Selected':''}}>{{$mother->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="brother">Brothers</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">No of Brothers of which Married</span>
                                </div>
                                <input type="text" aria-label="First name" placeholder="No. of Bro's" class="form-control">
                                <input type="text" aria-label="Last name" placeholder="married one's" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="sisters">Sisters</label>
                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">No of Sisters of which Married</span>
                                </div>
                                <input type="text" aria-label="sisters" placeholder="No. of Sis" class="form-control">
                                <input type="text" aria-label="married_sis" placeholder="married one's" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="affluence">Family Status</label>
                            <select id="affluence" class="form-control">
                                <option>Choose...</option>
                                @foreach($famAffluence as $affluence)
                                    <option value="{{$affluence->id}}" {{($profile->famAffluence_id==$affluence->id)?'Selected':''}}>{{$affluence->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="famType">Family Type</label>
                            <select id="famType" class="form-control">
                                <option>Choose...</option>
                                @foreach($famTypes as $famType)
                                    <option value="{{$famType->id}}" {{($profile->famType_id==$famType->id)?'Selected':''}}>{{$famType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="famValue">Family Values</label>
                            <select id="famValue" class="form-control">
                                <option>Choose...</option>
                                @foreach($famValues as $value)
                                    <option value="{{$value->id}}" {{($profile->famValue_id==$value->id)?'Selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="famIncome">Family Income</label>
                            <select id="famIncome" class="form-control">
                                <option>Choose...</option>
                                @foreach($famIncomes as $famIncome)
                                    <option value="{{$famIncome->id}}" {{($profile->famIncome_id==$famIncome->id)?'Selected':''}}>{{$famIncome->level}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </form>
            </div>
            <hr>

            {{--Lifestyle--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Lifestyle:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="diet">Dietary Habits</label>
                            <select id="diet" class="form-control">
                                <option>Choose...</option>
                                @foreach($diets as $diet)
                                    <option value="{{$diet->id}}" {{($profile->diet_id==$diet->id)?'Selected':''}}>{{$diet->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="smoke">Smoking Habit</label>
                            <select id="smoke" class="form-control">
                                <option>Choose...</option>
                                @foreach($smokes as $smoke)
                                    <option value="{{$smoke->id}}" {{($profile->smoke_id==$smoke->id)?'Selected':''}}>{{$smoke->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="drink">Drinking Habits</label>
                            <select id="drink" class="form-control">
                                <option>Choose...</option>
                                @foreach($drinks as $drink)
                                    <option value="{{$drink->id}}" {{($profile->drink_id==$drink->id)?'Selected':''}}>{{$drink->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 mt-2">
                            <label class="mr-5">Opened to Pets: </label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1"> Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2"> No</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="famType">Own a House?</label>
                            <select id="famType" class="form-control">
                                <option value ='' {{($profile->house==='')?'Selected':''}}>Please Select</option>
                                <option value ='1' {{($profile->house===1)?'Selected':''}}>Yes</option>
                                <option value ='0' {{($profile->house===0)?'Selected':''}}>No</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="famType">Own a Car?</label>
                            <select id="famType" class="form-control">
                                <option value ='' {{($profile->car==='')?'Selected':''}}>Please Select</option>
                                <option value ='1' {{($profile->car===1)?'Selected':''}}>Yes</option>
                                <option value ='0' {{($profile->car===0)?'Selected':''}}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="body">Body type</label>
                            <select id="body" class="form-control">
                                <option>Choose...</option>
                                @foreach($bodies as $body)
                                    <option value="{{$body->id}}" {{($profile->body_id==$body->id)?'Selected':''}}>{{$body->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="complexion">Complexion</label>
                            <select id="complexion" class="form-control">
                                <option>Choose...</option>
                                @foreach($complexions as $complexion)
                                    <option value="{{$complexion->id}}" {{($profile->complexion_id==$complexion->id)?'Selected':''}}>{{$complexion->type}}</option>
                                @endforeach
                            </select>
                        </div>
                       {{-- {{$wts}}--}}
                        <div class="form-group input-group-sm col-md-4">
                            <label for="wt">Weight</label>
                            <select id="wt" class="form-control">
                                <option>Choose...</option>
                                @foreach($wts as $wt)
                                    <option value="{{$wt}}" {{($profile->weight_id==$wt)?'Selected':''}}>{{$wt}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="bGroup">Blood Group</label>
                            <select id="bGroup" class="form-control">
                                <option>Choose...</option>
                                @foreach($bGroups as $value)
                                    <option value="{{$value->id}}" {{($profile->bGroup_id==$value->id)?'Selected':''}}>{{$value->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="hiv">HIV+</label>
                            <select id="hiv" class="form-control">
                                <option value ='0' {{($profile->hiv===0)?'Selected':''}}>Please Select</option>
                                <option value ='1' {{($profile->hiv===1)?'Selected':''}}>Yes</option>
                                <option value ='2' {{($profile->hiv===2)?'Selected':''}}>No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="thalassemia">Thalassemia</label>
                            <select id="thalassemia" class="form-control">
                                <option>Choose...</option>
                                @foreach($thalassemia as $value)
                                    <option value="{{$value->id}}" {{($profile->thalassemia_id==$value->id)?'Selected':''}}>{{$value->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="challenged">Physically Challenged?</label>
                            <select id="challenged" class="form-control">
                                <option>Choose...</option>
                                @foreach($challenges as $challenge)
                                    <option value="{{$challenge->id}}" {{($profile->challenged_id==$challenge->id)?'Selected':''}}>{{$challenge->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="citizenship">Residential Status</label>
                            <select id="citizenship" class="form-control">
                                <option>Choose...</option>
                                @foreach($citizenship as $value)
                                    <option value="{{$value->id}}" {{($profile->citizenship_id==$value->id)?'Selected':''}}>{{$value->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lang">Languages Known?</label>
                            {{--<input type="text" class="form-control" name="lang" id="lang">--}}
                            <select multiple id="lang" class="form-control">
                                <option>Choose...</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}" {{($profile->language_id==$language->value)?'Selected':''}}>{{$language->text}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                </form>
            </div>
            <hr>

            {{--Your Likes--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Your Likes:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="hobby">Hobbies?</label>
                            <select multiple id="hobby" class="form-control d-sm-none d-md-block">
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
            <hr>

            {{--Horoscope--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Horoscope:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="state">State</label>
                            <select id="state" class="form-control">
                                <option value="">Choose...</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{($profile->state_id==$state->id)?'Selected':''}}>{{$state->text}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            <label for="district">Districts/Cities</label>
                            <select id="district" class="form-control">
                                <option value="">Select state first</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{$profile->dob}}" disabled  min="1951-01-01" max="1998-12-31">
                        </div>
                        <div class="form-group input-group-sm col-md-6">
                            {{--<label for="tob">Time of Birth</label>
                            <input type="time" class="form-control" name="tob" id="tob" value="{{$profile->tob}}">--}}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="sun_sign">Sun Sign</label>
                            <select id="sun_sign" class="form-control">
                                <option>Choose...</option>
                                @foreach($sun_signs as $sun_sign)
                                    <option value="{{$sun_sign->id}}" {{($profile->sun_sign_id==$sun_sign->id)?'Selected':''}}>{{$sun_sign->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="moonSign">Moon Sign</label>
                            <select id="moonSign" class="form-control">
                                <option>Choose...</option>
                                @foreach($moonSigns as $moonSign)
                                    <option value="{{$moonSign->id}}" {{($profile->moon_sign_id==$moonSign->id)?'Selected':''}}>{{$moonSign->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="nakshatra">Nakshatra</label>
                            <select id="nakshatra" class="form-control">
                                <option>Choose...</option>
                                @foreach($nakshatras as $nakshatra)
                                    <option value="{{$nakshatra->id}}" {{($profile->nakshatra_id==$nakshatra->id)?'Selected':''}}>{{$nakshatra->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-4">
                            <label for="manglik">Manglik Status</label>
                            <select id="manglik" class="form-control">
                                <option>Choose...</option>
                                @foreach($mangliks as $manglik)
                                    <option value="{{$manglik->id}}" {{($profile->manglik_id==$manglik->id)?'Selected':''}}>{{$manglik->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="hm">Horoscope Match</label>
                            <select id="hm" class="form-control">
                                <option>Choose...</option>
                                <option value=1 {{($profile->hm==1)?'Selected':''}}>Necessary</option>
                                <option value=0 {{($profile->hm==0)?'Selected':''}}>Not Necessary</option>
                                <option value="3" {{($profile->hm==3)?'Selected':''}}>May be</option>
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-4">
                            <label for="hp">Horoscope Privacy</label>
                            <select id="hp" class="form-control">
                                <option>Choose...</option>
                                <option value="1" {{($profile->hp==1)?'Selected':''}}>Visible</option>
                                <option value="0" {{($profile->hp==0)?'Selected':''}}>Hide</option>
                                <option value="3" {{($profile->hp==3)?'Selected':''}}>On demand</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-info">Save</button>
                </form>
            </div>
            <hr>

            {{--Contact Details--}}
            <div>
                <h4 class="text-secondary mb-3 mt-5">Contact Details:</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6 pr-3">
                            <label for="email">Primary Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
                        </div>

                        <div class="form-group input-group-sm col-md-6 pl-3">
                            <label for="email">Alternative Email</label>
                            <input type="email" class="form-control" id="email" placeholder=" Alternative Email" value="{{$user->alt_em}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6 pr-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$user->mobile}}">
                        </div>
                        <div class="form-group input-group-sm col-md-6 pl-3">
                            <label for="alt_no">Alternative No.</label>
                            <input type="text" class="form-control" name="alt_no" id="alt_no" value="{{$user->alt_mb}}" placeholder="mobile no. (10 digits)">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6 pr-3">
                            <input type="text" class="form-control" name="owner" id="owner" value="{{$user->name}}">
                        </div>
                        <div class="form-group input-group-sm col-md-6 pl-3">
                            <input type="text" class="form-control" name="alt_owner" id="alt_owner" value="{{$user->alt_name}}" placeholder="Name of owner">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6 pr-3">
                            <select id="rel1" class="form-control">
                                <option>Choose...</option>
                                @foreach($relations as $value)
                                    <option value="{{$value->id}}" {{($profile->rel1==$value->id)?'Selected':''}}>{{$value->text}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group input-group-sm col-md-6 pl-3">
                            <select id="rel2" class="form-control">
                                <option>Choose...</option>
                                @foreach($relations as $value)
                                    <option value="{{$value->id}}" {{($profile->rel2==$value->id)?'Selected':''}}>{{$value->text}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group input-group-sm col-md-6 pr-3">
                            <label for="exampleFormControlTextarea1">Contact Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Contact Address"></textarea>
                        </div>
                        <div class="form-group input-group-sm col-md-6 pl-3">
                            <label for="exampleFormControlTextarea1">Permanent Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Parent's Address"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group input-group input-group-sm col-md-6 pr-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon4">Pin</span>
                            </div>
                            <input type="text" class="form-control" id="inputZip" placeholder="Zip" aria-describedby="basic-addon4">
                        </div>

                        <div class="form-group input-group input-group-sm col-md-6 pl-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Pin</span>
                            </div>
                            <input type="text" class="form-control" id="inputZip" placeholder="Zip" aria-describedby="basic-addon3">
                        </div>
                    </div>





                    <button type="submit" class="btn btn-sm btn-secondary">Click to Edit</button>
                    <button type="submit" class="btn btn-sm btn-warning">Save</button>
                </form>
            </div>
            <hr>

            <br>
            <br>
            <br>
        </div>
    </div>

    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#country').on('change', function(){
                var countryID = $(this).val();
                if(countryID){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'country_id='+countryID,
                        success:function(html){
                            $('#state').html(html);
                            $('#city').html('<option value="">Select state first</option>');
                        }
                    });
                }else{
                    $('#state').html('<option value="">Select country first</option>');
                    $('#city').html('<option value="">Select state first</option>');
                }
            });

            $('#state').on('change', function(){
                var stateID = $(this).val();
                if(stateID){
                    $.ajax({
                        type:'POST',
                        url:'w-ajax/select-district.php',
                        data:{
                            state_id:stateID
                        },
                        success:function(data,status){
                            //console.log(data);
                            //console.log(status);
                            $('#district').html(data);
                        }
                    });
                }else{
                    $('#district').html('<option value="">Select state first</option>');
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script>

        /*var data =
        '[{ "value": 1, "text": "Task 1", "continent": "Task" }, { "value": 2, "text": "Task 2", "continent": "Task" },' +
        ' { "value": 3, "text": "Task 3", "continent": "Task" }, { "value": 4, "text": "Task 4", "continent": "Task" },' +
        ' { "value": 5, "text": "Task 5", "continent": "Task" }, { "value": 6, "text": "Task 6", "continent": "Task" } ]';*/

        var data ='{!! json_encode($languages)  !!}';
        //get data pass to json
        var language = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace("text"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: jQuery.parseJSON(data) //your can use json type
        });

        language.initialize();

        var elt = $("#lang");
        elt.tagsinput({
            tagClass: function(item) {
                switch (item.color) {
                    case 'Europe'   : return 'label label-info';
                    case 'America'  : return 'label label-danger';
                    case 'Australia': return 'label label-success';
                    case 'Africa'   : return 'label label-primary';
                    case 'Asia'     : return 'label label-warning';
                }
            },
            itemValue: "value",
            itemText: "text",
            typeaheadjs: {
                name: "language",
                displayKey: "text",
                source: language.ttAdapter()
            }
        });

        //insert data to input in load page
        elt.tagsinput("add", {
            value: 1,
            text: "Hindi",
            color: "Asia"
        });

    </script>
@endsection