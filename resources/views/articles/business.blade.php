@extends('layouts.articles')

@section('title' , 'Ligi Biznesowe')

@section('SideBarRight')
@include('inc.table')
@include('inc.playerStats')
@endsection

@section('content')
<h2 class="text-center">Aktualności {{ $leagueHeader ?? '' }}</h2>
<div class="row">

    @foreach($businessArticles as $article)

    <div class="col-sm-12 col-lg">
        <a class="article" href="/articles/{{$article->slug}} "><img class="img-fluid" src="https://picsum.photos/400/200" title="{{$article->title}}">
        <h5 class="text-center">{{Str::limit($article->title, 20)}}</h5>
        <p class="text-center">{{ Str::limit($article->content, 70) }}</p></a>
    </div>

    @endforeach
</div>



<div class="row">
    <div class="col-sm">
        <h2 class="text-center">Galeria Video {{ $leagueHeader ?? '' }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <h2 class="text-center">Galeria {{ $leagueHeader ?? '' }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
    <div class="col-sm">
        <img class="img-fluid" src="https://picsum.photos/400/200">
    </div>
</div>
@endsection
@section('banners')
<div class="row">
    <div class="col-sm-12 col-lg-8">
        <img class="img-fluid d-block mx-auto" src="{{ asset('images/banner.png') }}" style="max-height:35vh;">
    </div>

    <div class="col-sm-12 col-lg-4">
        <img class="img-fluid d-block mx-auto" src="{{ asset('images/banner.png') }}" style="max-height:35vh;">
    </div>

</div>
@endsection
@section('news')




<div class="row">



    @endsection