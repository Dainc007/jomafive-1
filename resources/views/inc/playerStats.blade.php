<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-goals-tab" data-toggle="pill" href="#pills-goals">Bramki</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-assists-tab" data-toggle="pill" href="#pills-assists">Asysty</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-canadian-tab" data-toggle="pill" href="#pills-canadian">Kanadyjskas</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-goals" role="tabpanel" aria-labelledby="pills-home-tab">Bramki
        <table class="table table-striped table-hover caption-bottom">
            <caption>Liga {{$league ?? ''}} </caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Player</th>
                    <th scope="col">Team</th>
                    <th scope="col">PLD</th>
                    <th scope="col">Scored</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Andrzej</td>
                    <td>KS Kosmokaczki</td>
                    <td>5</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Franek</td>
                    <td>KS Łowcy Bramek</td>
                    <td>5</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th scope="row">3</th>

                    <td>Michał</td>
                    <td>KS Inter Głogów</td>
                    <td>5</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-assists" role="tabpanel" aria-labelledby="pills-profile-tab">Asysty
        <table class="table table-striped table-hover caption-bottom">
            <caption>Liga {{$league ?? ''}} </caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Player</th>
                    <th scope="col">Team</th>
                    <th scope="col">PLD</th>
                    <th scope="col">Scored</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Andrzej</td>
                    <td>KS Kosmokaczki</td>
                    <td>5</td>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Franek</td>
                    <td>KS Łowcy Bramek</td>
                    <td>5</td>
                    <td>4</td>
                </tr>
                <tr>
                    <th scope="row">3</th>

                    <td>Michał</td>
                    <td>KS Inter Głogów</td>
                    <td>5</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-canadian" role="tabpanel" aria-labelledby="pills-contact-tab">Kanadyjska</div>
</div>