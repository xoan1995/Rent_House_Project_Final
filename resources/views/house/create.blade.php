@extends('welcome')
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
                    <textarea type="text" class="form-control"></textarea>

                </div>
            </div>
        </div>
    </div>
    <body class="bg-light">
    <div class="container">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Add a new house</h4>

            <form class="needs-validation" action="" enctype="multipart/form-data"
                  method="post" novalidate="">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">title</label>
                        <input type="text" class="form-control" id="" name="title" placeholder="" value="" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">zone</label>
                        <input type="text" class="form-control" id="" name="zone" placeholder="" value="" required="">
                        {{--                        @if($errors->has('email'))--}}
                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                        {{--                        @endif--}}
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Choose City</label>
                        <select class="custom-select d-block w-100" name="city_id" required="">
                            {{--                            @foreach($cities as $city)--}}
                            {{--                                <option value="{{$city->id}}" selected>--}}
                            {{--                                    {{$city->name}}--}}
                            {{--                                </option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="" name="price" placeholder="" value=""
                               required="">
                        {{--                        @if($errors->has('fullName'))--}}
                        {{--                            <p class="text-danger">{{$errors->first('fullName')}}</p>--}}
                        {{--                        @endif--}}
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Area</label>
                        <input type="number" class="form-control" id="" name="area" placeholder="60 m2"
                               value="" required="">
                        {{--                        @if($errors->has('email'))--}}
                        {{--                            <p class="text-danger">{{$errors->first('email')}}</p>--}}
                        {{--                        @endif--}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="review-text">Content<span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="6" name="detail" required=""></textarea>
                    <div class="invalid-feedback">Details!</div>
                    <small class="form-text text-muted">Your content must be at least 50 characters.</small>
                </div>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile"></label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                {{--                @if($errors->has('address'))--}}
                {{--                    <p class="text-danger">{{$errors->first('address')}}</p>--}}
                {{--                @endif--}}
                <div class="row">

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
    </body>
@endsection

