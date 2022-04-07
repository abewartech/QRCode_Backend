@extends(backpack_view('blankds'))
@section('content')
<style>
    #bg {

  /* Preserve aspet ratio */
  min-width: 100%;
  min-height: 100%;
}
</style>
<img src="{{asset('tni.jpeg')}}" id="bg" alt="">
@endsection
