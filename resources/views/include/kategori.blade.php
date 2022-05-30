@extends('include.layouts.master')
@section('title')
  Anasayfa
@endsection
@section('css')

@endsection
@section('content')

    <section class="content">
@include('include.widgets.kategori_widget')
      <main>
        @if(count($articles)>0)

             @foreach($articles as $article)
             @if($loop->first)
              <h1 class="baslik">{{$article->getCategory->isim}}</h1>
             @endif
             <div class="post-preview">
                 <a href="{{route('post', $article->slug)}}">
                     <h2 class="post-title">{{$article->baslik}}</h2>
                     <img id="anasayfaResim" src="{{$article->resim}}"/>
                     <h3 class="post-subtitle">{{$article->icerik}}</h3>
                 </a>
                 <p class="post-meta">
                     <a href="#">Kategori :{{$article->getCategory->isim}}</a>
                     <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
                 </p>
                 @if(!$loop->last)
                 <hr class="my-4" />
                 @endif

             @endforeach

           @else
             <div class="alert alert-danger">
               <h4>bu kategoriye ait bir yazi bulunamadı</h4>

             </div>
         @endif
         </div>
       </main>

    </section>

@endsection
