@extends('layouts.admin')

@section('title', 'Page Title')

{{--@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection--}}

@section('content')

<div class="container">

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary d-flex justify-content-end" data-toggle="modal" data-target="#exampleModal">
            Create User
        </button>
    </div>

    <h2>Profile List {{'Total: '.$num}}</h2>
    <table class="table table-bordered mb-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">S No.</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td><a href="user.php?un={{$user->username}}">{{$user->username}}</a></td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter some password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addRecord()">Save User</button>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-3 mb-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{($pno<=1)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $pages; $i++)
                <li class="page-item {{($pno==$i)?'active':''}} "><a class="page-link" href="{{'?pno='.$i}}">{{$i}}</a></li>
            @endfor
            <li class="page-item  {{($pno>=$pages)?'disabled':''}}"><a class="page-link" href="{{'?pno='.($pno+1)}}">Next</a></li>
        </ul>
    </nav>
</div>

</div>

@endsection

@section('script')
    <script type="text/javascript">

            function addRecord() {
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    url:"users.php",
                    method:'post',
                    data:{
                        name:name,
                        email:email,
                        password:password
                    },
                    success:function (data, status) {
                        console.log(status);

                    }
                })
            }


    </script>

@endsection

