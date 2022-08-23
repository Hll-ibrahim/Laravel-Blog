@extends('back.layouts.master')
@section('title',$article->title.' Makalesini Güncelle')
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
          <form action="{{route('admin.makaleler.update', $article->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label>Makale Başlığı</label>
              <input type="text" class="form-control" name="title" value="{{$article->title}}" required>
            </div>
            <div class="form-group">
              <label>Makale Kategorisi</label>
              <select name="category" class="form-control">
                <option value="">Seçim Yapınız</option>
                @foreach($categories as $category)
                  <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Makale Resmi</label><br>
              <img src="{{asset($article->image)}}" class="rounded img-thumbnail" width="400">
              <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
              <label>Makale İçeriği</label>
              <textarea id="editor" class="form-control" name="content" rows="6" required>{!! $article->content!!}</textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
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
