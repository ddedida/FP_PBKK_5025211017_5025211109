<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clasement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Premiere</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">League</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Fantasy</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Football & Community
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" >About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" >More</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" >Transfer</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <ul class="nav nav-underline p-3">
        <li class="nav-item p-2">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="#">Fixtures</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href="#">Results</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Tables</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Transfers</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Stats</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>News</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Video</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Watch Live</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Clubs</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Players</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link" href='#'>Award</a>
        </li>
      </ul>

      <div class="bg-primary text-white my-3 p-3 align-items-lg-center" style="height: 175px;">
        <h1 class="fw-bold fs-1 my-5">Tables</h1>
      </div>

      <div class="table-responsive small col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Player Name</th>
              <th scope="col">Position</th>
              <th scope="col">Nationality</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($players as $player)
            <tr>
              <td>{{ $player->playername }}</td>
              <td>{{ $player->position }}</td>
              <td>{{ $player->nationality }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>