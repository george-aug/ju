<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{'index.php'}}">
            <img src="public/images/bootstrap-solid.svg" width="30" height="30" alt="">
            <b class="text-info">Just Unite</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Matrimony
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{'dashboard.php'}}">Dashboard</a>
                        <a class="dropdown-item" href="{{'my-profile.php'}}">My profile</a>
                        <a class="dropdown-item" href="{{'new-search.php'}}">Search</a>
                        <a class="dropdown-item" href="{{'album.php'}}">Album</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{'referral.php'}}">Referral</a>
                        <a class="dropdown-item" href="{{'matrimony.php'}}">Matrimony</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Links
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Blog</a>
                        <a class="dropdown-item" href="#">Video</a>
                        <a class="dropdown-item" href="{{'parties.php'}}">Parties</a>
                        <a class="dropdown-item" href="{{'problems.php'}}">Problems</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Facebook</a>
                        <a class="dropdown-item" href="#">Twitter</a>
                    </div>
                </li>
                {{--@if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true)
                    @if(!empty($_SESSION['matri_profiles']))
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{'matrimony.php'}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b>Matrimony</b><span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($_SESSION['matri_profiles'] as $profile)
                                --}}{{--<a class="dropdown-item" href="{{"profile.php?id=$profile->pno"}}">{{$profile->first_name.' '}}--}}{{--
                                --}}{{--    <b class="text-warning">{{$profile->pno}}</b>--}}{{--
                                --}}{{--</a>--}}{{--

                                <a class="dropdown-item ajaxCP {{($profile->pno==$_SESSION['mno'])?'active':''}}" href="#"
                                   data-id="{{$profile->id}}"
                                   data-no="{{$profile->pno}}"
                                   data-gen="{{$profile->gender}}">{{$profile->first_name.' '}}
                                    <b class="text-warning">{{$profile->pno}}</b>
                                    --}}{{--<img src="{{'public/images/correct-symbol.svg'}}" height="16px" width="16px">--}}{{--
                                </a>

                            @endforeach
                            @if(isset($_SESSION['mno']))
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{'matrimony.php'}}">Start Page</a>
                            @endif
                        </div>
                    </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{'matrimony.php'}}"><b>Matrimony</b></a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{'profiles2.php'}}"><b>Profiles</b></a>
                </li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
                {{--</li>--}}
            </ul>


            @if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true)
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$_SESSION['name']}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{'welcome.php'}}">Welcome</a>
                            <a class="dropdown-item" href="{{'account.php'}}">Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="logoutClk" href="#">Logout</a>
                        </div>
                    </li>
                    <li>
                        <div class="inset">
                            <img src="http://rs775.pbsrc.com/albums/yy35/PhoenyxStar/link-1.jpg~c200">
                        </div>
                    </li>
                </ul>
            @else
                <a role="button" href="{{'signup.php'}}" class="btn btn-outline-info my-2 my-sm-0 mr-2">Register</a>
                <a role="button" href="{{'login.php'}}" class="btn btn-outline-success my-2 my-sm-0">Login</a>
            @endif
        </div>
    </nav>
</div>