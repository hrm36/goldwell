<!DOCTYPE html>
<html lang="en">
@include("font-end.partials.head")
@yield('css')
<body>
	<!--/Header-->
	@include("font-end.partials.header")
		@yield('content')
	@include("font-end.partials.footer")
	<!--/Footer-->
</body>
@include("font-end.partials.scripts")
@yield('js')
</html>