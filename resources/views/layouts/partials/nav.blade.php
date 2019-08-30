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
                @if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true)
                    @if(!empty($_SESSION['matri_profiles']))
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{'matrimony.php'}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b>Matrimony</b><span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($_SESSION['matri_profiles'] as $profile)
                                {{--<a class="dropdown-item" href="{{"profile.php?id=$profile->pno"}}">{{$profile->first_name.' '}}--}}
                                {{--    <b class="text-warning">{{$profile->pno}}</b>--}}
                                {{--</a>--}}

                                <a class="dropdown-item ajaxCP {{($profile->pno==$_SESSION['mno'])?'active':''}}" href="#"
                                   data-id="{{$profile->id}}"
                                   data-no="{{$profile->pno}}"
                                   data-gen="{{$profile->gender}}">{{$profile->first_name.' '}}
                                    <b class="text-warning">{{$profile->pno}}</b>
                                    {{--<img src="{{'public/images/correct-symbol.svg'}}" height="16px" width="16px">--}}
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
                </li>
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
                {{--</li>--}}
            </ul>
            @if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true)
                <a class="nav-link" href="#"><b>{{$_SESSION["email"]}}</b></a>
            {{--<ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>--}}
                <form action="logout.php" method="post" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-danger my-2 my-sm-0" name="logout-submit" type="submit">Logout</button>
                </form>
            @else
                <a role="button" href="{{'signup3.php'}}" class="btn btn-outline-info my-2 my-sm-0 mr-2">Register</a>
                <a role="button" href="{{'login.php'}}" class="btn btn-outline-success my-2 my-sm-0">Login</a>
            @endif


        </div>
    </nav>
</div>