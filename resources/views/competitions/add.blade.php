@extends('layouts.app')

@section('title' , 'Rozgrywki - Tworzenie')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
        @if(isset($teams))
            <form method="POST" action="{{route('competitions.store') }}" enctype="multipart/form-data">
                <div class="col form-group">
                    <label for="pickedTeams">Wybierz Druzyny</label>
                    <select multiple class="form-control @error('pickedTeams') is-invalid @enderror" id="pickedTeams" name="pickedTeams[]">

                        @foreach($teams as $team)
                        <option>{{$team}}</option>
                        @endforeach

                    </select>
                    @error('level')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Stworz rozgrywki</button>
                @method('POST')
                @csrf
            </form>

            @else
            <form method="GET" action="{{route('competitions.add')}}">
                <div class="form-row">
                    <div class="col form-group">
                        <label for="league">Wybierz rodzaj ligi 1</label>
                        <select class="form-control @error('league') is-invalid @enderror" id="league" name="league">
                            <option>business</option>
                            <option>weekend</option>
                            <option>kid</option>
                        </select>
                        @error('league')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col form-group">
                        <label for="league">Wybierz poziom ligowy</label>
                        <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                        <small id="levelHelp" class="form-text text-muted">1 Oznacza Najwyzsza klasę rozgrywkowa</small>
                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="date">Dzień Startu rozgrywek</label>
                    <input type="date" name="date" class="form-control" id="date" aria-describedby="date">
                    <small id="dateHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> -->
                <button type="submit" class="btn btn-primary">Pokaz druzyny</button>
                @method('GET')
                @csrf
            </form>
            @endif
        </div>
    </div>
</div>

@endsection