@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')
    {{var_dump($languages)}}
    {{--{{var_dump($maritals)}}--}}
    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Welcome {{ $profile->first_name.' '."($profile->profile_no)"}}</h3>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <p>
                <button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#basic-info" aria-expanded="false" aria-controls="basic-info">Basic Info</button>
                <button type="button" class="btn btn-outline-secondary" data-toggle="collapse" data-target="#edu-career" aria-expanded="false" aria-controls="edu-career">Edu & Career</button>
                <button type="button" class="btn btn-outline-success" data-toggle="collapse" data-target="#family-details" aria-expanded="false" aria-controls="family-details">Family Details</button>
                <button type="button" class="btn btn-outline-danger" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Danger</button>
                <button type="button" class="btn btn-outline-warning" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Warning</button>
                <button type="button" class="btn btn-outline-info" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Info</button>
            </p>

            {{-- Basic Details --}}
            <div class="collapse show" id="basic-info">
                <div>

                    <h4 class="text-secondary mb-3 mt-5">Basic Details:</h4>
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
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button class="btn btn-sm btn-light float-right" type="button" data-toggle="collapse" data-target="#basic-info" aria-expanded="false" aria-controls="basic-info">
                            Hide me
                        </button>
                    </form>
                </div>
            </div>

            {{-- Education & Career --}}
            <div class="collapse" id="edu-career">
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
                            <div class="form-group col-md-6">
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
                        <button type="submit" class="btn btn-sm btn-secondary">Save</button>
                    </form>
                </div>
            </div>

            {{-- Family Details--}}
            <div class="collapse" id="family-details">
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
            </div>

            <br>
            <br>
            <br>

        </div>
    </div>


@endsection