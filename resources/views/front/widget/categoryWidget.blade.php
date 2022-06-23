<div class="col-md-3">
<div class="card">
  <div class="card-header">
    Kategoriler
  </div>
  <ul class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item"><a href="#">{{$category->name}}</a><div class="badge bg-danger float-right">12</div></li>
    @endforeach
  </ul>
</div>
</div>
