<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@extends('header-footer')

@section('content')

    <div class="row">
        <p class="ml-2" style="font-size: 30px; font-weight: bold; color: #1b1e21">
            Homestay nổi bật tại {{$city->name}}
        </p>
    </div>
    <div class="mt-4">
        @if(!$houses)
            No data
        @else
            <div class="row">
                @foreach($houses as $house)
                    <div class="col-lg-3 mb-3">
                        <div class="card" style="width: 100%; height: 350px">
                            <div class="card-body" style="margin: -1.25rem">
                                <img height="200px" src="{{asset('storage/'.$house->images[0]->path)}}"
                                     class="card-img-top" alt="...">
                            </div>
                            <div class="card-footer" style="border-top: 0px; height: 150px">
                                <h6 style="padding-top: -2rem">{{$house->kindRoom}}</h6>
                                <h5 style="font-weight: bold;
                                display: block;
                                width: 100%; max-lines: 2;
                                overflow: hidden;
                                white-space: nowrap;
                                text-overflow: ellipsis;">
                                    <img src="https://img.icons8.com/plasticine/18/000000/lightning-bolt.png">
                                    <a style="color: black; font-size: 1rem;"
                                       href="{{route('totalHouse', $house->id)}}">{{$house->title}}</a>
                                </h5>
                                <h6>{{$house->numBedroom}} phòng ngủ · {{$house->numBathroom}} · phòng tắm</h6>
                                <h5 style="font-weight: bold; " class="card-title">{{$house->price}} $/Đêm</h5>
                                <h6 style="font-size: .75rem;
                                display: block;
                                width: 100%;overflow: hidden;
                                white-space: nowrap;
                                text-overflow: ellipsis; ">
                                    {{$house->address}}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
