@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('style')
    <link rel="stylesheet" href="public/css/icon_font.css">
    <link rel="stylesheet" href="public/css/jquery.transfer.css">
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

        <div class="row mb-5">
            <div class="col-12">
                {{-- Languages Spoken--}}
                <h3 class="text-muted mb-3">Select Languages you spoke:</h3>
                <div class="transfer"></div>
                <input class="btn btn-outline-primary mt-5" type="submit" value="Save">
            </div>
        </div>

    @endif
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="public/js/jquery.transfer.js"></script>

    <script>

        var languages ={!! json_encode($langs)  !!};
        {{--var hobbies ={!! json_encode($hobbies)  !!};--}}



        /*var languages = [
            {
                "language": "jQuery",
                "value": 122
            },
            {
                "language": "AngularJS",
                "value": 132
            },
            {
                "language": "ReactJS",
                "value": 422
            },
            {
                "language": "VueJS",
                "value": 232
            },
            {
                "language": "JavaScript",
                "value": 765
            },
            {
                "language": "Java",
                "value": 876
            },
            {
                "language": "Python",
                "value": 453
            },
            {
                "language": "TypeScript",
                "value": 125
            },
            {
                "language": "PHP",
                "value": 633
            },
            {
                "language": "Ruby on Rails",
                "value": 832
            }
        ];
        var groupData = [
            {
                "groupName": "JavaScript",
                "groupData": [
                    {
                        "language": "jQuery",
                        "value": 122
                    },
                    {
                        "language": "AngularJS",
                        "value": 643
                    },
                    {
                        "language": "ReactJS",
                        "value": 422
                    },
                    {
                        "language": "VueJS",
                        "value": 622
                    }
                ]
            },
            {
                "groupName": "Popular",
                "groupData": [
                    {
                        "language": "JavaScript",
                        "value": 132
                    },
                    {
                        "language": "Java",
                        "value": 112
                    },
                    {
                        "language": "Python",
                        "value": 124
                    },
                    {
                        "language": "TypeScript",
                        "value": 121
                    },
                    {
                        "language": "PHP",
                        "value": 432
                    },
                    {
                        "language": "Ruby on Rails",
                        "value": 421
                    }
                ]
            }
        ];
*/
        $('document').ready(function () {
            // console.log(langs);
            // console.log(hobbies);
            console.log(languages);
        });


        var settings = {
            "inputId": "languageInput",
            "data": languages,
            "itemName": "text",
            "container": "transfer",
            "valueName": "value",
            "callable" : function (data, names) {
                console.log("Selected ID：" + data)
            }
        };
        Transfer.transfer(settings);

        // var settings2 = {
        //     "inputId": "languageInput",
        //     "data": hobbies,
        //     "groupData": groupData,
        //     "itemName": "text",
        //     "groupItemName": "groupName",
        //     "groupListName" : "groupData",
        //     "container": "transfer2",
        //     "valueName": "value",
        //     "callable" : function (data, names) {
        //         console.log("Selected ID：" + data)
        //     }
        // };
        // Transfer.transfer(settings2);

    </script>

@endsection