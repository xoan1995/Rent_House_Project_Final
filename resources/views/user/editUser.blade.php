@extends('home')
@section('title')
@section('content')
    <div class="container">
        <div class="col-12">
                <script>
                    function myFunction() {
                        var x = document.getElementById("myInput");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">

                        Password: <input type="password" class="form-control" value="FakePSW" id="myInput"><br><br>
                        <input type="checkbox" onclick="myFunction()">Show Password

                    </div>
                </div>
        </div>
    </div>
@endsection
