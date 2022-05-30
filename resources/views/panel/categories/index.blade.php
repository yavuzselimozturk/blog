@extends('panel.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur.</h6>
      </div>
      <div class="card-body">
          <form method="post" action="{{route('category-create')}}">
            @csrf
            <div class="form-group">
              <label>Kategori Adı</label>
                <input type="text" class="form-control" name="category" required />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Ekle</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Makale Sayısı</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>

                        <td>{{$category->isim}}</td>
                        <td>{{$category->articleCount()}}</td>
                        <td>
                          <a category-id="{{$category->id}}" class="btn btn-sm btn-primary edit-click" title="Kategoriyi Düzenle"><i class="fa fa-edit text-white">Düzenle</i></a>
                          <a category-id="{{$category->id}}" category-count="{{$category->articleCount()}}" class="btn btn-sm btn-danger delete-click" title="Kategoriyi Sil"><i class="fa fa-times text-white">Sil</i></a>
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
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kategoriyi Düzenle</h4>
        <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{route('category-update')}}">
          @csrf
          <div class="form-group">
            <label>Kategori Adı</label>
            <input id="category" type="text" class="form-control" name="category">
            <input type="hidden" name="id" id="category_id">
          </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Kaydet</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>

      </div>
      </form>

    </div>
  </div>
</div>

<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kategoriyi Sil</h4>
        <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-danger" id="articleAlert"> </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="{{route('category-delete')}}" method="post">
          @csrf
          <input type="hidden" name="id" id="deleteId"/>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        <button id="deleteButton" type="submit" class="btn btn-success">Sil</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endsection
@section('js')
<script>
$(function(){
  $('.delete-click').click(function(){
    id= $(this)[0].getAttribute('category-id');
    count= $(this)[0].getAttribute('category-count');
    if(id==1){
      $('#articleAlert').html('Bu kategori silinemez...');
      $('#deleteButton').hide();
      $('#deleteModal').modal();
      return;
    }


    $('#deleteButton').show();
    $('#deleteId').val(id);
    $('#articleAlert').html('Bu kategoriyi silmek istediğinize emin misiniz?');
    if(count>0){
      $('#articleAlert').html('Bu kategoriye ait ' + count + ' makale bulunmaktadır. Silmek istediğinize emin misiniz?');
    }
    $('#deleteModal').modal();
  });
  $('.edit-click').click(function(){
    id= $(this)[0].getAttribute('category-id');
    $.ajax({
      type:'GET',
      url:'{{route('category-getdata')}}',
      data:{id:id},
      success:function(data){
        console.log(data);
        $('#category').val(data.isim);
        $('#category_id').val(data.id);
        $('#editModal').modal();
      }
    });
  });
})
</script>
@endsection
