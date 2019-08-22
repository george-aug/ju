@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Signup Form</h3>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-4">

            @include('layouts.partials.alert')

            <form action="{{'signup3.php'}}" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="name">Name:<span id="msg-1" class="mt-1 ml-2" hidden> </span></label>
                    <div class="spinner-border spinner-border-sm text-info ml-2" id="spinner-1" hidden role="status"></div>
                    <input class="form-control" id="name" name="name" placeholder="Your Name" type="text" required
                           value="{{ isset($_GET['name']) ? $_GET['name'] : ''  }}">
                </div>

                <div class="form-group">
                    <label for="email">Email:<span id="msg-2" class="mt-1 ml-2" hidden> </span></label>
                    <div class="spinner-border spinner-border-sm text-info ml-2" id="spinner-2" hidden role="status"></div>
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required
                           value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}">
                </div>

                <div class="form-group">
                    <label for="mobile">Mobile:<span id="msg-3" class="mt-1 ml-2" hidden> </span></label>
                    <div class="spinner-border spinner-border-sm text-info ml-2" id="spinner-3" hidden role="status"></div>
                    <input class="form-control" id="mobile" name="mobile" placeholder="Mobile(10 digits)" type="text" required
                           value="{{ isset($_GET['mobile']) ? $_GET['mobile'] : '' }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:<span id="msg-4" class="mt-1 ml-2" hidden> </span></label>
                    <div class="spinner-border spinner-border-sm text-info ml-2" id="spinner-4" hidden role="status"></div>
                    <input class="form-control" id="password" name="password" placeholder="New Password" type="password" required
                           value="" autocomplete="new-password">
                </div>

                {{--<div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password"
                           type="password" value="">
                </div>--}}

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" disabled id="btn-signup" name="signup-submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            // ==================================
            // Name validation
            // Validating user input name
            // ==================================
            $('#name').blur(function () {
                var name = $(this).val();
                $('#msg-1').attr('hidden',true);
                $('#spinner-1').attr('hidden',false);
                $.ajax({
                    url:"w-ajax/check-nm.php",
                    method:'POST',
                    data:{nm:name},
                    dataType:"json",
                    success:function (data) {
                        console.log(data);
                        if(data.n == 1){
                            $('#btn-signup').attr('disabled',false);
                        }else{
                            $('#btn-signup').attr('disabled',true);
                        }
                        setTimeout(function(){
                            $('#spinner-1').attr('hidden',true);
                            $('#msg-1').html(data.ht).attr('hidden',false);
                        }, 500);
                    }
                });
            });

            // ==================================
            // Email validation
            // Validating user input email
            // ==================================
            $('#email').blur(function () {
                var email = $(this).val();
                $('#msg-2').attr('hidden',true);
                $('#spinner-2').attr('hidden',false);
                $.ajax({
                    url:"w-ajax/check-em.php",
                    method:'POST',
                    data:{em:email},
                    dataType:"json",
                    success:function (data) {
                        console.log(data);
                        if(data.n == 1){
                            $('#btn-signup').attr('disabled',false);
                        }else{
                            $('#btn-signup').attr('disabled',true);
                        }
                        setTimeout(function(){
                            $('#spinner-2').attr('hidden',true);
                            $('#msg-2').html(data.ht).attr('hidden',false);
                        }, 500);
                    }
                });
            });

            $('#mobile').blur(function () {
                var mobile = $(this).val();
                $('#msg-3').attr('hidden',true);
                $('#spinner-3').attr('hidden',false);
                $.ajax({
                    url:"w-ajax/check-mb.php",
                    method:'POST',
                    data:{mb:mobile},
                    dataType:"json",
                    success:function (data) {
                        console.log(data);
                        if(data.n == 1){
                            $('#btn-signup').attr('disabled',false);
                        }else{
                            $('#btn-signup').attr('disabled',true);
                        }
                        setTimeout(function(){
                            $('#spinner-3').attr('hidden',true);
                            $('#msg-3').html(data.ht).attr('hidden',false);
                        }, 500);
                    }
                });
            });

            // ==================================
            // Password validation
            // Validating user input password
            // ==================================
            $('#password').keyup(function () {
                var password = $(this).val();
                $('#msg-4').attr('hidden',true);
                $('#spinner-4').attr('hidden',false);
                $.ajax({
                    url:"w-ajax/check-pw.php",
                    method:'POST',
                    data:{pw:password},
                    dataType:"json",
                    success:function (data) {
                        console.log(data);
                        if(data.n == 1){
                            $('#btn-signup').attr('disabled',false);
                        }else{
                            $('#btn-signup').attr('disabled',true);
                        }
                        setTimeout(function(){
                            $('#spinner-4').attr('hidden',true);
                            $('#msg-4').html(data.ht).attr('hidden',false);
                        }, 500);
                    }
                });
            });


        });
    </script>

@endsection