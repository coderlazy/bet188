@extends('layouts.master')
@section('content')
@include('layouts.menu');
@endsection
@section('script')
<script>
    //carousel
    $('.carousel').carousel({
        interval: false
    });
    
</script>
@endsection