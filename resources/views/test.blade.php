@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ url('/import_excel/import') }}" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="file" class="form-control" name="select_file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gospodarze</th>
                    <th scope="col">Goście</th>
                    <th scope="col">wynik</th>
                    <th scope="col">Grupa</th>
                    <th scope="col">boisko</th>
                    <th scope="col">data</th>                    
                </tr>
            </thead>
            <tbody>
               @foreach($data as $row)
               <tr>
                    <th scope="row">1</th>
                    <td>{{$row->hosts}}</td>
                    <td>{{$row->visitors}}</td>
                    <td>{{$row->hosts_goals}}:{{$row->visitors_goals}}</td>
                    <td>{{$row->group}}</td>
                    <td>{{$row->pitch}}</td>
                    <td>{{$row->date}}</td>
                    <td>{{$row->hour}}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection