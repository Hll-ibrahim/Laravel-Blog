@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
    <div class="row">

        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary m-0 font-weight-bold">Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.category.create')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Kategori Adı</label>
                            <input type="text" class="form-control" name="category" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">
                                Ekle
                            </button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary m-0 font-weight-bold">@yield('title')</h6>
                </div>
                <div class="card-body">
                    
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kategori Adı</th>
              <th>Makale Sayısı</th>
              <th>Durum</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
              <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->articleCount()}}</td>
                <td>
                  <input class="switch" category-id="{{$category->id}}" type="checkbox"  data-on="<i class='fa fa-eye'></i>" data-onstyle="success" data-off="<i class='fa fa-eye-slash'></i>" data-offstyle="danger" @if($category->status==1) checked @endif data-toggle="toggle">
                </td>
                <td>
                  <a category-id="{{$category->id}}" title="Kategoriyi Düzenle" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Kategoriyi Düzenle</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('admin.category.update')}}">
              @csrf
              <div class="form-group">
                <label for="">Kategori Adı:</label>
                <input id="category" type="text" class="form-control" name="category">
                <input type="hidden" id="category_id" name="id">
              </div>
            
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
              <button id="refresh" type="submit" class="btn btn-success">Kaydet</button>
            </div>
          </form>
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
      $('.edit-click').click(function() {
        id = $(this)[0].getAttribute('category-id');
        $.ajax({
          type:'GET',
          url:'{{route('admin.category.getdata')}}',
          data:{id:id},
          success:function(data){
            console.log(data);
            $('#category').val(data.name);
            $('#category_id').val(data.id);
            $('#editModal').modal();
          }
        });
      });
      $('#refresh').click(function() {
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      })
      $('.switch').change(function() {
        id = $(this)[0].getAttribute('category-id');
        statu = $(this).prop('checked');
        $.get("{{route('admin.category.switch')}}", {id:id, statu:statu}, function(data,status) {
        })
      })

    })
  </script>
@endsection