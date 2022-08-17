@extends('back.layouts.master')
@section('title','Tüm Makaleler')
@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><srong>{{$articles->count()}} adet makale bulundu</strong></h6>
      <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-trash"></i> Silinen Makaleler</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Fotoğraf</th>
              <th>Makale Başlığı</th>
              <th>Kategori</th>
              <th>Görüntülenme Sayısı</th>
              <th>Oluşturma Tarihi</th>
              <th>Durum</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($articles as $article)
              <tr>
                <td><img src="{{asset($article->image)}}" width="100"></td>
                <td>{{$article->title}}</td>
                <td>{{$article->getCategory->name}}</td>
                <td>{{$article->hit}}</td>
                <td>{{$article->created_at->diffForHumans()}}</td>
                <td>
                  <input class="switch" article-id="{{$article->id}}" type="checkbox"  data-on="<i class='fa fa-eye'></i>" data-onstyle="success" data-off="<i class='fa fa-eye-slash'></i>" data-offstyle="danger" @if($article->status==1) checked @endif data-toggle="toggle">
                </td>
                <td>
                  <a href="{{route('single',[$article->getCategory->slug,$aicle->slug])}}" title="Görüntüle" class="btn btn-sm btn-primary"><i class="fa fa-book"></i></a>
                  <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                  <a href="{{route('admin.delete.article',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
@section('css')
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
    $(function() {
      $('.switch').change(function() {
        id = $(this)[0].getAttribute('article-id');
        statu = $(this).prop('checked');
        $.get("{{route('admin.switch')}}", {id:id, statu:statu}, function(data,status) {
        })
      })

    })
  </script>
@endsection