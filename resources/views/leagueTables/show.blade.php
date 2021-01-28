@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Zespół</th>
            <th scope="col">PLD</th>
            <th scope="col">W</th>
            <th scope="col">D</th>
            <th scope="col">L</th>
            <th scope="col">PKT</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i=0; $i++
        @endphp
        @foreach ($teams as $team)
        <tr>
            <th scope="row"> {{$i}} </th>
            <td>{{$team->teamName}}</td>
            <td>{{$team->games}}</td>
            <td>{{$team->wins}}</td>
            <td>{{$team->draws}}</td>
            <td>{{$team->losts}}</td>
            <td>{{$team->points}}</td>
        </tr>
        @php
         $i++
        @endphp
        @endforeach
    </tbody>
</table>

@endsection