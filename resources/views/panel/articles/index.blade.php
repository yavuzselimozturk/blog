@extends('panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold float-right text-primary"><strong>{{$articles->count()}}</strong> Makale Bulundu...
        <a href="{{route('trash-article')}}" class="btn btn-sm btn-warning "><i class="fa fa-trash"></i> Silinen Makaleler</a>
      </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                    <tr>
                        <td>
                          <img src="{{$article->resim}}" width="200">
                        </td>
                        <td>{{$article->baslik}}</td>
                        <td>{{$article->getCategory->isim}}</td>
                        <td>{{$article->created_at->diffForHumans()}}</td>
                        <td>

                          <input class="switch" type="checkbox" article-id="{{$article->id}}" data-onstyle="success" data-offstyle="danger" data-on="Aktif" data-off="Pasif" data-toggle="toggle" value="{{($article->status==1) ? '1' : '0' }}">

                        </input>
                        </td>
                        <td>
                          <a target="_blank" href="{{route('post',$article->slug)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle</a>
                          <a href="{{route('makaleler.edit', $article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle</a>
                          <form method="post" action="{{route('makaleler.destroy', $article->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i> Sil</button>
                          </form>
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
     statu=$(this).prop('checked');
     $.get("{{route('switch')}}", {id:id , statu:statu}, function(data, status));
     {
       console.log(data);
     });
    })
  })
</script>
@endsection
