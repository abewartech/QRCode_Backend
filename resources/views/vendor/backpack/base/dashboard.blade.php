@extends(backpack_view('blankds'))
@section('after_styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
/>
<link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
@endsection
@section('content')
<div id="dashboard"></div>
@endsection
@push('after_scripts')
<script src="{{ mix('js/Dashboard.js')}}"></script>
@endpush
