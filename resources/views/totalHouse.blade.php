@extends('header-footer')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img
                    src="http://teamconnect.info/image/house-beautiful-living-rooms/house-beautiful-living-room-14-summer-interior-design-idea-picture-of-home-color-makeover-curtain-by-water-and-dining-paint-2017-area.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img
                    src="data:image/jpeg;base64,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"
                    class="d-block w-100" alt="...">
            </div>
            @for($i = 1; $i< count($house->images);$i++)
                <div class="carousel-item">
                    <img src="{{asset('storage/'.$house->images[$i]->path)}}" class="d-block w-100" alt="...">
                </div>
            @endfor
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
    <div class="mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="offset-1">
                    <p style="font-size: 15px">Vitamin Rent House - Việt Nam</p>
                </div>
                <div class="offset-1">
                    <p style="font-family:Arial; font-size: 40px; font-weight: bold">{{$house->title}}</p>
                </div>
                <div class="offset-1 mt-3" style="font-size: 20px; font-weight: bold">
                    <img style="width: 30px"
                         src="https://img.icons8.com/plasticine/100/000000/address.png"><a
                        href="{{route('showMap',$house->id)}}">{{$house->address}}</a>
                </div>
                <div class="offset-1 mt-2" style="font-size: 20px; font-weight: bold">
                    <img src="https://img.icons8.com/officel/30/000000/four-beds.png">{{$house->kindRoom}}
                </div>
                <div class="offset-1 mt-2" style="font-size: 20px; font-weight: bold">
                    <img src="https://img.icons8.com/color/30/000000/cottage.png">{{$house->kindHouse}}
                </div>
                <div class="offset-1 mt-2">
                    <p style="font-size: 20px">Tổng quan: {{$house->numBedroom}} Phòng ngủ · {{$house->numBathroom}}
                        Phòng tắm</p>
                </div>
                <div class="offset-1 mt-4">
                    <p style="font-size: 20px">Giới thiệu:</p>
                    <p style="font-size: 17px">{!! $house->description !!}</p>
                </div>
                <div class="offset-1 mt-4">
                    <p style="font-size: 25px; font-weight: bold">Tiện ích phòng bếp</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mt-1">
                                <img src="https://img.icons8.com/office/40/000000/toaster-oven.png"> Lò vi sóng
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-1">
                                <img src="https://img.icons8.com/ios/40/000000/gas-stove.png"> Bếp ga
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-1">
                                <img src="https://img.icons8.com/ultraviolet/40/000000/fridge.png">Tủ lạnh
                            </div>
                        </div>
                    </div>
                    <p class="mt-3" style="font-size: 25px; font-weight: bold">Tiện ích giải trí</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="https://img.icons8.com/color/40/000000/nature.png"> Quang cảnh thoáng mát
                        </div>
                        <div class="col-lg-5">
                            <img src="https://img.icons8.com/clouds/40/000000/game-pool.png">Có bàn BIDA
                        </div>
                    </div>
                </div>
                <div class="offset-1 mt-4">
                    <p style="font-size: 25px; font-weight: bold">Tiện ích phòng</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="https://img.icons8.com/ios-filled/40/000000/tv.png"> TiVi
                        </div>
                        <div class="col-lg-4">
                            <img src="https://img.icons8.com/pastel-glyph/40/000000/air-conditioner--v2.png"> Điều hòa
                        </div>
                        <div class="col-lg-4">
                            <img src="https://img.icons8.com/nolan/40/000000/washing-machine.png"> Máy giặt
                        </div>
                    </div>
                </div>
                <div class="offset-1 mt-4">
                    <p style="font-size: 30px; font-weight: bold">Giá Phòng</p>
                    <p style="font-size: 17px">Giá có thể tăng vào cuối tuần hoặc ngày lễ</p>
                    <div class="row"
                         style="background: gainsboro; text-align: center; font-size: 17px;font-weight: bold">
                        <div class="col-lg-6">
                            <p>Thứ 2 - Thứ 5</p>
                        </div>
                        <div class="col-lg-6">
                            {{$house->price}}$/đêm
                        </div>
                    </div>
                    <div class="row" style="text-align: center; font-size: 17px;font-weight: bold">
                        <div class="col-lg-6">
                            <p>Thứ 6 - Chủ nhật</p>
                        </div>
                        <div class="col-lg-6">
                            {{$house->price + ($house->price * 5 /100)}}$/đêm (+5%)
                        </div>
                    </div>
                    <div class="row"
                         style="text-align: center;background: gainsboro; font-size: 17px;font-weight: bold">
                        <div class="col-lg-6">
                            <p>Thuê theo tháng</p>
                        </div>
                        <div class="col-lg-6">
                            {{$house->price - (($house->price*3.33)/100)}}$/đêm (-3.33%)
                        </div>
                    </div>
                </div>
                <div class="offset-1 mt-4">
                    <p style="font-size: 25px; font-weight: bold">Nội dung và quy chế về nơi ở</p>
                    <p style="font-size: 17px">Hiện tại, Luxury Rent House áp dụng 3 cấp chính sách hủy phòng tiêu chuẩn
                        lần lượt là: Linh hoạt, Trung
                        bình và Nghiêm ngặt. Các mức hủy phòng này sẽ được chủ nhà lựa chọn. Quy định cụ thể của mỗi mức
                        hủy, bạn có thể tham khảo hình ảnh dưới đây: </p>
                    <p style="font-size: 17px">· Hủy phòng Linh hoạt (Flexible): Miễn phí hủy phòng trong vòng 48h sau
                        khi đặt phòng thành công và
                        trước 1 ngày so với thời gian check-in. Sau đó, hủy phòng trước 1 ngày so với thời gian
                        check-in, được hoàn lại 100% tổng số tiền đã trả (trừ phí dịch vụ).</p>
                </div>
                <div class="offset-1 mt-4">
                    <div class="row">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="rating-block">

                                        <h5>Average user rating</h5>
                                        <h2 class="bold padding-bottom-7">
                                            {{round($average_user_rating)}}<small>/ 5</small></h2>
                                        @for($i=1; $i<=$average_user_rating; ++$i)
                                            <span class="fa fa-star" style="color: orange"></span>
                                        @endfor
                                    </div>
                                </div>


                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-10">
                                            <h5>Rating breakdown</h5>
                                            @for($i=5; $i>=1; $i--)
                                                <div class="pull-left">
                                                    <div class="pull-left" style="width:35px; line-height:1;">
                                                        <div style="height:9px; margin:5px 0;">{{$i}}
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                    <div class="pull-left" style="width:180px;">
                                                        <div class="progress" style="height:9px; margin:8px 0;">
                                                            <div class="progress-bar progress-bar-success"
                                                                 role="progressbar"
                                                                 aria-valuenow="5"
                                                                 aria-valuemin="0" aria-valuemax="5"
                                                                 style="width:{{$with=$with-20}}%">
                                                                <span class="sr-only">80% Complete(danger)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($ratings as $rating)
                        @if($rating->house_id == $house->id)
                            @foreach(\App\User::all() as $user)
                                @if($rating->user_id == $user->id)

                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="col-md-2" style="padding-left: 2px">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                                     class="img img-rounded img-fluid"/>
                                                <p class="text-secondary text-center"></p>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <a class=" col-md-2  float-left"
                                                           href=""><strong>{{$user->name}}</strong></a>
                                                        <div class="col-md-6"> @for($i=1;$i<=$rating->star;$i++)
                                                                <span class="fa fa-star" style="color: orange"></span>
                                                            @endfor</div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>
                                                        {{$rating->content}}
                                                    </p>
                                                    @foreach($rating->comments as $comment)
                                                        @if($rating->id == $comment->rating_id)
                                                            <div class="ml-5 mb-4">
                                                                <div style="color: #1da1f2; font-weight: bold">
                                                                    {{$comment->user->name}}
                                                                </div>
                                                                {{($comment->content)}}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <form action="{{route('addComment')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <input type="text" name="ratings_id"
                                                           value="{{$rating->id}}"
                                                           style="display: none">

                                                    <div class="col-lg-8 reply" style="display: none">
                                                        <input type="text" name="inputContent"
                                                               class="form-control">
                                                    </div>

                                                    <div class="col-lg-4 ">
                                                        <a class=" buttonReply float-right btn btn-outline-primary ml-2">
                                                            <i
                                                                class="fa fa-reply"></i> Reply</a>
                                                        <input style="display: none" type="text" name="user_id"
                                                               value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                        <button style="display: none"
                                                                class="btn btn-success sendReply"
                                                                type="submit">
                                                            Gửi
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                @guest()
                @else
                    <form action="{{route('rating',$house->id)}}" method="post">
                        @csrf
                        <div class="offset-1 mt-4">
                            <div class="rating ">
                                <input type="radio" id="star5" name="star" value="5"/><label for="star5" title="Meh">5
                                    stars</label>
                                <input type="radio" id="star4" name="star" value="4"/><label for="star4"
                                                                                             title="Kinda bad">4
                                    stars</label>
                                <input type="radio" id="star3" name="star" value="3"/><label for="star3"
                                                                                             title="Kinda bad">3
                                    stars</label>
                                <input type="radio" id="star2" name="star" value="2"/><label for="star2"
                                                                                             title="Sucks big tim">2
                                    stars</label>
                                <input type="radio" id="star1" name="star" value="1"/><label for="star1"
                                                                                             title="Sucks big time">1
                                    star</label>
                            </div>
                        </div>
                        <div class="offset-1 mt-4">
                        <textarea class="form-control" rows="3"
                                  name="inputContent"></textarea>
                        </div>
                        <div class="offset-1 mt-4">
                            <button type="submit" class="btn btn-success">Gửi</button>
                        </div>
                    </form>
                @endguest
            </div>
            <div class="col-lg-5 ml-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="offset-1" style="float: right; font-size: 15px">
                            <a href=""> Chia sẻ <img src="https://img.icons8.com/cotton/30/000000/upload.png"></a>
                        </div>
                        <div style="float: right">
                            <a href="">Lưu lại <img src="https://img.icons8.com/cotton/30/000000/like--v1.png"></a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 parent">
                    <div class="col-lg-12 child">
                        <form action="{{route('order.rent')}}">
                            <div class="card card_1" style="float: right;background: #f8fafc">
                                <div class="card-body">
                                    <div data-value="{{$house->price}}" class="ml-5" id="price"
                                         style="text-align: left; font-size: 40px; font-weight: bold; float: left">
                                        {{$house->price}}
                                        $/đêm
                                    </div>
                                </div>

                                <div class="ml-4">
                                    <p style="width: 200px;text-align: center;background: coral;color: white">Giảm 30%
                                        từ chủ nhà</p>
                                    <p>Giảm 30% cho đặt phòng có checkin từ 07/12 đến 31/12</p>
                                    <p style="width: 200px;text-align: center;background: coral;color: white">Giảm 40%
                                        từ chủ nhà</p>
                                    <p>Giảm 40% cho đặt phòng có checkin từ 01/01/20 đến 23/01/20</p>
                                </div>
                                <div class="ml-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="date" class="checkin" id="checkin" name="checkin"
                                                       style="border-radius: 10px">
                                            </div>
                                            <div class="col-6">
                                                <input type="date" class="checkout" id="checkout" name="checkout"
                                                       style="border-radius: 10px">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                @if($errors->has('checkin'))
                                                    <span class="text-danger">{{$errors->first('checkin')}}</span>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                @if($errors->has('checkout'))
                                                    <span class="text-danger">{{$errors->first('checkout')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" value="{{$house->user->email}}" name="email" style="display: none">
                                <input type="text" value="{{$house->price}}" name="price" style="display: none">
                                <input type="text" value="{{$house->title}}" name="title" style="display: none">
                                <input type="text" value="{{$house->id}}" name="house_id" style="display: none">
                                <div class="ml-lg-5 mr-5 mb-4 mt-4">
                                    <button type="submit" style="width: 100%; height: 50px" class="btn btn-info">Gửi yêu
                                        cầu đặt phòng
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

{!! toastr()->render() !!}
