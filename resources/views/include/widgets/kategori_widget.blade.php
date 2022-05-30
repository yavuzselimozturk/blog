<div class="menu">
  <div class="card">
    <div class="card-header">
      Kategoriler
    </div>
      <div class="list-group">
      @foreach($kategoriler as $kategori)
        <li class="list-group-item">
           <span class="badge"> {{$kategori->articleCount()}} </span>
          <a href="{{route('kategori',$kategori->slug)}}">{{$kategori->isim}}</a>
        </li>
      @endforeach

      </div>
  </div>
</div>
