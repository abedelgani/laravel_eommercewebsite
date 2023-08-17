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
                    {{--  <form method="POST" action="/admin/commandes/search">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="etat" class="form-control" placeholder="faire le recherche par etat">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success">chercher</button>
                            </div>
                        </div>
                    </form>  --}}

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">n</th>
                            <th scope="col">nom client</th>
                            <th scope="col">email</th>
                            <th scope="col">objet</th>
                            <th scope="col">message</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $index=>$contact )

                          <tr>
                            <td scope="row">{{ $index+1 }}</td>
                            <td>{{ $contact->name }} </td>
                            <td>
                                {{ $contact->email }}
                            </td>
                            <td>{{ $contact->objet }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at }}</td>
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

    <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>

