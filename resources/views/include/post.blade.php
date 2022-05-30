@extends('include.layouts.master')
@section('title')
  YAZI
@endsection
@section('css')

@endsection
@section('content')
<section class="content">

@include('include.widgets.kategori_widget')
          <main>

               <h1 class="baslik">{{$article->getCategory->isim}}</h1>
               <img id="paylasimResim" src="{{$article->resim}}">
               <h3>{{$article->baslik}}</h3>

               <p class="paylasimyazi">
                   {{$article->icerik}}
               </p>
               <p class="paylasimyazi">
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
                   Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                   Voluptates id ipsum ab, vitae itaque dicta debitis, molestias,
                   sunt provident a nostrum illo reiciendis. Reiciendis, perferendis
                   nihil dolore odit quas doloribus?
               </p>


           </main>
</section>
@endsection
