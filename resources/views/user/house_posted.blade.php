<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@extends('header-footer')

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <button id="posted" class="nav-link active">My posted</button>
                </li>
                <li class="nav-item">
                    <button id="booking" class="nav-link">My booking</button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="posted">
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
                                        <a href="{{route('totalHouse',$house->id)}}"
                                           style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem">{{$house->title}}</a>
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
                                    <h5>
                                        @foreach($house->orders as $item)
                                            @if(\Carbon\Carbon::parse($item->checkin)->timestamp <= time() && \Carbon\Carbon::parse($item->checkout)->timestamp >=time())
                                                @if($item->status == \App\StatusInterface::PENDING)
                                                    Pending Request
                                                @else
                                                    Are Rented
                                                @endif
                                            @endif
                                        @endforeach
                                    </h5>
                                </div>
                                <div class="col-3 col-lg-3 text-center">
                                    <h5 >{{$house->price}}$/đêm</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="booking" style="display: none">
                @if(!count($houses_booking))
                    No data
                @else
                    <div class="col-12">
                        <div class="row" style="width: 100%; height: 35px; background-color: rgba(0,0,0,0.03)">
                            <div class="col-4 pt-2 pl-5">
                                <h5 style="font-family: Arial">House</h5>
                            </div>
                            <div class="col-2 col-lg-2 pt-2">
                                <h5 style="font-family: Arial">Checkin</h5>
                            </div>
                            <div class="col-2 col-lg-2 pt-2">
                                <h5 style="font-family: Arial">Checkout</h5>
                            </div>
                            <div class="col-2 col-lg-2 pt-2">
                                <h5 style="font-family: Arial;" class="text-center ">Status</h5>
                            </div>
                            <div class="col-2 pt-2 text-center ">
                                <h5 style="font-family: Arial">Price</h5>
                            </div>
                        </div>
                        @foreach($houses_booking as $key => $house)
                            <div class="row mt-3">
                                <div class="col-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="card-img" width="80px"
                                                 src="{{asset('storage/'.$house->images[0]->path)}}"
                                                 alt="...">
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <a href="{{route('totalHouse',$house->id)}}"
                                                   style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem">{{$house->title}}</a>
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
                                    </div>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h5>

                                    </h5>
                                </div>
                                <div class="col-3 col-lg-3 text-center">
                                    <h5 ></h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
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
