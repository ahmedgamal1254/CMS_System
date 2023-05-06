<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog Post - Start Bootstrap Template</title>
  <link rel="stylesheet" href="{{ asset('style1/css/normalize.css') }}">
  <link href="{{ asset('style1/css/fontawsome/all.min.css') }}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('style1/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('style1/css/blog-post.css') }}" rel="stylesheet">
</head>
<body>
  @include('../theme1/layouts.nav')

  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              @yield('content')
          </div>
          <div class="col-lg-4">
              @include('../theme1/layouts.sidebar')
          </div>
      </div>
  </div>
  <!-- Bootstrap core JavaScript -->

  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Blog jannah 2025</p>
    </div>
    <!-- /.container -->
  </footer>

  <script src="{{ asset('style1/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('style1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>