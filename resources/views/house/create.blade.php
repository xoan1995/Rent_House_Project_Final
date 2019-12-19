@extends('header-footer')
@section('content')

    <div class="container center">
        <div class="card">
            <h5 class="card-header">Add House</h5>
            <div class="card-body">
                <form action="{{route('storeHouse')}}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="title"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('title'))
                                        <i class="text-danger">{{$errors->first('title')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price<span class="text-danger">*</span></label>
                                <div class="col-sm-9">

                                    <input type="number" @if($errors->has('price')) style="border:solid 1px red @endif"
                                           class="form-control text-info" id="" name="price"
                                           placeholder="$"
                                           value="">
                                    @if($errors->has('price'))
                                        <i class="text-danger">{{$errors->first('price')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kind House
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">

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
                                    @if($errors->has('kindHouse'))
                                        <i class="text-danger">{{$errors->first('kindHouse')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kind Room
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
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
                                    @if($errors->has('kindRoom'))
                                        <i class="text-danger">{{$errors->first('kindRoom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number bedroom
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">

                                    <input type="number" class="form-control" id="" name="numBedroom"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('numBedroom'))
                                        <i class="text-danger">{{$errors->first('numBedroom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number bathroom
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control " id="" name="numBathroom"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('numBathroom'))
                                        <i class="text-danger">{{$errors->first('numBathroom')}}</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City<span class="text-danger">*</span></label>
                                <div class="col-sm-10">

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
                                    @if($errors->has('city_id'))
                                        <i class="text-danger">{{$errors->first('city_id')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">District<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                        <select class="form-control" name="district_id">
                                            <option value="" selected>
                                                Select
                                            </option>
                                            <option value="" selected style=" display: none">
                                                Select
                                            </option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">
                                                    {{$district->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    @if($errors->has('district_id'))
                                        <i class="text-danger">{{$errors->first('district_id')}}</i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="" name="address"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('address'))
                                        <i class="text-danger">{{$errors->first('address')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descript<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                        <div class="invalid-feedback">Details!</div>
                                    @if($errors->has('description'))
                                        <i class="text-danger">{{$errors->first('description')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="col-sm-2 col-form-label">Image<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" multiple class="custom-file-input" name="images[]" id="inputGroupFile04" required>
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" style="text-align: right; margin-left: 45%"
                                    class="btn btn-primary mt-4">Submit
                            </button>
                            <a href="/" style="text-align: right" class="btn btn-danger mt-4">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector: 'textarea'});</script>
