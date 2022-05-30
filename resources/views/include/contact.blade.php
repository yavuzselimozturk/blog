@extends('include.layouts.master')
@section('title')
  İLETİŞİM
@endsection
@section('css')

@endsection
@section('content')
<section>
          <main>
            <h1 class="iletisimBaslik">Benimle İletişim Kurabilirsiniz...</h1>
            <div class="container">
              @if(session('success'))
              <h1 class="success">{{session('success')}}</h1>
              @endif
              @if($errors->any())
              @foreach($errors->all() as $hatalar)
              <h4>{{$hatalar}}</h4>
              @endforeach
              @endif
              <form action="{{route('contact-post')}}" method="post">
                  @csrf
                <label for="name">isim</label>
                <input type="text" name="name" placeholder="İsminiz ve soyisminiz.." required>

                <label for="email">E-Mail</label>
                <input type="text" name="email" placeholder="E-mail adresiniz.." required>
                <label for="subject">Konu</label>
                <select name="subject">
                  <option>Bilgi</option>
                  <option>Destek</option>
                  <option>Genel</option>
                </select>
                <label for="message">Mesajınız</label>
                <textarea name="message" placeholder="Nasıl yardımcı olabilirim.." style="height:200px"></textarea>
                <input type="submit" value="Gönder">
              </form>
            </div>
          </main>
</section>
@endsection
