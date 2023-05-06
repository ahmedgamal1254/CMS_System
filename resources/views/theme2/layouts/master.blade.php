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
  <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
  <link href="{{ asset('style1/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('style1/css/blog-post.css') }}" rel="stylesheet">
</head>
<body>
  @include('../theme2/layouts.nav')

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

  <footer class="bg-gray-900">	
		<div class="container max-w-6xl mx-auto flex items-center px-2 py-2">
			<div class="w-full mx-auto flex flex-wrap items-center">
				<div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
					<a class="text-gray-900 no-underline hover:text-gray-900 hover:no-underline" href="#">
						👻 <span class="text-base text-gray-200"> Blog Publisher</span>
					</a>
				</div>
				<div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
					<ul class="list-reset flex justify-center flex-1 md:flex-none items-center">
					  <li>
              <a class="inline-block py-2 px-3 text-white no-underline" href="{{ route('home') }}">Blog</a>
					  </li>
            @foreach ($page as $item)
              <li>
                <a class="inline-block py-2 px-3 text-white no-underline" href="{{ route('page_single',$item->id) }}">{{ $item->name }}</a>
              </li>
            @endforeach
            <li>
              <a class="inline-block py-2 px-3 text-white no-underline" href="{{ route('contact_us') }}">
                contact
              </a>
            </li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

  <script src="{{ asset('style1/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('style1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.avatar')
	</script>
</body>
</html>