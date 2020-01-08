<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@extends('header-footer')
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('user.statistics')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div style="float: left">Total revenue by Month</div>
                    <div style="float: left; margin-left: 200px ">

                        <select class="form-control" id="year" name="year">
                            <option value="" selected>Select</option>
                            <option value="18">2018</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                        </select>
                    </div>
                    <div style="float: left; margin-left: 30px">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="container ">
                <div>
                    {!! $chart->container() !!}
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"
                            charset=utf-8></script>
                    {!! $chart->script() !!}
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
