@extends('layouts.app')

@section('title', 'artykuł Jomafive')

@section('content')
<div class="container">
    <div class="row py-5">

        <div class="col-sm-12  col-lg-8 offset-lg-2">

            <div class="d-flex w-100 justify-content-between pt-3">

                <small>
                    <p>{{$article->created_at->format('Y-m-d')}}</p>
                </small>
                @if(session()->has('status') )
                <div class="alert alert-warning" role="alert">
                    {{session('status')['message']}}
                </div>
                @endif
            </div>

            <img class="img-fluid d-block mx-auto mb-3" alt="brak" src="http://jomafive.test/{{$article->photoPath}}" title="">

            <h1 class="text-center"> {{$article->title}} </h1>

            <p class="text-center"><b>{{$article->content}}</b></p>
            <p>{{ $article->league}}</p>

            <div class="d-flex">
                <a href="{{ route('articles.edit', ['article' => $article] ) }}" type="button" class="btn btn-primary d-block mr-1">Edytuj</a>
                <form action="{{ route('articles.delete' , ['article' => $article] ) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf
                </form>



                <form action="{{ route('articles.delete' , ['article' => $article] ) }}" method="POST" novalidate>
                    <button type="submit" class="btn btn-danger">Usuń</button>
                    @method('DELETE')
                    @csrf
                </form>
            </div>

        </div>
    </div>

    <div class="row">

        @foreach($photos as $photo)
        <div class="col">
            <img class="img-fluid" src="/{{$photo}}">
        </div>
        @endforeach

    </div>

</div>
@endsection