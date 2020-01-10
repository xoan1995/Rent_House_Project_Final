<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .leftr {
        float: left;
        margin-right: 2%;
        background-color: rgb(251, 251, 251);
        z-index: 4;
        position: fixed;
        width: 313px;
        box-shadow: rgba(180, 185, 193, 0.4) 0px 21px 75px;
        margin-top: 0px;
        padding: 24px 24px 46px;
        border-width: 0px 2px 2px;
        border-style: solid solid solid;
        border-color: rgb(255, 255, 255) rgb(255, 255, 255) rgb(255, 255, 255);
        border-image: initial;
        border-top: 0px;
        border-radius: 0 0 10px 10px;
    }

    .light {
        margin: 0 auto;
        padding-top: 30px;
        width: 100%;
    }

    .light input[type="text"] {
        border: 1px solid #a7a7a7;
        float: left;
        height: 22px;
        padding: 4px;
        padding-left: 33px;
        width: 270px;
        padding-top: 9px;
        margin-top: 3px;
    }

    #gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 700px;
        width: 1150px;
    }

    iframe {
        width: 100%;
        height: 100%;
        display: block;
    }
</style>
<body>
<div class="row">
    <div class="col-3 col-lg-3">
        <div class="mt-3 ml-3">
            <a class="btn btn-outline-info" style="width: 80px" href="{{route('totalHouse',$house->id)}}">
                Back
            </a>
        </div>
        <div class="light">
            <div>
                <h2 style="text-align: center; font-weight: bold; font-family: Arial">Enter your Address:</h2>
            </div>
            <div class=" d-flex justify-content-center">
                <input type="text" name="s" id="s" style="height: 40px; width: 350px"
                       class="form-control"
                       value="{{$house->city->name}} - {{$house->district->name}} - {{$house->address}}"
                       placeholder="Enter Adress" data-role="none">
            </div>
        </div>
        <div class="clear"></div>
        <div style="text-align: center; margin-top: 100px">
            <img height="300px" width="300px"
                 src="{{asset('storage/images/google-maps-png-google-maps-icon-1600.png')}}" alt="">
        </div>
    </div>

    <div class="col-9 col-lg-9">
        <div class="mt-3">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas"
                        src="https://maps.google.com/maps?q={{$house->address}}-{{$house->district->name}}-{{$house->city->name}}=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0">
                    <a href="https://www.embedgooglemap.net"></a>
                </iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
