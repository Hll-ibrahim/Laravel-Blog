


@extends('front.layouts.master')
@section('title')
  {{$category->name.' Kategorisi'}}
@endsection
@section('content')


  <div class="col-md-9 col-lg-8 col-xl-7">
    @if(count($articles)>0)
      @foreach($articles as $article)
        <div class="post-preview">
          <a href="{{ route('single', [ $article->getCategory->slug, $article->slug]) }}">
            <h2 class="post-title">{{$article->title}}</h2>
            <img src="{{$article->image}}" alt="">
            <h3 class="post-subtitle">{{Str::limit($article->content, 50)}}</h3>
          </a>
          <p class="post-meta">
            <a href="#" class="mr-4">{{$article->getCategory->name}}</a>
            <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
          </p>
        </div>
        @if(!$loop->last)
          <hr class="my-4" />
        @endif
      @endforeach
      @else
        <div class="alert alert-danger">
          <h2>Bu kategoriye ait yazı bulunamadı.</h2>
        </div>
      @endif
  </div>

@include('front.widget.categoryWidget')
@endsection
