@extends('welcome')
@section('content')


 <div class="mt-5">
     <div  style="font-size: 30px; font-weight: bold; color: #1b1e21">Ưu đãi độc quyền</div>
     <div>
         <div class="row">
             @foreach($houses as $house)
             <div class="col-lg-3">
                 <div class="card" style="width: 100%">
                     <img src="{{asset('storage/'.$house->image_1)}}" class="card-img-top" alt="...">
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
