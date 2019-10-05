@extends('layouts.app')

@section('title', 'Page Title')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.css" integrity="sha256-SBLU4vv6CA6lHsZ1XyTdhyjJxCjPif/TRkjnsyGAGnE=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.css" integrity="sha256-c0uckgykQ9v5k+IqViZOZKc47Jn7KQil4/MP3ySA3F8=" crossorigin="anonymous" />
    <style>

        h1 {margin: 2em;}
        .pswp__caption__center {text-align: center;}
        figure {
            display: inline-block;
            width: 33.333%;
            float: left;
        }
        .ju-img {width: 100%;}
        .spacer {height: 5em;}
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <h1 class="text-center">
                Ajay<br>
            </h1>

            <!-- Galley wrapper that contains all items -->
            <div id="gallery1" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">

                @foreach($images as $image)
                <!-- Use figure for a more semantic html -->
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                    <a href="{{'public/uploads/users/'.$image->img}}" class="ju-album" data-id="1"  data-caption="Sea side, south shore<br><em class='text-muted'>© Dominik Schröder</em>" data-width="600" data-height="800" itemprop="contentUrl">
                        <!-- Thumbnail -->
                        <img src="{{'public/uploads/users/'.$image->img}}" class="ju-img"  itemprop="thumbnail" alt="Image description" hidden>
                    </a>
                </figure>
               @endforeach
            </div>

            <br><br>
            <h1 class="text-center">
                Album 1<br>
            </h1>

            <!-- Galley wrapper that contains all items -->
            <div id="gallery1" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <!-- Use figure for a more semantic html -->
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                    <a href="https://unsplash.it/1200/900/?image=702" class="ju-album" data-id="1"  data-caption="Sea side, south shore<br><em class='text-muted'>© Dominik Schröder</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <!-- Thumbnail -->
                        <img src="https://unsplash.it/400/300/?image=702" class="ju-img"  itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="https://unsplash.it/1200/900/?image=695" class="ju-album"  data-id="1" data-caption="Sunset in the wheat field<br><em class='text-muted'>© Jordan McQueen</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <img src="https://unsplash.it/400/300/?image=695" class="ju-img" itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="https://unsplash.it/1200/900/?image=675" class="ju-album"  data-id="1" data-caption="Mysterious ocean<br><em class='text-muted'>© Barn Images</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <img src="https://unsplash.it/400/300/?image=675" class="ju-img" itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
            </div>

            <br><br>
            <h1 class="text-center">
                Album2<br>
            </h1>
            <!-- Galley wrapper that contains all items -->
            <div id="gallery2" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">

                <!-- Use figure for a more semantic html -->
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <!-- Link to the big image, not mandatory, but usefull when there is no JS -->
                    <a href="https://picsum.photos/id/102/4320/3240" class="ju-album"  data-id="2"  data-caption="Sea side, south shore<br><em class='text-muted'>© Dominik Schröder</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <!-- Thumbnail --><!--https://picsum.photos/id/102/4320/3240-->
                        <img src="https://picsum.photos/id/102/4320/3240" class="ju-img" itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="https://unsplash.it/1200/900/?image=509" class="ju-album"  data-id="2" data-caption="Seljalandsfoss waterfall<br><em class='text-muted'>© Jeff Sheldon</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <img src="https://unsplash.it/400/300/?image=509" class="ju-img" itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="https://unsplash.it/1200/900/?image=511" class="ju-album"  data-id="2" data-caption="Fjadrarglufur canyon, south shore<br><em class='text-muted'>© Jeff Sheldon</em>" data-width="1200" data-height="900" itemprop="contentUrl">
                        <img src="https://unsplash.it/400/300/?image=511" class="ju-img" itemprop="thumbnail" alt="Image description">
                    </a>
                </figure>
            </div>
        </div>
    </div>

    <!-- Some spacing 😉 -->
    <div class="spacer"></div>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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

@endsection
