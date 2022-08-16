@extends('back.layouts.master')
@section('title','Tüm Makaleler')
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><srong>{{$articles->count()}} adet makale bulundu</strong></h6>
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
                                          <td>{!!$article->status ? "<span class='text-success'>Aktif </span>" : "<span class='text-danger'>Pasif </span>"!!}</td>
                                          <td>
                                            <a href="#" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            <a href="#" title="Düzenle" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

@endsection
