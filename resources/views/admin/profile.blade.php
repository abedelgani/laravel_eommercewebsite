<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>profile</title>
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
                    <h2>modification profile</h2>
                    @include('inc.flash-message')
                    <hr>
                <form action="/admin/profile/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>nom utilisateur</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" placeholder="new password">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">changer</button>
                    </div>

                </form>
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
