@if(count($articles)>0)
    @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{ route('single', [ $article->getCategory->slug, $article->slug]) }}">
            <h2 class="post-title">{{$article->title}}</h2>
            <img src="{{asset($article->image)}}" width="600">
            <h3 class="post-subtitle">{!!Str::limit($article->content, 50)!!}</h3>
            </a>
            <p class="post-meta">
            <a href="#" class="mr-4">{{$article->getCategory->name}}</a>
            <i class="float-right">{{$article->created_at->diffForHumans()}}</i>
            </p>
        </div>
        @if(!$loop->last)
            <hr class="my-4" />
        @endif
    @endforeach
    {{ $articles->Links() }}
@else
    <div class="alert alert-danger">
        <h2>Bu kategoriye ait yazı bulunamadı</h2>
    </div>
@endif