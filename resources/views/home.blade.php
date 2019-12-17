@extends('homeHeader')
@section('body')

    {{dd($user)}}
    <div class="mt-5">
        <div style="font-size: 30px; font-weight: bold; color: #1b1e21">Top Chỗ ở hot 10000 độ</div>
        <div>Khám phá chỗ ở nổi tiếng đã xuất hiện trong các bộ phim & MV</div>
        <div class="mt-4">
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
        </div>
    </div>

@endsection
