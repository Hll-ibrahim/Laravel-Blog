


@extends('front.layouts.master')
@section('title')
  Anasayfa
@endsection

@section('content')


                <div class="col-md-9 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{$article->title}}</h2>
                            <h3 class="post-subtitle">{{Str::limit($article->content, 50)}}</h3>
                        </a>
                        <p class="post-meta">
                            <a href="#" class="mr-4">{{$article->getCtegory->name}}</a>
                            <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
                        </p>
                    </div>
                    @if(!$loop->last)
                      <hr class="my-4" />
                    @endif
                    @endforeach
                    <!-- Divider-->


                    <!-- Pager-->
                  </div>

@include('front.widget.categoryWidget')
@endsection
