<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 6 Upload Image Using Dropzone Tutorial</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    <style>
        body{
            background: url("https://cdn.magdeleine.co/wp-content/uploads/2014/11/unsplash_5259a34e5d050_1-1400x927.jpg") no-repeat fixed center;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 style="color: white">Đăng nhiều ảnh để dễ bán hơn</h2><br/>
        <form method="post" action="{{route('storeImage')}}" enctype="multipart/form-data"
              class="dropzone" id="dropzone" name="file">
            @csrf
        </form>
        <a class="btn btn btn-success" href="{{route('home')}}" id="uploadfiles">Thêm</a>
    </div>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            maxFilesize: 10,
            parallelUploads: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        },
        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
        }))

</script>
</body>
</html>
