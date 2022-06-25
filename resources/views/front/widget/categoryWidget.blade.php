@isset($categories)
  <div class="col-md-3">
    <div class="card">
      <div class="card-header">
        Kategoriler
      </div>
      <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item @if(\Request::segment(2)==$category->slug) bg-warning @endif")>
          <div class="row">
              <a @if(\Request::segment(2)!=$category->slug) href="{{route('category', $category->slug)}}" @endif  class="col-md-10" >{{$category->name}}</a>
              <span class="badge bg-danger col-md-2">{{$category->articleCount()}}</span>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
