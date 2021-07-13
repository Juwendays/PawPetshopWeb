<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/css/style1.css') }}">

    <link href="{{ asset('assets/starter/images/jateng1.png') }}" rel="icon" type="image/png">
    <!-- <link href="{{ asset('assets/starter/images/jateng1.png')}}" style="width:50px;height:50px" rel="shortcut icon"> -->

    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- google fonts -->
    <!-- <link href="//fonts.googleapis.com/css2?family=Jost:wght@300;400;600&display=swap" rel="stylesheet"> -->

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}" type="text/css" media="all" />

    <!-- fontawesome v5 -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <!-- fontawesome v5 -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
        <a href="{{ url('/')}}" class="navbar-brand navbar-link"><img src="{{ asset('assets/starter/images/logo-new.png') }}"></a>
  </nav>
  <!-- navbar -->

  @yield('container')

  
            <!-- copyright -->
            <div class="copy-right">
                <p>© Copyright Pemerintah Provinsi Jawa Tengah. All Rights Reserved &copy; 2020 <a href="/"
                        target="_blank">| Web Sistem Test Mandiri Covid-19</a></p>
            </div>
            <!-- //copyright -->
        </div>
    </section>

</body>

</html>