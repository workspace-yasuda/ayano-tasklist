<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ToDo List</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <!-- Scripts -->
  <script src="{{ mix('js/_app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|Roboto:400">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="https://hypertext-candy.s3-ap-northeast-1.amazonaws.com/posts/vue-laravel-tutorial/app.css">


</head>

<body>


  <div class="container">
    <nav class="navbar navbar-default">

      <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}">
        ToDo List
        </a>
        Vue.jsは？
        <div id="vue_enabled"></div>

      </div>

    </nav>
  </div>

    @yield('content')

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

</body>
</html>
