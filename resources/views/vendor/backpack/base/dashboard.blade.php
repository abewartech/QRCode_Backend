@extends(backpack_view('blank'))
@section('content')
<div class="row">
    @php
    $masuk = 0;
    $keluar = 0;
    @endphp
    @foreach(\App\Models\QRCode::all() as $item)
    @php
    if($item->name == 'masuk') {
    $masuk = \App\Models\ScanHistory::where('qr_codes_id', $item->id)->count();
    } else if($item->name == 'keluar') {
    $keluar = \App\Models\ScanHistory::where('qr_codes_id', $item->id)->count();
    }
    @endphp
    <div class="col">
        <div class="card" style="border-radius: 18px;">
            <div class="d-flex justify-content-center pt-3">
                {!!$item->qrcode!!}
            </div>
            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="card-title">{{$item->name}}</h4>
                <p class="card-text font-weight-bolder">
                    {{\App\Models\ScanHistory::where('qr_codes_id', $item->id)->count()}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col">
        <div class="card" style="border-radius: 18px;">
            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="card-title">Selisih</h4>
                <p class="card-text font-weight-bolder">{{$masuk - $keluar}}</p>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-end justify-content-between">
    <div class="col">
    </div>
    <div class="col d-flex justify-content-end">
        <a href="reset" class="btn btn-danger">Reset</a>
    </div>
</div>
@endsection
@push('after_scripts')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = false;

    var pusher = new Pusher('0bbbd5d4e4774ee63d12', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function (data) {
        window.location.reload();
    });

</script>
@endpush
