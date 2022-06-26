


@extends('front.layouts.master')
@section('title')
  Anasayfa
@endsection

@section('content')


  <div class="col-md-9 col-lg-8 col-xl-7">
    @include('front.widget.articleList')
  </div>

@include('front.widget.categoryWidget')
@endsection
