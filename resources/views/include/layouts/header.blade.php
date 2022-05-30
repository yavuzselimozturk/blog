<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Teko&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("/")}}style.css">
        <title>@yield('title' , 'Blog')</title>
    </head>
    <body>
        <div id="header">
             <nav class="navbar">
                <font id="head">Yavuz Selim ÖZTÜRK | <span> Kişisel Blog </span></font>
                <a id='title' href="/iletisim">İletişim</a>
                @foreach($pages as $page)
                <a id='title' href="{{route('page',$page->slug)}}">{{$page->title}}</a>
                @endforeach
                <a id='title' href="{{route('anasayfa')}}">Anasayfa</a>
             </nav>
        </div>
        <div id="container">
            <header>
                <img id="headerResim" src="{{asset("/")}}Images/bg1.jpg" alt="">
                <div id="centered">Yavuz Selim ÖZTÜRK</div>
            </header>
