<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mb-4">
        @include('layouts.menu');
    </div>
    <div class="container" style="margin-top: 80px">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/assets/js/vendor/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>

    @yield('script')
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://v4-alpha.getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
    @include('layouts.menu')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Export</a>
            </li>
            </ul>

            <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a class="nav-link" href="#">Nav item</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Another nav item</a>
            </li>
            </ul>

            <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Another nav item</a>
            </li>
            </ul>
            </nav>

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('vendor/bootstrap/assets/js/vendor/jquery-3.2.1.js') }}"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://v4-alpha.getbootstrap.com/dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>
 --}}
