<!DOCTYPE html>
<html lang="en">

<head>
    <title>INDEX</title>
    <base href="{{ asset('') }}" target="_blank, _self, _parent, _top">
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.8.1-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
</head>

<body>
   <!--  begin header -->
    <div class="container-fluid">
      @include('header')
    </div>
         <!--    end header -->
     	@yield('content')
        <!-- FOOTER -->
        @include('footer')
</body>

</html>