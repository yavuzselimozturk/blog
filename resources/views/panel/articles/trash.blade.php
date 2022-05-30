@extends('panel.layouts.master')
@section('title','Silinen Makaleler')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold float-right text-primary"><strong>{{$articles->count()}}</strong> Makale Bulundu...
        <a href="{{route('makaleler.index')}}" class="btn btn-sm btn-primary "><i class="fas fa-fw fa-edit"></i> Tüm Makaleler</a>
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
                        <th>Silinme Tarihi</th>
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
                        <td>{{$article->deleted_at->diffForHumans()}}</td>
                        <td>
                          <a href="{{route('recover-article', $article->id)}}" title="Kurtar" class="btn btn-sm btn-success"><i class="fa fa-recycle"></i> Kurtar</a>
                          <a href="{{route('force-delete', $article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Silmeye Zorla</a>

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

@endsection
