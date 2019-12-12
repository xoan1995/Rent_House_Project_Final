@extends('header-footer')

@section('content')


    <div class="mt-5">
        <div style="font-size: 20px; font-weight: bold; color: #1b1e21">Ưu đãi độc quyền</div>
        <div>Chỉ có tại Luxstay, hấp dẫn và hữu hạn, book ngay!</div>
        <div class="mt-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="height: 400px;">
                    <div class="carousel-item active">
                        <img src="{{asset('storage/images/event/event-1.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/event/event-2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/event/event-4.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/images/event/event-5.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div style="font-size: 20px; font-weight: bold; color: #1b1e21">Địa điểm nổi bật</div>
        <div>Cùng Luxury Rent House bắt đầu chuyến hành trình chinh phục thế giới của bạn</div>
        <div class="mt-4">
            <div class="container-fluid">
                <div id="carouselExample" class="carouselPrograms carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-md-4  active">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 1" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=1" alt="slide 1">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 3" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=2" alt="slide 2">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 4" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=3" alt="slide 3">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 5" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=4" alt="slide 4">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 6" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=5" alt="slide 5">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 7" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=6" alt="slide 6">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 8" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=7" alt="slide 7">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item col-md-4  ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <a href="#" title="image 2" class="thumb">
                                        <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=8" alt="slide 8">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5">
        <div style="font-size: 20px; font-weight: bold; color: #1b1e21">Top Chỗ ở hot 10000 độ</div>
        <div>Khám phá chỗ ở nổi tiếng đã xuất hiện trong các bộ phim & MV</div>
        <div class="mt-4">
            <div class="row">
                @foreach($houses as $house)
                    <div class="col-lg-3">
                        <div class="card" style="width: 100%">
                            <img src="{{asset('storage/'.$house->images[0]->path)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$house->title}}</h5>
                                <h5 class="card-title">{{$house->price}}</h5>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
