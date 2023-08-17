<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
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
                    <a class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#verticallyCentered" >ajouter produit</a>
                    <br>
                    <br>
                    {{--  pour chercher un produit  --}}
                    <form action="/admin/produit/search" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control md-4" name="produit_name" placeholder="tapper nom de produit" >
                            </div>
                            <div class="col-5">
                                <input type="number" class="form-control" placeholder="chercher par quantite" name="qte" min="0">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-outline-primary">chercher</button>
                            </div>
                        </div>
                    </form>
                    {{--  fin  --}}

                      <h4 class="mt-4 mb-3">liste produits</h4>
                      <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</th>
                            <th scope="col">description</th>
                            <th scope="col">prix</th>
                            <th scope="col">quantite</th>
                            <th scope="col">photo</th>
                            <th scope="col">action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $index=>$p )
                          <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $p->nom }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->qte }}</td>
                            <td>
                                <img src="{{ asset('uploads') }}/{{ $p->photo }}" width="100" height="100">
                            </td>
                            <td>
                                <a  class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editproduit{{ $p->id }}">modifier</a>
                                <a href="/admin/produit/{{ $p->id }}/delete"  onclick="return confirm('voullez vous supprimer ce produit {{ $p->nom }}')"  class="btn btn-outline-info">supprimer</a>
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

                      <div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="verticallyCenteredModalLabel">ajouter produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                            </div>
                            <div class="modal-body">
                             <form method="POST" action="/admin/addproduit" enctype="multipart/form-data">
                                @csrf
                                <select class="form-control" name="categorie">
                                    @foreach ($categories as $c )
                                   <option value="{{ $c->id }}">{{ $c->nom }}</option>
                                   @endforeach
                                  </select>
                                <label>nom produit</label>
                                <input type="text" name="nom" class="form-control">
                                @error('nom')
                                  <div class="alert alert-danger">
                                    {{ $message }}
                                  </div>
                                @enderror
                                <label>desription</label>
                                <textarea type="text" name="description" class="form-control" rows="20" cols="20"></textarea>
                                @error('description')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div>
                                @enderror
                                <label>prix produit</label>
                                <input type="number" name="price" class="form-control">
                                @error('price')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div>
                                @enderror
                                <label>quantity produit</label>
                                <input type="number" name="qte" class="form-control">
                                @error('qte')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div>
                                @enderror
                                <label>photo produit</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">ajouter</button>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">annuler</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                      {{--  edit modal  --}}
                      @foreach ($produits as $index=>$p )
                      <div class="modal fade" id="editproduit{{ $p->id }}" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="verticallyCenteredModalLabel">ajouter produit</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                            </div>
                            <img src="{{ asset('uploads') }}/{{ $p->photo }}" width="150">
                            <div class="modal-body">
                             <form method="POST" action="/admin/produit/update" enctype="multipart/form-data">
                                @csrf
                                <select class="form-control" name="categorie">
                                    @foreach ($categories as $c )
                                   <option value="{{ $c->id }}">{{ $c->nom }}</option>
                                   @endforeach
                                  </select>
                                <label>nom produit</label>
                                <input type="text" name="nom" class="form-control" value="{{ $p->nom }}">
                                <label>desription</label>
                                <textarea type="text" name="description" class="form-control" rows="20" cols="20">{{ $p->description }}</textarea>
                                <label>prix produit</label>
                                <input type="number" name="price" class="form-control" value="{{ $p->price }}">
                                <label>quantity produit</label>
                                <input type="number" name="qte" class="form-control" value="{{ $p->qte }}">
                                <label>photo produit</label>
                                <input type="file" name="photo" class="form-control">
                                <input type="hidden" name="idproduit" value="{{ $p->id }}">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">modifier</button>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">annuler</button>
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
