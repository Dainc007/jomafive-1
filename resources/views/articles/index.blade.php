@extends('layouts.articles')

@section('title' , 'JOMAFIVE')

@section('content')
@include('inc.slideshow')
@endsection

@section('SideBarRight')

@if(session()->has('status') )
<div class="alert alert-warning" role="alert">
    {{session('status')['message']}}
</div>
@endif

<div class="row mb-2 justify-content-center d-flex">
    <a class="btn btn-lg leagueHeader" href="{{ route('articles.business') }}">Liga Biznesowa</a>
</div>

<div class="row mb-5 justify-content-around ">
    <a class="btn league">Liga 1</a>
    <a class="btn league">Liga 2</a>
    <a class="btn league">Liga 3</a>
</div>


<div class="row mb-2 justify-content-center">
    <a class="btn btn-lg leagueHeader" href="{{ route('articles.weekend') }}">Liga Weekendowa</a>
</div>

<div class="row mb-5 justify-content-around">
    <a class="btn league">Liga 1</a>
    <a class="btn league">Liga 2</a>
    <a class="btn league">Liga 3</a>
</div>

<div class="row mb-2 justify-content-center">
    <a class="btn btn-lg leagueHeader" href="{{ route('articles.kid') }}">Dziecięca</a>
</div>

<div class="row d-flex flex-wrap mx-auto">
    <a class="btn league mx-auto mt-1">2008</a>
    <a class="btn league mx-auto mt-1">2009</a>
    <a class="btn league mx-auto mt-1">2010</a>
    <a class="btn league mx-auto mt-1">2011</a>
    <a class="btn league mx-auto mt-1">2012</a>
    <a class="btn league mx-auto mt-1">2013</a>
    <a class="btn league mx-auto mt-1">2008</a>
    <a class="btn league mx-auto mt-1">2009</a>
    <a class="btn league mx-auto mt-1">2010</a>
    <a class="btn league mx-auto mt-1">2011</a>
    <a class="btn league mx-auto mt-1">2012</a>
    <a class="btn league mx-auto mt-1">2013</a>
</div>
@endsection


@section('news')
<div class="row">
    <h2 class="col-sm-12 text-center">Aktualności {{ $leagueHeader ?? '' }}</h2>
</div>


<div class="row">
    @foreach ($allArticles as $article)
    <div class="col-sm-3">
        <a class="article" href="/articles/{{$article->slug}} ">
            <img class="img-fluid" src="{{$article->photoPath}}" alt="" title="{{$article->title}}">
            <h5 class="text-center">{{$article->title}}</h5>
            <p class="text-center">{{ Str::limit($article->content, 150)  }}</p>
        </a>
    </div>
    @endforeach
</div>

@endsection
@section('partners')
<div class="row">
    
</div>
@endsection