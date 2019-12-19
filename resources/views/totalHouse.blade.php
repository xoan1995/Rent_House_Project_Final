<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                         src="https://img.icons8.com/plasticine/100/000000/address.png">{{$house->address}}
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
                                    <div class="ml-5"
                                         style="text-align: left; font-size: 40px; font-weight: bold; float: left">{{$house->price}}
                                        $/đêm
                                    </div>
                                </div>

                            <div class="ml-4">
                                <p style="width: 150px;background: coral;color: white">Giảm 30% từ chủ nhà</p>
                                <p>Giảm 30% cho đặt phòng có checkin từ 07/12 đến 31/12</p>
                                <p style="width: 150px;background: coral;color: white">Giảm 40% từ chủ nhà</p>
                                <p>Giảm 40% cho đặt phòng có checkin từ 01/01/20 đến 23/01/20</p>
                            </div>
                            <div class="ml-5">
                                <input type="date" name="checkin" style="border-radius: 10px">
                                @if($errors->has('checkin'))
                                    <p class="text-danger">{{$errors->first('checkin')}}</p>
                                @endif
                                <input type="date" name="checkout" style="border-radius: 10px">
                                @if($errors->has('checkout'))
                                    <p class="text-danger">{{$errors->first('checkout')}}</p>
                                @endif
                            </div>
                            <input type="text" value="{{$house->user->email}}" name="email" style="display: none">
                            <input type="text" value="{{$house->title}}" name="title" style="display: none">
                            <input type="text" value="{{$house->id}}" name="house_id" style="display: none">
                            <div class="ml-lg-5 mr-5 mb-4 mt-4">
                                <button type="submit" style="width: 100%; height: 50px" class="btn btn-info">Gửi yêu cầu đặt phòng
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
