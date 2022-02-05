@extends(backpack_view('blank'))
@section('content')
<div class="row">
    @foreach(\App\Models\QRCode::all() as $item)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="card-img-top mx-auto">
                {!!$item->qrcode!!}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{\App\Models\ScanHistory::where('qr_codes_id', $item->id)->count()}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
