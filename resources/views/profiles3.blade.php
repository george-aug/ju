@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.css" integrity="sha256-SBLU4vv6CA6lHsZ1XyTdhyjJxCjPif/TRkjnsyGAGnE=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.css" integrity="sha256-c0uckgykQ9v5k+IqViZOZKc47Jn7KQil4/MP3ySA3F8=" crossorigin="anonymous" />
@endsection


@section('content')

    <div class="mt-5 mb-5">
        <h2>Profile List: <i class="text-muted">{{count($profiles)}}</i></h2>
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
                    <td class="w-5">{{$profile['id']}}</td>
                    <td class="w-20"><a href="profile.php?id={{$profile['pno']}}">{{$profile['pno']}}</a></td>

                    {{--<td class="w-10">{!!($profile['photo']==1)?'<a href="#"><i class="material-icons md-dark">photo_library</i></a>':
                    '<i class="material-icons md-dark md-inactive">photo_camera</i>'!!}</td>--}}
                    <td class="w-10">
                        @if(!isset($profile['pics']))
                            <img src="{{'public/images/default-128.png'}}" alt="..." width="50px" class="rounded">
                        @else

                            <!-- Galley wrapper that contains all items -->
                            <div id="{{'gallery'.$profile['id']}}" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
                            @foreach($profile['pics'] as $pic)
                                {{--<img src="{{'uploaded/tmb/tn_'.$pic['fn']}}" alt="..." width="50px" class="rounded">--}}

                                <!-- Use figure for a more semantic html -->
                                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                                    <a href="{{'uploaded/pics/'.$pic['fn']}}" data-id="{{$profile['id']}}" class="ju-album"  data-caption="Sea side, south shore<br><em class='text-muted'>© Dominik Schröder</em>" data-width="900" data-height="1200" itemprop="contentUrl">
                                        <!-- Thumbnail -->
                                        <img src="{{'uploaded/tmb/tn_'.$pic['fn']}}" alt="..." width="50px" class="rounded" {{($pic['pp']!=1)?'hidden':''}}>
                                    </a>
                                </figure>
                            @endforeach
                            </div>
                        @endif
                    </td>
                    <td class="w-20">{{$profile['first_name'].' '.$profile['last_name']}}</td>
                    <td class="w-10">{{($profile['gender']==1) ? 'Male':'Female' }}</td>
                    <td class="w-10">{{\Carbon\Carbon::parse($profile['dob'])->age}}</td>
                    {{--<td><a href=""><i class="material-icons red34">favorite</i></a></td>--}}
                    <td class="w-15">
                        {{--<form action="{{'blank.php'}}" method="post">
                            <input class="btn btn-info btn-sm" type="submit" value="Initiate">
                        </form>--}}
                        {{--<input type="hidden" id="pid" value="{{$profile->id}}">--}}
                        <input class="btn btn-info btn-sm ajaxSI" {{in_array($profile['id'], $connArr)?'disabled':''}}
                        id="{{'btn'.$profile['id']}}" data-id="{{$profile['id']}}" type="button" value="{{in_array($profile['id'], $connArr)?'Sent':'Initiate'}}">
                        <span>
                            <img src="{{'public/images/loading.gif'}}" id="{{'loader'.$profile['id']}}" height="20px" width="20px" class="align-centre" style="display:none">
                        </span>
                    </td>
                    <td class="w-5">
                        <a href="#" onclick="{{isset($_SESSION['logged-in'])?"preventClick(event)":"loginPage(event)"}}" class="btn ajaxFav p-0 {{in_array($profile['id'], $favArr)?'disabled':''}}"
                           id="{{'fav'.$profile['id']}}" data-id="{{$profile['id']}}">
                            <i class="material-icons md-dark">favorite</i>
                        </a>
                        <span><img src="{{'public/images/loading.gif'}}" id="{{'favLoader'.$profile['id']}}" height="20px" width="20px" class="align-centre" style="display:none"></span>
                    </td>
                    <td class="w-5">

                        <a href="#" onclick="preventClick(event)" class="btn ajaxHide p-0 {{in_array($profile['id'], $hideArr)?'disabled':''}}"
                           id="{{'hide'.$profile['id']}}" data-id="{{$profile['id']}}">
                            <i class="material-icons red34">visibility_off</i>
                        </a>
                        <span><img src="{{'public/images/loading.gif'}}" id="{{'hideLoader'.$profile['id']}}" height="20px" width="20px" class="align-centre" style="display:none"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe.
                 It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides.
                      PhotoSwipe keeps only 3 of them in the DOM to save memory.
                      Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pswipe')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    {{--Pswipe Area--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js" integrity="sha256-ePwmChbbvXbsO02lbM3HoHbSHTHFAeChekF1xKJdleo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js" integrity="sha256-UKkzOn/w1mBxRmLLGrSeyB4e1xbrp4xylgAWb3M42pU=" crossorigin="anonymous"></script>
    <script>
        'use strict';

        /* global jQuery, PhotoSwipe, PhotoSwipeUI_Default, console */

        (function($) {

            // Define click event on gallery item
            $('.ju-album').click(function(event) {

                // Init empty gallery array
                var container = [];
                var eid = $(this).data('id');

                // Prevent location change
                event.preventDefault();

                // Loop over gallery items and push it to the array
                $('#gallery'+eid).find('figure').each(function() {
                    var $link = $(this).find('a'),
                        item = {
                            src: $link.attr('href'),
                            w: $link.data('width'),
                            h: $link.data('height'),
                            title: $link.data('caption')
                        };

                    container.push(item);
                });

                // Prevent location change
                event.preventDefault();

                // Define object and gallery options
                var $pswp = $('.pswp')[0],
                    options = {
                        index: $(this).parent('figure').index(),
                        bgOpacity: 0.85,
                        showHideOpacity: true
                    };

                // Initialize PhotoSwipe
                var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
                gallery.init();
            });

        }(jQuery));
    </script>

    {{--General Ajax Call code--}}
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