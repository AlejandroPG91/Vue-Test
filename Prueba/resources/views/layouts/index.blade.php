<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Travel</title>

</head>
<body>

  <div id="app">

    @include('layouts.header')

    <section class="section">
      <div class="container">

        <router-view></router-view>

      </div>
    <section>

  </div>


  @yield('content')

  <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
  </script>

  <!-- Scripts -->
  <script src="/js/app.js"></script>
</body>
</html>
