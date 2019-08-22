@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <br><br>
    <input type="hidden" id="pid" value="7">
    <input class="btn btn-info btn-sm ajaxSI" id="send-interest" type="button" value="Initiate">


@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.ajaxSI').on('click',function () {
                $.ajax({
                    url:"send-interest.php",
                    method:'post',
                    data:{
                        pid:$("#pid").val(),
                    },
                    dataType:"text",
                    success:function (data, status) {
                        console.log(data);
                        console.log(status);

                    }
                })
            })

        })

    </script>
@endsection