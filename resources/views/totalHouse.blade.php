{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

@extends('header-footer')
@section('content')
    <div class="mt-4">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" style="height: 400px">
                <div class="carousel-item active">
                    <img src="{{asset('storage/'.$house->images[0]->path)}}" class="d-block w-100" alt="...">
                </div>
                @for($i = 1; $i< count($house->images);$i++)
                    <div class="carousel-item">
                        <img src="{{asset('storage/'.$house->images[$i]->path)}}" class="d-block w-100" alt="...">
                    </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="offset-1">
                    <p style="font-size: 15px">Luxury Rent House - Việt Nam</p>
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
                                        @for($i=0; $i<=$average_user_rating; ++$i)
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
                                                    <p>
                                                        <a class="float-right btn btn-outline-primary ml-2"> <i
                                                                class="fa fa-reply"></i> Reply</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
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

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(".checkin").change(function () {
            $(".checkout").change(function () {
                var checkin = $('#checkin').val();
                var checkout = $('#checkout').val();
                var price = $("#price").data('value');
                if (checkin <= checkout) {
                    $.ajax({
                        url: "http://127.0.0.1:8000/houses/total-Day-And-Price",
                        type: "GET",
                        dataType: "json",
                        data: {
                            checkInNew: checkin,
                            checkOutNew: checkout,
                            price: price,
                        },
                        success: function (res) {
                            $("#price").html(`${res[0]} $/${res[1]}đêm`)
                        }
                    })
                }
            })
        })
    })
</script>
{!! toastr()->render() !!}
