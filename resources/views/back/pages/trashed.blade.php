@extends('back.layouts.master')
@section('title','Silinen Makaleler')
@section('content')
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><srong>{{$articles->count()}} adet makale bulundu</strong></h6>
      <a href="{{route('admin.makaleler.index')}}" class="btn btn-primary btn-sm float-right"> Çalışan Makaleler</a>
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
                  <a href="{{route('admin.harddelete.article',$article->id)}}" title="Tamamen Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                  <a href="{{route('admin.recover.article',$article->id)}}" title="Geri Dönüştür" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection