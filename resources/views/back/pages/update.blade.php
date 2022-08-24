@extends('back.layouts.master')
@section('title',$page->title.' Sayfasını Güncelle')
@section('content')
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                {{$error}}        
              @endforeach
            </div>
          @endif
          <form action="{{route('admin.page.edit.post',$page->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Makale Başlığı</label>
              <input type="text" class="form-control" name="title" value="{{$page->title}}" required>
            </div>
            <div class="form-group">
              <label>Sayfa Resmi</label><br>
              <img src="{{asset($page->image)}}" class="rounded img-thumbnail" width="400">
              <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
              <label>Sayfa İçeriği</label>
              <textarea id="editor" class="form-control" name="content" rows="6" required>{!! $page->content!!}</textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Sayfayı Güncelle</button>
            </div>
          </form>
        </div>
      </div>

@endsection
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
  <!-- include summernote css/js -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#editor').summernote(
        {
          'height':200
        }
      );
  });
  </script>
@endsection
