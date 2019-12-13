@extends('formAddHouse')
@section('content')
    <div class=" container">
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
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Loại nhà</label>
                                        <select class="custom-select d-block w-100" name="kindHouse" required="">
                                            <option value="" selected style="display: none">
                                                Tùy chọn
                                            </option>
                                            <option value="{{\App\KindOfHouseInterface::APRTMENT}}">
                                                {{\App\KindOfHouseInterface::APRTMENT}}
                                            </option>
                                            <option value="{{\App\KindOfHouseInterface::CONDOTEL}}">
                                                {{\App\KindOfHouseInterface::CONDOTEL}}
                                            </option>
                                            <option value="{{\App\KindOfHouseInterface::MOTEL}}">
                                                {{\App\KindOfHouseInterface::MOTEL}}
                                            </option>
                                            <option value="{{\App\KindOfHouseInterface::ENTIREHOME}}">
                                                {{\App\KindOfHouseInterface::ENTIREHOME}}
                                            </option>
                                            <option value="{{\App\KindOfHouseInterface::VILA}}">
                                                {{\App\KindOfHouseInterface::VILA}}
                                            </option>
                                        </select>
                                        @if($errors->has('kindHouse'))
                                            <p class="text-danger">{{$errors->first('kindHouse')}}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Loại phòng</label>
                                        <select class="custom-select d-block w-100" name="kindRoom" required="">
                                            <option value="" selected style="display: none">
                                                Tùy chọn
                                            </option>
                                            <option value="{{\App\KindOfRoomInterface::SINGLE}}">
                                                {{\App\KindOfRoomInterface::SINGLE}}
                                            </option>
                                            <option value="{{\App\KindOfRoomInterface::COUPLE}}">
                                                {{\App\KindOfRoomInterface::COUPLE}}
                                            </option>
                                            <option value="{{\App\KindOfRoomInterface::FAMILY}}">
                                                {{\App\KindOfRoomInterface::FAMILY}}
                                            </option>

                                        </select>
                                        @if($errors->has('kindRoom'))
                                            <p class="text-danger">{{$errors->first('kindRoom')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Số phòng tắm</label>
                                        <input type="number" class="form-control" id="" name="numBedroom" placeholder=""
                                               value="" required="">
                                        @if($errors->has('numBedroom'))
                                            <p class="text-danger">{{$errors->first('numBedroom')}}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Số phòng ngủ</label>
                                        <input type="number" class="form-control" id="" name="numBathroom"
                                               placeholder=""
                                               value="" required="">
                                        @if($errors->has('numBathroom'))
                                            <p class="text-danger">{{$errors->first('numBathroom')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Địa chỉ</label>
                                        <input type="text" class="form-control" id="" name="address" placeholder=""
                                               value="" required="">
                                        @if($errors->has('address'))
                                            <p class="text-danger">{{$errors->first('address')}}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for=""><span class="text-danger">*</span>Thành phố</label>
                                        <select class="custom-select d-block w-100" name="city_id" required="">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" selected>
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('city_id'))
                                            <p class="text-danger">{{$errors->first('city_id')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <label for=""><span class="text-danger">*</span>Giá</label>
                                <div class="row">
                                    <div class="input-group col-md-6 mb-3">
                                        <input type="number" class="form-control" id="" name="price" placeholder=""
                                               value=""
                                               required="">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">VND</div>
                                        </div>
                                        @if($errors->has('price'))
                                            <p class="text-danger">{{$errors->first('price')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="review-text"><span class="text-danger">*</span>Miêu tả chi tiết</label>
                                    <textarea class="form-control" rows="6" name="description" required=""></textarea>
                                    <div class="invalid-feedback">Details!</div>
                                    @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Tiếp tục</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

