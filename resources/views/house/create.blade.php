@extends('welcome')
@section('title')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-3">Add a new house</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12 order-md-1">
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
                                    <label class="custom-file-label" for="validatedCustomFile">
                                    </label>
                                </div>
                                {{--                @if($errors->has('address'))--}}
                                {{--                    <p class="text-danger">{{$errors->first('address')}}</p>--}}
                                {{--                @endif--}}
                                <div class="row">
                                    <div class="border-box igui-filter-checkbox">
                                        <div class="mb10 s-clearfix">
                                            <input class="mr5 igui-filter-f-left" id="useSingleRequestCheck" type="checkbox" />
                                            <label class="ml5 igui-filter-f-right mt4" for="useSingleRequestCheck">Use a Single Request for Uploading Multiple Files</label>
                                        </div>
                                    </div>

                                    <div id="igUpload1"></div>
                                    <div id="error-message" style="color: #FF0000; font-weight: bold;"></div>
                                </div>
                                <div class="row">

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
                                </div>
                            </form>

                            <script>
                                $(function () {
                                    var buttonLabel = $.ig.Upload.locale.labelUploadButton;
                                    if (Modernizr.input.multiple) {
                                        buttonLabel = "Drag and Drop Files Here <br/> or Click to Select From a Dialog";
                                    }
                                    $("#igUpload1").igUpload({
                                        mode: 'multiple',
                                        multipleFiles: true,
                                        maxUploadedFiles: 5,
                                        maxSimultaneousFilesUploads: 2,
                                        progressUrl: "https://www.igniteui.com/IGUploadStatusHandler.ashx",
                                        controlId: "serverID1",
                                        labelUploadButton: buttonLabel,
                                        onError: function (e, args) {
                                            showAlert(args);
                                        }
                                    });
                                    if (Modernizr.input.multiple) {
                                        $(".ui-igstartupbrowsebutton").attr("style", "width: 320px; height: 80px;");
                                    }
                                    $("#useSingleRequestCheck").igCheckboxEditor({
                                        checked: false,
                                        valueChanged: function (evt, ui) {
                                            $("#igUpload1").igUpload("option", "useSingleRequest", ui.newState);
                                        }
                                    });
                                });

                                function showAlert(args) {
                                    $("#error-message").html(args.errorMessage).stop(true, true).fadeIn(500).delay(3000).fadeOut(500);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

