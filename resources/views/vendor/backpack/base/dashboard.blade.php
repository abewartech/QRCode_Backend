@extends(backpack_view('blank'))
@section('content')
<div class="row">
    @foreach(\App\Models\QRCode::all() as $item)
    <div class="col">
        <div class="card" style="border-radius: 18px;">
            <div class="d-flex justify-content-center pt-3">
                {!!$item->qrcode!!}
            </div>
            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="card-title">{{$item->name}}</h4>
                <p class="card-text font-weight-bolder">{{\App\Models\ScanHistory::where('qr_codes_id', $item->id)->count()}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
