<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>dragstore</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <!-- sidebar -->
      @include('inc.admin.sidebar')
        <!-- navbar -->
        @include('inc.admin.navbar')

        <div class="content">
          <div class="pb-5">
            <div class="row g-5">
                <div class="container">
                    @include('inc.flash-message')
                      <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">ajouter categories</a>
                      <br>
                        <br>
                      <form action="/admin/categorie/search" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input type="text" name="nom" placeholder="taper nom categorie" class="form-control">
                            </div>
                            <div class="col-5">
                                <input type="text" name="description" placeholder="faire le recherche par description" class="form-control">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-outline-success">rechercher</button>
                            </div>

                        </div>


                      </form>

                        <h1 class="text-center">liste categorie</h1>
                        <hr>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</th>
                            <th scope="col">descritpion</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index=>$c )
                          <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $c->nom }}</td>
                            <td>{{ $c->description }}</td>
                            <td>
                                <a href="/admin/categorie/{{ $c->id }}/delete" class="btn btn-outline-danger" onclick="return confirm('vous voullez vraiment supprimer {{ $c->nom }}?')">supprimer</a>
                                <a  class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editcategorie{{ $c->id }}">modifier</a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>



                </div>


            </div>
          </div>



          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">

              </div>
              <div class="col-12 col-sm-auto text-center">

              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>

    {{--  ajout modal  --}}

                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">ajouter categorie</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                            </div>
                            <div class="modal-body">
                              <form action="/admin/addcategorie" method="post">
                                @csrf
                                <label>nom categorie</label>
                                <input type="text" name="nom" class="form-control">
                                @error('nom')
                                <div class="alert alert-outline-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label>description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                @error('description')
                                <div class="alert alert-outline-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit">ajouter</button>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">annuler</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>

                    @foreach ($categories as $index=>$c )

                      {{--  edit categorie  --}}
                      <div class="modal fade" id="editcategorie{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">modifier categorie :<span class="text-primary">{{ $c->nom }}</span></h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                            </div>
                            <div class="modal-body">
                              <form action="/admin/categorie/update" method="post">
                                @csrf
                                <label>nom categorie</label>
                                <input type="text" name="nom" class="form-control" value="{{ $c->nom }}">
                                @error('nom')
                                <div class="alert alert-outline-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label>description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $c->description }}</textarea>
                                @error('description')
                                <div class="alert alert-outline-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                          <input type="hidden" name="id_categorie" value="{{ $c->id }}">
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">ajouter</button>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                 @endforeach




    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>
