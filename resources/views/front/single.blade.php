@extends('front.layouts.master')
@section('title', $article->title)
@section('bg', asset($article->image))

@section('content')

  <div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
      {!!$article->content!!}
      <p>Okuma Sayısı : <b>{{$article->hit}}</b></p>
  </div>

@include('front.widget.categoryWidget')
@endsection
