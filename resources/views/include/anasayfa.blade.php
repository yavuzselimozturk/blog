@extends('include.layouts.master')
@section('title')
  Anasayfa
@endsection
@section('css')

@endsection
@section('content')

        <section>
@include('include.widgets.kategori_widget')

          <main>

            <!-- Post preview-->
            <h1 class="baslik">Anasayfa</h1>
            @foreach($articles as $article)
            <div class="post-preview">
              @if(!$loop->first)
              <hr class="my-4" />
              @endif
                <a href="{{route('post', $article->slug)}}">
                    <h2 class="post-title">{{$article->baslik}}</h2>
                    <img id="anasayfaResim" src="{{$article->resim}}"/>
                    <h3 class="post-subtitle">{{$article->icerik}}</h3>
                </a>
                <p class="post-meta">
                    <a href="#">Kategori :{{$article->getCategory->isim}}</a>
                    <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
                </p>

            </div>
            @endforeach
            <a href="/anasayfa?page=2" class="btnOlder">Eski Paylaşımlar...</a>
            <a href="/anasayfa?page=1" class="btnOlder">Yeni Paylaşımlar...</a>
          </main>
        </section>

@endsection
