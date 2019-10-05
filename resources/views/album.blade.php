@extends('layouts.app')

@section('title', 'Page Title')

@section('style')
    <link rel="stylesheet" href="public/css/slim.min.css">
    <link rel="stylesheet" href="public/css/slim-appearance.css">
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
        <h3 class="text-muted">{{ $_SESSION['fn'].'\'s Album' }}</h3><br>
    </div>

        {{--<div class="row mt-5 mb-5">
        @foreach($images as $img)

            @if($img->img_id!=null)
            <div class="col-md-4">
                <b>Image No: 1</b>
                <div class="slim"
                     data-ratio="3:4"
                     data-service="slim/async.php"
--}}{{--                     data-button-edit-class-name="disable-edit-btn"--}}{{--
                     data-did-transform="removeEdit"
                     data-did-remove="handleImageRemoval"
                     data-did-init="slimInitialised"
                     data-meta-pic-id="{{($img->img_id==1)?$img->img_id:1}}">
                    <input type="file" accept="image/jpeg, image/png"/>
                    @if($img->img_id==1)
                        <img src="{{'uploaded/pics/'.$img->filename}}" alt="">
                    @endif
                </div>
            </div>
            @else
            <div class="col-md-4">
                <b>Image No:2</b>
                <div class="slim"
                     data-ratio="3:4"
                     data-service="slim/async.php"
                     data-did-transform="removeEdit"
                     data-did-remove="handleImageRemoval"
                     data-did-init="slimInitialised"
                     data-meta-pic-id="{{($img->img_id==1)?$img->img_id:2}}">
                    <input type="file" accept="image/jpeg, image/png"/>
                    @if($img->img_id==2)
                        <img src="{{'uploaded/pics/'.$img->filename}}" alt="">
                    @endif
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <b>Image No:3</b>
                <div class="slim"
                     data-ratio="3:4"
                     data-service="slim/async.php"
--}}{{--                     data-button-edit-class-name="disable-edit-btn"--}}{{--
                     data-did-transform="removeEdit"
                     data-did-remove="handleImageRemoval"
                     data-did-init="slimInitialised"
                     data-meta-pic-id="{{($img->img_id==1)?$img->img_id:3}}">
                    <input type="file" accept="image/jpeg, image/png"/>
                    @if($img->img_id==3)
                        <img src="{{'uploaded/pics/'.$img->filename}}" alt="">
                    @endif
                </div>
            </div>
        @endforeach

        --}}{{--@php $j=$num+1 @endphp
        @for($j;$j<=3;$j++)
            <div class="col-md-4">
                <b>Image No: {{$j}}</b>
                <div class="slim"
                     data-ratio="3:4"
                     data-service="slim/async.php"
                     data-did-init="slimInitialised"
                     data-meta-pic-id="{{$j}}">
                    <input type="file" accept="image/jpeg, image/png"/>
                </div>
            </div>
        @endfor--}}{{--
    </div>--}}

        <div class="row mt-5 mb-5">
        @php $i=1; @endphp
        @foreach($images as $img)
            <div class="col-md-4">
                <b>Image No: {{$i}}</b>
                <div class="slim" id="my-cropper-{{$i}}"
                     data-ratio="3:4"
                     data-service="slim/async.php"
                     data-meta-pic-id="{{$i}}"
                     data-button-edit-class-name="disable-edit-btn"     {{--Remove edit button from server uploaded image--}}
                     data-did-transform="removeEdit"        {{--???? Remove edit button from server uploaded image--}}
                     data-did-upload="imageUpload"
                     data-did-remove="handleImageRemovalServer"   {{--Deleting the image from user album--}}
                     data-did-init="slimInitialised"      {{--Console log on proper slim initialization--}}
                >

                    <input type="file" accept="image/jpeg, image/png"/>
                    <img src="{{'uploaded/pics/'.$img->filename}}" alt="">
                </div>
            </div>
            @php $i++ @endphp
        @endforeach

        @php $j=$num+1 @endphp
        @for($j;$j<=3;$j++)
            <div class="col-md-4">
                <b>Image No: {{$j}}</b>
                <div class="slim" id="my-cropper-{{$j}}"
                     data-ratio="3:4"
                     data-service="slim/async.php"
                     data-meta-pic-id="{{$j}}"
                     data-did-transform="logDataForTest"
                     data-did-remove="handleImageRemovalCurrent"
                     data-did-upload="imageUpload"
                     data-did-init="slimInitialised"
                >
                    <input type="file" accept="image/jpeg, image/png"/>
                </div>
            </div>
        @endfor
    </div>

        <div class="mt-5 mb-5">
        <h4>Choose your Profile pic:</h4>

        <div class="card mt-3">
            <div class="card-body">
                @php $i=1 @endphp
                @foreach($images as $image)
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline{{$i}}" name="profilePic" value="{{$image->filename}}"
                           {{($image->pp == 1)?'checked':''}} class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline{{$i}}">
                        <img src="{{'uploaded/tmb/tn_'.$image->filename}}" alt="..." width="75px" class="img-thumbnail rounded-circle">
                    </label>
                </div>
                    @php $i++ @endphp
                @endforeach
                <input class="btn btn-info btn-sm ajaxPP" id="ajaxPP" type="button" value="Submit">
                <span>
                    <img src="{{'public/images/loading.gif'}}" height="20px" width="20px" class="align-centre" style="display:none">
                </span>

            </div>
        </div>


    </div>

    @endif



@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#ajaxPP").click(function(){
                //console.log('clicked');
                var radioValue = $("input[name='profilePic']:checked").val();
                if(radioValue){
                    //console.log(radioValue);
                    alert("Your are a - " + radioValue);
                    $.ajax({
                        url:"w-ajax/change-pp.php",
                        method:'post',
                        data:{
                            name:radioValue
                        },
                        dataType:"text",
                        success:function (data, status) {
                            console.log(data);
                            console.log(status);
                        }
                    });
                }
            });
        });
    </script>

    <script src="public/js/slim.kickstart.min.js"></script>
    <script>

        /*
        * Testing Purpose. On proper initialization of slim
        * */
        function slimInitialised(data) {
            //console.log(data);
        }

        /*
        * Ajax soft deleting the image from user album
        * */
        function handleImageRemovalServer(data,error) {
            console.log(data);
            console.log(data.input.file.name);
            var divId = data.meta.picId;
            var name = data.input.file.name;
            $(document).ready(function () {
                $.ajax({
                    url:"w-ajax/del-slim-img.php",
                    method:'post',
                    data:{
                        name:name
                    },
                    dataType:"text",
                    success:function (data, status) {
                        console.log(data);
                        console.log(status);
                        console.log(divId);
                        if(status=='success'){

                            if(divId==1){
                                $("#my-cropper-1 .slim-btn-edit").removeClass('disable-edit-btn');
                            }else if(divId==2){
                                $("#my-cropper-2 .slim-btn-edit").removeClass('disable-edit-btn');
                            }else{
                                $("#my-cropper-3 .slim-btn-edit").removeClass('disable-edit-btn');
                            }
                            //$("#my-cropper-1 .slim-btn-edit").removeClass('disable-edit-btn');

                        }
                    }
                });
            });

        }

        /*
       * Ajax soft deleting the image from user album
       * */
        function handleImageRemovalCurrent(data,error) {
            console.log(data);
            console.log(data.input.file.name);


            if (!data.server) { return; }
            console.log(data.server.file);
            var name = data.server.file;
            $(document).ready(function () {
                $.ajax({
                    url: "w-ajax/del-slim-img.php",
                    method: 'post',
                    data: {
                        name: name
                    },
                    dataType: "text",
                    success: function (data, status) {
                        console.log(data);
                        console.log(status);
                    }
                });
            });

        }

        /*
        * Call back function when user uploads the image to server
        * */
        function imageUpload(error, data, response) {
            console.log(error, data, response);
            console.log(response.status);
            console.log(response.file);
            console.log(data.meta.picId);
            var divId = data.meta.picId;
            console.log(divId);
            //var myCropper = 'my-cropper-'+ divId;
            $(document).ready(function () {
                if(response.status=='success'){
                    //$('.slim-btn-edit').addClass('disable-edit-btn');
                    //var x = document.getElementById('#my-cropper-3');
                    //$('#my-cropper-3 > .button.slim-btn.slim-btn-edit').innerText('E');
                    //x.querySelector('.button.slim-btn.slim-btn-edit').addClass('disable-edit-btn');
                    //$('#my-cropper-3').addClass('disable-edit-btn');
                    //https://stackoverflow.com/questions/17417614/jquery-selector-for-class-within-id/17417635


                    if(divId==1){
                        $("#my-cropper-1 .slim-btn-edit").addClass('disable-edit-btn');
                    }else if(divId==2){
                        $("#my-cropper-2 .slim-btn-edit").addClass('disable-edit-btn');
                    }else{
                        $("#my-cropper-3 .slim-btn-edit").addClass('disable-edit-btn');
                    }

                    //$("#my-cropper-3 .slim-btn-edit").addClass('disable-edit-btn');



                }
            });


        }





        //==============================================

        function logDataForTest(data){
            //console.log(data);
            if (!data.server) { return; }
            //console.log(data.server.file);
        }


        function removeEdit(data){
            //console.log(data.actions.crop.type);
            // if(data.actions.crop.type=mann)
        }



        function imageRemoved(data) {
            console.log(data);

        }
        function handleError(error) {
            console.log(error);
        }

        function imageWillBeRemoved(data, remove) {
            if (window.confirm("Are you sure?")) {
                remove();
            }
        }



    </script>





@endsection