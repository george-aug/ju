@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="mt-5 mb-5">
        <h2>Profile List: <i class="text-muted">{{$total}}</i></h2>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th scope="col">S No.</th>
                <th scope="col">Profile Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Connect</th>
                <th scope="col">Fav</th>
                <th scope="col">Hide</th>

            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr class="m-0">
                    <td class="w-5">{{$profile->id}}</td>
                    <td class="w-20"><a href="profile.php?id={{$profile->pno}}">{{$profile->pno}}</a></td>

                    <td class="w-10">{!!($profile->photo==1)?'<a href="#"><i class="material-icons md-dark">photo_library</i></a>':
                    '<i class="material-icons md-dark md-inactive">photo_camera</i>'!!}</td>

                    <td class="w-20">{{$profile->first_name.' '.$profile->last_name}}</td>
                    <td class="w-10">{{($profile->gender==1) ? 'Male':'Female' }}</td>
                    <td class="w-10">{{\Carbon\Carbon::parse($profile->dob)->age}}</td>
                    {{--<td><a href=""><i class="material-icons red34">favorite</i></a></td>--}}
                    <td class="w-15">
                        {{--<form action="{{'blank.php'}}" method="post">
                            <input class="btn btn-info btn-sm" type="submit" value="Initiate">
                        </form>--}}
                        {{--<input type="hidden" id="pid" value="{{$profile->id}}">--}}
                        <input class="btn btn-info btn-sm ajaxSI" {{in_array($profile->id,$connArr)?'disabled':''}}
                               id="{{'btn'.$profile->id}}" data-id="{{$profile->id}}" type="button" value="{{in_array($profile->id,$connArr)?'Sent':'Initiate'}}">
                        <span>
                            <img src="{{'public/images/loading.gif'}}" id="{{'loader'.$profile->id}}" height="20px" width="20px" class="align-centre" style="display:none">
                        </span>
                    </td>
                    <td class="w-5">
                        <a href="#" onclick="{{isset($_SESSION['logged-in'])?"preventClick(event)":"loginPage(event)"}}" class="btn ajaxFav p-0 {{in_array($profile->id,$favArr)?'disabled':''}}"
                           id="{{'fav'.$profile->id}}" data-id="{{$profile->id}}">
                            <i class="material-icons md-dark">favorite</i>
                        </a>
                        <span><img src="{{'public/images/loading.gif'}}" id="{{'favLoader'.$profile->id}}" height="20px" width="20px" class="align-centre" style="display:none"></span>
                    </td>
                    <td class="w-5">

                        <a href="#" onclick="preventClick(event)" class="btn ajaxHide p-0 {{in_array($profile->id,$hideArr)?'disabled':''}}"
                           id="{{'hide'.$profile->id}}" data-id="{{$profile->id}}">
                            <i class="material-icons red34">visibility_off</i>
                        </a>
                        <span><img src="{{'public/images/loading.gif'}}" id="{{'hideLoader'.$profile->id}}" height="20px" width="20px" class="align-centre" style="display:none"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        function preventClick(e) {
            e.preventDefault();
        }
        function loginPage(e) {
            e.preventDefault();
            window.location.href = "login.php";
        }


        $(document).ready(function () {
            $('.ajaxSI').on('click',function () {
                var pid = $(this).data('id');
                $('#btn'+pid).attr('hidden',true);
                $('#loader'+pid).show();
                $.ajax({
                    url:"send-interest.php",
                    method:'post',
                    data:{
                        pid:$(this).data('id')
                    },
                    dataType:"text",
                    success:function (data, status) {
                        console.log(data);
                        console.log(status);
                        // Hide image container
                        setTimeout(function(){
                            $('#loader'+data).hide();
                            $('#btn'+data).attr('hidden',false).attr('disabled',true).attr('value','Sent');
                        }, 1000);
                        //$('#loader'+data).hide();
                        //$('#btn'+data).attr('hidden',false);
                        //$('#btn'+data).attr('hidden',false).attr('disabled',true);
                    }
                });
            });




            //-----------------------------
            // Adding Favourite
            //-----------------------------
            $('.ajaxFav').on('click',function () {
                var pid = $(this).data('id');
                $('#fav'+pid).hide();
                $('#favLoader'+pid).show();
                $.ajax({
                    url:"fav_profile.php",
                    method:'post',
                    data:{
                        pid:$(this).data('id')
                    },
                    dataType:"text",
                    success:function (data, status) {

                        if(data == 1){
                            console.log(data);
                            console.log(status);
                            setTimeout(function(){
                                $('#favLoader'+pid).hide();
                                $('#fav'+pid).show().addClass('disabled');
                            }, 1000);

                            //alert("Thank you for subscribing!");
                        }
                        else if(data == 0){
                            console.log(data);
                            console.log(status);
                            setTimeout(function(){
                                $('#favLoader'+pid).hide();
                                $('#fav'+pid).show();
                            }, 1000);
                            //alert("Error on query!");
                        }
                    }
                });
            });

            //-----------------------------
            // Hiding Profile
            //-----------------------------
            $('.ajaxHide').on('click',function () {
                var pid = $(this).data('id');
                $('#hide'+pid).hide();
                $('#hideLoader'+pid).show();
                $.ajax({
                    url:"hide_profile.php",
                    method:'post',
                    data:{
                        pid:$(this).data('id')
                    },
                    dataType:"text",
                    success:function (data, status) {

                        if(data == 1){
                            console.log(data);
                            console.log(status);
                            setTimeout(function(){
                                $('#hideLoader'+pid).hide();
                                $('#hide'+pid).show().addClass('disabled');
                            }, 1000);

                            //alert("Thank you for subscribing!");
                        }
                        else if(data == 0){
                            console.log(data);
                            console.log(status);
                            setTimeout(function(){
                                $('#hideLoader'+pid).hide();
                                $('#hide'+pid).show();
                            }, 1000);
                            //alert("Error on query!");
                        }
                    }
                });
            });
            
        });
        
    </script>
@endsection