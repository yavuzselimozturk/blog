@extends('include.layouts.master')
@section('title')
  SAYFA
@endsection
@section('css')

@endsection
@section('content')
<section class="content">

@include('include.widgets.kategori_widget')
          <main>
            <h1 class="baslik">{{$page->title}}</h1>
            <img id="paylasimResim" src="{{$page->image}}"/>

               {!! $page->content !!}

          </main>
</section>
@endsection
