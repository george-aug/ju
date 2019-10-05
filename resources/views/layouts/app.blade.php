<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">

    @yield('style')

    <!-- Google Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>@yield('title')</title>
</head>
<body>
@include('layouts.partials.nav')
<div class="container mt-5">
    @yield('content')
</div>

<!-- Optional JavaScript -->
@yield('pswipe')

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Optional JavaScript -->
@yield('script')
<script>
    //================================
    // Logout Process through
    // Ajax Request
    //================================
    $(document).ready(function(){
        $('#logoutClk').on('click',function () {
            $.ajax({
                url:"w-ajax/logout.php",
                method:'post',
                data:{},
                dataType:"text",
                success:function (data, status) {
                    console.log(data);
                    console.log(status);
                    window.location.href = "index.php";
                }
            });
        });
    });

    $(document).ready(function(){
        $('.ajaxCP').on('click',function () {
            var pid = $(this).data('id');
            var pno = $(this).data('no');

            $.ajax({
                url:"chg-profile.php",
                method:'post',
                data:{
                    pid:$(this).data('id'),
                    pno:$(this).data('no'),
                    gen:$(this).data('gen')
                },
                dataType:"text",
                success:function (data, status) {
                    console.log(data);
                    console.log(status);
                    window.location.href = "my-profile.php";

                }
            });
        });
    });

    $(document).ready(function () {
        $('.alert').on('close.bs.alert', function () {
            $.ajax({
                url:"w-ajax/unset-session.php",
                method:'POST',
                dataType:"text",
                success:function (data,status) {
                    console.log(status)
                }
            });
        });
    })
</script>

</body>
</html>
