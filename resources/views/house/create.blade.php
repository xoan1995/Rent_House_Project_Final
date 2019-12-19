@extends('header-footer')
@section('content')

    <div class="container center">
        <div class="card">
            <h5 class="card-header">Add House</h5>
            <div class="card-body">
                <form action="{{route('storeHouse')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('title'))
                                        <input type="text" class="form-control" id="" name="title"
                                               placeholder=""
                                               value="">
                                    @else
                                        <input type="text" class="form-control border-danger"
                                               name="title"
                                               placeholder=""
                                               value="">
                                        <i class="text-danger">{{$errors->first('title')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Price<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('price'))
                                        <input type="number" class="form-control text-info" id="" name="price"
                                               placeholder="$"
                                               value=""
                                        >
                                    @else
                                        <input type="number" class="form-control border-danger" id="" name="price"
                                               placeholder="$"
                                               value=""
                                        ><i class="text-danger">{{$errors->first('price')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kind House<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('kindHouse'))
                                        <select name="kindHouse" class="form-control ">
                                            <option value="" selected style="display: none">
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
                                    @else
                                        <select name="kindHouse" class="form-control border-danger">
                                            <option value="" selected style="display: none">
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
                                        <i class="text-danger">{{$errors->first('kindHouse')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kind Room<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('kindRoom'))
                                        <select class="form-control" name="kindRoom">
                                            <option value="" selected style="display: none">
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
                                    @else
                                        <select class="form-control border-danger" name="kindRoom">
                                            <option value="" selected style="display: none">
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
                                        <i class="text-danger">{{$errors->first('kindRoom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Number bedroom</label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('numBedroom'))
                                        <input type="number" class="form-control" id="" name="numBedroom"
                                               placeholder=""
                                               value="">
                                    @else
                                        <input type="number" class="form-control border-danger" id="" name="numBedroom"
                                               placeholder=""
                                               value="">
                                        <i class="text-danger">{{$errors->first('numBedroom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Number bathroom</label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('numBathroom'))
                                        <input type="number" class="form-control " id="" name="numBathroom"
                                               placeholder=""
                                               value="">
                                    @else
                                        <input type="number" class="form-control  border-danger" id="" name="numBathroom"
                                               placeholder=""
                                               value="">
                                        <i class="text-danger">{{$errors->first('numBathroom')}}</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('city_id'))
                                        <select class="form-control" name="city_id">
                                            <option value="" selected style=" display: none">
                                                Select
                                            </option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control border-danger" name="city_id">
                                            <option value="" selected style="display: none">
                                                Select
                                            </option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                                <i class="text-danger">{{$errors->first('city_id')}}</i>
                                            @endforeach
                                        </select>
                                        <i class="text-danger">{{$errors->first('city_id')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">District<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('district'))
                                        <select class="form-control" name="district_id">
                                            {{--                                        <option value="" selected style=" display: none">--}}
                                            {{--                                            Select--}}
                                            {{--                                        </option>--}}
                                            {{--                                            @foreach($districts as $district)--}}
                                            {{--                                                <option value="{{$district->id}}">--}}
                                            {{--                                                    {{$district->name}}--}}
                                            {{--                                                </option>--}}
                                            {{--                                            @endforeach--}}
                                        </select>
                                    @else
                                        <select class="form-control border-danger" name="district_id">
                                            <option value="" selected style="display: none">
                                                Select
                                            </option>
                                            {{--                                        @foreach($districts as $district)--}}
                                            {{--                                            <option value="{{$district->id}}">--}}
                                            {{--                                                {{$district->name}}--}}
                                            {{--                                            </option>--}}
                                            {{--                                            <i class="text-danger">{{$errors->first('city_id')}}</i>--}}
                                            {{--                                        @endforeach--}}
                                        </select>
                                        <i class="text-danger">{{$errors->first('city_id')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descript<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    @if(!$errors->has('description'))
                                        <textarea class="form-control" rows="6" name="description"></textarea>
                                        <div class="invalid-feedback">Details!</div>
                                    @else
                                        <textarea class="form-control text-info" rows="6" name="description">
                                        </textarea>
                                        <div class="invalid-feedback">Details!</div>
                                        <i class="text-danger">{{$errors->first('description')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="col-sm-2 col-form-label">Image<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="custom-file-input" name="file" id="inputGroupFile04" required>
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" style="text-align: right; margin-left: 45%" class="btn btn-primary mt-4">Submit</button>
                            <a href="/" style="text-align: right" class="btn btn-danger mt-4">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



