@extends('welcome')
@section('title')
@section('content')
    <div class="container">
        <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        Chỉnh sửa thông tin đăng nhập
                    </div>
                    <div class="card-body">

                        Password: <input type="password" class="form-control" name="password" data-toggle="password" id="myInput"><br><br>


                    </div>
                </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#password').password();
    </script>
@endsection
