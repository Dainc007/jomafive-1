@extends('layouts.app')

@section('title', 'Senior - Panel Tworzenia')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-6 offset-2">
            @if(!isset($numberOfPlayers))
            <form method="GET" action="{{route('teams.add')}}">
                <label for="ageGroup">Wybierz kategorię wiekową</label>
                <select class="form-control mb-1" id="ageGroup" name="ageGroup">
                    <option>senior</option>
                    <option>junior</option>
                </select>

                <input class="form-control" type="number" name="numberOfPlayers">
                <button type="submit" class="btn btn-secondary">Wprowadź liczbe piłkarzy</button>
                @method('GET')
                @csrf
            </form>
            @else
        </div>
    </div>

    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-adult-tab" data-toggle="pill" href="#pills-adult" role="tab" aria-controls="pills-adult" aria-selected="true">Dorośli</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-junior-tab" data-toggle="pill" href="#pills-junior" role="tab" aria-controls="pills-junior" aria-selected="false">Juniorzy</a>
        </li>
    </ul>


    <div class="container tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-adult">

            <div class="container bg-primary">

                <form method="POST" action="{{route('teams.store')}}" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group col-lg-6 ">
                            <label for="shield">Wybierz herb</label>
                            <input type="file" class="form-control" name="shield" id="shield" aria-describedby="shield" aria-label="Upload">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="teamPhoto">Wybierz Zdjecie Druzynowe</label>
                            <input type="file" class="form-control" name="teamPhoto" id="teamPhoto" aria-describedby="teamPhoto" aria-label="Upload">
                        </div>

                        <div class="form-group col">
                            <label class="text-center" for="teamName">Nazwa Druzyny</label>
                            <input type="text" class="form-control" name="teamName" id="teamName" aria-describedby="teamName" value="{{old('teamName')}}" placeholder="Nazwa Druzyny...">
                        </div>

                        <div class="col form-group">
                            <label for="league">Wybierz rodzaj ligi</label>
                            <select class="form-control @error('league') is-invalid @enderror" id="league" name="league">
                                <option>business</option>
                                <option>weekend</option>
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

                    <div class="form-row">
                        <div class="col-lg-12">
                            <h6 class="text-center">Dane Trenera</h6>
                        </div>
                        <div class="col">
                            <div class="form-group col">
                                <input type="text" class="form-control" name="managerName"   idaria-describedby="managerName" value="{{old('managerName')}}" placeholder="Imię...">
                            </div>

                            <div class="form-group col">
                                <input type="text" class="form-control" name="managerSurname"  aria-describedby="managerSurname" value="{{old('managerSurname')}}" placeholder="Nazwisko...">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group col">

                                <input type="email" class="form-control" name="email"  aria-describedby="email" placeholder="adres e-mail...">
                            </div>

                            <div class="form-group col">

                                <input type="number" class="form-control" name="phoneNumber"aria-describedby="phoneNumber" placeholder="numer telefonu">
                            </div>
                        </div>
                    </div>

                    <h4 class="text-center">Dodawanie Zawodników</h4>
                    <div class="d-flex flex-wrap justify-content-between">
                        @for ($i = 1; $i <= $numberOfPlayers; $i++) <div class="form-group text-center">
                            <label for="playerName">Zawodnik</label>
                            <input type="text" class="form-control" name="name[]" id="playerName" placeholder="Imię" value="{{old('playerName')}}">
                            <input type="text" class="form-control my-1" name="surname[]" id="playerSurname" placeholder="Nazwisko" value="{{old('playerSurname')}}">
                            <input type="number" class="form-control" name="yearOfBirth[]" id="playerYear" placeholder="Rocznik" value="{{old('playerYear')}}">
                    </div>
                    @endfor

                    <div class="form-group w-100">
                        <button type="submit" class="btn btn-secondary w-100" name="adult">Dodaj Druzyne</button>
                    </div>

                    @csrf
                </form>

            </div>

        </div>

    </div>

    <div class="tab-pane fade show" id="pills-junior">

        <div class="container bg-success">
            <form method="POST" action="{{route('teams.store')}} ">

                <div class="form-group mb-1 mt-1 py-1">
                    <label for="shield">Wybierz herb</label>
                    <input type="file" class="form-control" name="shield" id="shield" aria-describedby="shield" aria-label="Upload">
                </div>

                <div class="form-group mb-1 mt-1 py-1">
                    <label for="inputGroupFile04">Wybierz Zdjecie Druzynowe</label>
                    <input type="file" class="form-control" name="teamPhoto" id="teamPhoto" aria-describedby="teamPhoto" aria-label="Upload">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="teamName" id="teamName" aria-describedby="teamName" value="{{old('nickname')}}" placeholder="Przydomek, np Real Madryt...">
                </div>

                <div class="form-row">
                    <div class="col form-group">
                        <label for="class">Wybierz Rocznik</label>
                        <select class="form-control @error('league') is-invalid @enderror" id="class" name="class">
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
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

                <h4 class="text-center">Dodawanie Zawodników</h4>
                <div class="d-flex flex-wrap justify-content-between">
                    @for ($i = 1; $i <= $numberOfPlayers; $i++) <div class="form-group text-center">
                        <label for="playerName">Zawodnik</label>
                        <input type="text" class="form-control mb-1" name="players[]" id="playerName" placeholder="Imię" value="{{old('playerName')}}">
                        <input type="text" class="form-control" name="players[]" id="playerSurname" placeholder="Nazwisko" value="{{old('playerSurname')}}">
                </div>
                @endfor

                <div class="form-group w-100">
                    <button type="submit" class="btn btn-secondary w-100" name="junior">Dodaj Druzyne</button>
                </div>

                @csrf
            </form>

        </div>

    </div>

</div>


@endif
@endsection