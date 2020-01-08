<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    input[type=checkbox] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        padding: 10px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('header-footer')

@section('content')

    @if(\Illuminate\Support\Facades\Session::has('alert'))
        <div class="alert alert-warning" role="alert">
            {{\Illuminate\Support\Facades\Session::get('alert')}}
        </div>
    @endif



    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <button id="posted" class="nav-link">My posted</button>
                </li>
                <li class="nav-item">
                    <button id="booking" class="nav-link active">My booking</button>
                </li>
                <li class="nav-item">
                    <button id="historyOneHouse" class="nav-link">History one house</button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="posted" style="display: none">
                @if(!count($houses_posted))
                    No data
                @else
                    <div class="col-12">
                        <div class="row" style="width: 100%; height: 35px; background-color: rgba(0,0,0,0.03)">
                            <div class="col-2 pt-2 pl-5">
                                <h5 style="font-family: Arial">House</h5>
                            </div>
                            <div class="col-4 col-lg-4"></div>
                            <div class="col-2 col-lg-2">
                                <h5 style="font-family: Arial;" class="text-center pt-2">Status</h5>
                            </div>
                            <div class="col-3 pt-2 text-center ">
                                <h5 style="font-family: Arial">Price</h5>
                            </div>
                        </div>
                        @foreach($houses_posted as $key => $house)
                            <div class="row mt-3">
                                <div class="col-2 col-lg-2">
                                    <img class="card-img" width="80px"
                                         src="{{asset('storage/'.$house->images[0]->path)}}"
                                         alt="...">
                                </div>
                                <div class="col-4 col-lg-4 pb-3">
                                    <div>
                                        <a style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem"
                                           data-id="{{$house->id}}"
                                           class="oneHouseHistory">{{$house->title}}</a>
                                    </div>
                                    <div>
                                        <h6>{{$house->kindHouse}} ◦ {{$house->kindRoom}}</h6>
                                    </div>
                                    <div>
                                        <p style="font-family: 'Arial Rounded MT Bold'">
                                            Address: {{$house->address}} - {{$house->district->name}}
                                            - {{$house->city->name}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <select data-id="{{$house->id}}" class="custom-select status">
                                        <option
                                            @if($house->status == \App\StatusInterface::READY)
                                            selected
                                            @endif
                                            value="{{\App\StatusInterface::READY}}">Ready
                                        </option>
                                        <option
                                            @if($house->status == \App\StatusInterface::UNREADY)
                                            selected
                                            @endif
                                            value="{{\App\StatusInterface::UNREADY}}">Unready
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3 col-lg-3 text-center">
                                    <h5>{{$house->price}}$/đêm</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="booking">
                @if(!count($houses_booking))
                    No data
                @else
                    <div class="col-12">
                        <div class="row" style="width: 100%; height: 35px; background-color: rgba(0,0,0,0.03)">
                            <div class="col-4 pt-2 pl-5">
                                <h5 style="font-family: Arial">House</h5>
                            </div>
                            <div class="col-2 col-lg-2 pt-2 text-center">
                                <h6 style="font-family: Arial">Checkin</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2  text-center">
                                <h6 style="font-family: Arial">Checkout</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2 text-center">
                                <h6 style="font-family: Arial;" class="text-center ">Status</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2">
                                <h6 style="font-family: Arial; margin-left: 25px">Price</h6>
                            </div>
                        </div>

                        @foreach($houses_booking as $key => $house)
                            <div class="row mt-3">
                                <div class="col-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="card-img" width="80px"
                                                 src="{{asset('storage/'.$house->house->images[0]->path)}}"
                                                 alt="...">
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <a href="{{route('totalHouse',$house->id)}}"
                                                   style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem;
                                                   font-weight: bold;
                                                   display: block;
                                                   width: 100%; max-lines: 2;
                                                   overflow: hidden;
                                                   white-space: nowrap;
                                                   text-overflow: ellipsis;">
                                                    {{$house->house->title}}
                                                </a>
                                            </div>
                                            <div>
                                                <h6>{{$house->house->kindHouse}} ◦ {{$house->house->kindRoom}}</h6>
                                            </div>
                                            <div>
                                                <p style="font-family: 'Arial Rounded MT Bold'">
                                                    Address: {{$house->house->address}}
                                                    - {{$house->house->district->name}}
                                                    - {{$house->house->city->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">
                                        {{$house->checkin}}
                                    </h6>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">
                                        {{$house->checkout}}
                                    </h6>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">
                                        @if($house->status == \App\StatusInterface::PENDING)
                                            Pending Request
                                        @elseif($house->status == \App\StatusInterface::READY)
                                            Ready
                                        @else
                                            Unready
                                        @endif
                                    </h6>
                                </div>
                                <div class="col-2 col-lg-2 ">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6>
                                                $ {{number_format($house->totalPrice)}}
                                            </h6>
                                        </div>
                                        <div class="col-6">
                                            @if(\Carbon\Carbon::now()->timestamp <= (\Carbon\Carbon::parse($house->checkin)->timestamp)-86400)
                                                <a type="button" data-id="{{$house->id}}" class="modalReject"
                                                   data-toggle="modal"
                                                   data-target="#staticBackdrop">
                                                    <img src="https://img.icons8.com/office/30/000000/cancel.png">
                                                </a>
                                            @else
                                                <a href="">
                                                    <img
                                                        src="https://img.icons8.com/officel/30/000000/hotel-check-in.png">
                                                </a>
                                        @endif
                                        <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                 tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                reason you declined</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" enctype="multipart/form-data"
                                                              action="{{route('user.rejectBooking')}}">
                                                            @csrf
                                                            <input style="display: none" name="houseIdBooking"
                                                                   type="text" class="houseBookingId">
                                                            <div class="modal-body">
                                                                <div>
                                                                    <div style="font-size: 1.25rem" class="pl-3">
                                                                        <input type="checkbox"
                                                                               name="reasonOne" value="Lý do cá nhân">
                                                                        &nbsp; Lý do cá nhân
                                                                    </div>

                                                                </div>
                                                                <div>
                                                                    <div style="font-size: 1.25rem" class="pl-3">
                                                                        <input type="checkbox"
                                                                               name="reasonTwo"
                                                                               value="Nhà đang sửa chữa">
                                                                        &nbsp; Nhà đang sửa chữa
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div style="font-size: 1.25rem" class="pl-3">
                                                                        <input type="checkbox"
                                                                               name="reasonThree"
                                                                               value="Khu vực đang bị động đất, sóng thần...">
                                                                        &nbsp; Khu vực đang bị động đất, sóng thần...
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div style="font-size: 1.25rem" class="pl-3">
                                                                        <input type="checkbox"
                                                                               name="reasonFour" value="other...">
                                                                        &nbsp; other...
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Send
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="historyARentalHouse" style="display: none"></div>
        </div>
    </div>


@endsection

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {
        $(".modalReject").click(function () {
            let id = $(this).data('id');
            $(".houseBookingId").val(id);
        })
    })
</script>

