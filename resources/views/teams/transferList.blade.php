@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row pt-2">
        <div class="col">
            <h3 class="text-center"> Lista Transferowa </h3>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-lg-8 col-sm-12">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-lg-4 col-sm">

            <div class="card text-white text-center bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header ">Zagraj w Jomafive!</div>
                <div class="card-body">
                    <h5 class="card-title">Zapisz się na listę transferową</h5>
                    <p class="card-text">Nie masz druzyny? Zostaw swoje dane, a administrator rozgrywek pomoze Ci znaleźć zespół</p>
                </div>
                <form method="POST" action="{{route('player.transferList') }}">
                    <div class="mb-3 px-3">
                        <label for="name" class="form-label">Imię</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="mb-3 px-3">
                        <label for="surname" class="form-label">Nazwisko</label>
                        <input type="text" class="form-control" name="surname" id="surname">
                    </div>

                    <div class="mb-3 px-3">
                        <label for="yearOfBirth" class="form-label">Rok Urodzenia</label>
                        <input type="number" class="form-control" name="yearOfBirth" id="yearOfBirth">
                    </div>

                    <input type="text" hidden name="teamName" id="teamName" value="transferList">
                    <input type="number" hidden name="teamID" value="0">

                    <button type="submit" class="btn mb-2 btn-primary">Wpisz się na listę transferową</button>
                    @csrf
                </form>


            </div>
        </div>


    </div>


    @endsection