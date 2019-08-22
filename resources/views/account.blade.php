@extends('layouts.app')

@section('title', 'Page Title')

{{--@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

    @php
        $u = $_SESSION['username'];
    @endphp

    <div class="row justify-content-center mb-5">
        <h3 class="text-muted">Welcome: {{ $_SESSION['name'] }}</h3><br>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-5">
            <div class="form-group">
                <label for="username">Select Username:<span id="available" class="mt-1 ml-2" hidden> </span></label>
                <div class="spinner-border spinner-border-sm text-info ml-2" id="boot-spinner" hidden role="status"></div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Recipient's username" id="username" name="username"
                           value="{{ isset($_SESSION['username']) ? $_SESSION['username'] : '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary pl-4 pr-4" disabled type="submit" id="save-un">Save</button>
                    </div>

                </div>

                <br>
                <label for="basic-url">Your vanity URL</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">http://justunite.org/users/</span>
                    </div>
                    <input type="text" disabled class="form-control" id="basic-url" value="{{$_SESSION['username']}}" aria-describedby="basic-addon3">
                </div>
                {{--<br>
                <div class="alert alert-info" role="alert">
                    <b>http://www.justunite.org/</b>
                    <b id="basic-url-2">{{$_SESSION['username']}}</b>
                </div>--}}


            </div>
            <br><hr>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // ===========================================
        // Return same username
        // For displaying vanity url of specific user
        // ===========================================
        $(document).ready(function(){
            $('#username').keyup(function () {
                var username = $(this).val();
                $.ajax({
                    url:"w-ajax/return-un.php",
                    method:'POST',
                    data:{un:username},
                    dataType:"text",
                    success:function (data) {
                        $('#basic-url').val(data);
                        $('#basic-url-2').html(data);
                    }
                });
            });
        });

        // ==================================
        // Username Availability Check
        // Validating user input username
        // ==================================
        $(document).ready(function(){
            $('#username').keyup(function () {
                var username = $(this).val();
                $('#available').attr('hidden',true);
                $('#boot-spinner').attr('hidden',false);
                $.ajax({
                    url:"w-ajax/check-un.php",
                    method:'POST',
                    data:{un:username},
                    dataType:"json",
                    success:function (data) {
                        console.log(data);
                        if(data.n == 1){
                            $('#save-un').attr('disabled',false);
                        }else{
                            $('#save-un').attr('disabled',true);
                        }
                        setTimeout(function(){
                            $('#boot-spinner').attr('hidden',true);
                            $('#available').html(data.ht).attr('hidden',false);
                            // $('#available').attr('hidden',false);
                        }, 500);
                    }
                });
            });
        });

        // ==================================
        // Interaction with DB button-addon2
        // Insert into users table
        // ==================================
        $(document).ready(function () {
            $('#save-un').on('click', function () {

                var username = $('#username').val();
                $.ajax({
                    url: "w-ajax/save-un.php",
                    method: 'post',
                    data: {
                        un: username
                    },
                    dataType: "json",
                    success: function (data, status) {
                        console.log(data);
                        console.log(status);
                        if(data.i == 1){
                            $('#save-un').attr('disabled',true);
                            $('#available').html(data.ht).attr('hidden',false);
                        }else{
                            $('#save-un').attr('disabled',false);
                            $('#available').html(data.ht).attr('hidden',false);
                        }

                    }
                });
            });
        });


    </script>



@endsection