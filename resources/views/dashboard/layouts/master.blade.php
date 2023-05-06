<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','decument')</title>

	{{-- include css link --}}
	@include('../dashboard/layouts.style')
</head>
<body>
    
    <div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
		{{-- inlude navbar --}}
		@include('../dashboard/layouts.navbar')

		{{-- inlude sidebar --}}
		@include('../dashboard/layouts.sidebar')

		{{-- content of page --}}
		@yield('content')
	</div>

	{{-- include js script --}}
    @include('../dashboard/layouts.script')
	@yield('script')
	<script>
		setInterval(function() {
			$("#dropdownMenu3").load(window.location.href + " #dropdownMenu3");
			$("#notification2").load(window.location.href + " #notification2");
		}, 5000);
	</script>
</body>
</html>