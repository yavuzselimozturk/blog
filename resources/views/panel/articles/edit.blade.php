@extends('panel.layouts.master')
@section('title', $article->baslik.' makalesini düzenle')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
    </div>
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </div>
        @endif
      <form method="post" action="{{route('makaleler.update',$article->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label>Makale Başlığı</label>
          <input type="text" name="baslik" class="form-control" value="{{$article->baslik}}" required></input>

        </div>
        <div class="form-group">
          <label>Makale Kategori</label>
          <select class="form-control" name="kategori" required>
            <option value="">Seçim Yapınız</option>
            @foreach($kategoriler as $kategori)
              <option value="{{$kategori->id}}">{{$kategori->isim}}</option>
            @endforeach
          </select>

        </div>
        <div class="form-group">
          <label>Makale Fotoğrafı</label> <br/>
          <img src="{{asset($article->resim)}}" width="300">
          <input type="file" name="resim" class="form-control"></input>

        </div>
        <div class="form-group">
          <label>Makale İçeriği</label>
          <textarea id="editor" name="content" class="form-control" rows="8" required> {!! $article->icerik !!}</textarea>

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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
$('#editor').summernote(
  {
    'height':300
  }
);
});
</script>
@endsection
