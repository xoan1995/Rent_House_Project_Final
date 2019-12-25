@extends('homeHeader')
@section('body')
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
                                    {{$house->address}} - {{$house->district->name}} - {{$house->city->name}}
                                </h6>

                                @foreach($ratings as $rating)
                                    @if($rating->house_id == $house->id)
                                        <div data-v-730e0d8f="" class="d-inline-block pl--6">
                                            <svg data-v-730e0d8f="" version="1.1" viewBox="0 0 14 14"
                                                 class="mr--3 svg-icon svg-fill" style="width: 16px; height: 16px;">
                                                <path fill="#ffb025" stroke="none" pid="0"
                                                      d="M14 5.425c0 .13-.073.27-.219.424l-3.054 3.123.724 4.41c.005.042.008.1.008.177 0 .123-.03.228-.088.313a.292.292 0 0 1-.257.128.658.658 0 0 1-.336-.106L7 11.812l-3.778 2.082a.69.69 0 0 1-.336.106c-.118 0-.206-.043-.265-.128a.538.538 0 0 1-.089-.313 1.5 1.5 0 0 1 .017-.177l.724-4.41L.21 5.849C.07 5.69 0 5.549 0 5.425c0-.217.157-.353.471-.405l4.224-.644L6.588.362C6.694.12 6.832 0 7 0c.168 0 .306.12.412.362l1.893 4.014 4.224.644c.314.052.471.188.471.405z"
                                                      _fill-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif
                                @endforeach
                                @if($rating->house_id == $house->id)
                                    <span class="promo__review-count p--small">{{count($ratings)}}</span>
                                @else
                                    <span class="promo__review-count p--small">Chưa có đánh giá</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
