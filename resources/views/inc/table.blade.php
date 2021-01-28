<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Terminarz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Wyniki</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tabela</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    @include('inc.fixtures')
  </div>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    @include('inc.fixtures')
  </div>

  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        Tabela
        <table class="table table-striped table-hover caption-bottom">
          <caption>Liga {{$league ?? ''}} </caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Team</th>
              <th scope="col">PLD</th>
              <th scope="col">W</th>
              <th scope="col">D</th>
              <th scope="col">L</th>
              <th scope="col">PKT</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Barcelona</td>
              <td>10</td>
              <td>5</td>
              <td>4</td>
              <td>1</td>
              <td>19</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Real</td>
              <td>10</td>
              <td>4</td>
              <td>4</td>
              <td>2</td>
              <td>16</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Valencia</td>
              <td>10</td>
              <td>4</td>
              <td>4</td>
              <td>16</td>
              <td>16</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Valencia</td>
              <td>10</td>
              <td>4</td>
              <td>4</td>
              <td>16</td>
              <td>16</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
    
  </div>
</div>