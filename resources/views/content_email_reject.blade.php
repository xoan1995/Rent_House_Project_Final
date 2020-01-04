<h3 style="color: blue">Bạn đã hủy nhà với lý do:
    @foreach($reasons as $reason)
        @if($reason)
            {{$reason}},
        @endif
    @endforeach
</h3>
<h1 style="color: red">
    Cảm ơn bạn đã tin tưởng vào dịch vụ của chúng tôi, mong bạn quay lại vào lần sau!
</h1>
