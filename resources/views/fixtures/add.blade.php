@extends('layouts.app')

@section('title', 'Tworzenie Terminarzy')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{route('fixtures.store')}}">
                <div class="form-group">
                    <label for="competition">Wybierz Rozgrywki</label>
                    <select class="form-control" id="competition" name="competition">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="startDate">Data pierwszej kolejki</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" aria-describedby="emailHelp" placeholder="">
                </div>

                <div class="form-group">
                    <label for="startTime">godzina pierwszej kolejki</label>
                    <input type="time" class="form-control" id="startTime" name="startTime" aria-describedby="emailHelp" placeholder="">
                </div>

                <div class="form-group">
                    <label for="fields">Wybierz Liczbe boisk</label>
                    <select class="form-control" id="fields" name="fields">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Generuj Terminarz</button>
                @csrf
                @method('POST')
            </form>
        </div>
    </div>

</div>

@endsection