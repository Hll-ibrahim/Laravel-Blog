@isset($categories)
  <div class="col-md-3">
    <div class="card">
      <div class="card-header">
        Kategoriler
      </div>
      <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item">
          <div class="row">
              <a href="#" class="col-10">{{$category->name}}</a>
              <span class="badge bg-danger col-2">{{$category->articleCount()}}</span>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
