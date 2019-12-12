@extends('header-footer')
@section('title')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-3">Đăng nhà</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12 order-md-1">
                            <form class="needs-validation" action="{{route('storeHouse')}}"
                                  method="post" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label for=""><span class="text-danger">*</span>Tiêu đề</label>
                                        <input type="text" class="form-control" id="" name="title" placeholder=""
                                               value="" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Loại nhà</label>
                                        <input type="text" class="form-control" id="" name="kindHouse" placeholder=""
                                               value="" required="">
                                        {{--                        @if($errors->has('email'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Loại phòng</label>
                                        <input type="text" class="form-control" id="" name="kindRoom" placeholder=""
                                               value="" required="">
                                        {{--                        @if($errors->has('email'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Số phòng tắm</label>
                                        <input type="number" class="form-control" id="" name="numBedroom" placeholder=""
                                               value="" required="">
                                        {{--                        @if($errors->has('email'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Số phòng ngủ</label>
                                        <input type="number" class="form-control" id="" name="numBathroom"
                                               placeholder=""
                                               value="" required="">
                                        {{--                        @if($errors->has('email'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Địa chỉ</label>
                                        <input type="text" class="form-control" id="" name="address" placeholder=""
                                               value="" required="">
                                        {{--                        @if($errors->has('email'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('phone')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Choose City</label>
                                        <select class="custom-select d-block w-100" name="city_id" required="">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" selected>
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Price</label>
                                        <input type="number" class="form-control" id="" name="price" placeholder=""
                                               value=""
                                               required=""><span class="text-danger">*</span>VND
                                        {{--                        @if($errors->has('fullName'))--}}
                                        {{--                            <p class="text-danger">{{$errors->first('fullName')}}</p>--}}
                                        {{--                        @endif--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="review-text"><span class="text-danger">*</span>Miêu tả chi tiết</label>
                                    <textarea class="form-control" rows="6" name="description" required=""></textarea>
                                    <div class="invalid-feedback">Details!</div>
                                    <small class="form-text text-muted">Your content must be at least 50
                                        characters.</small>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

