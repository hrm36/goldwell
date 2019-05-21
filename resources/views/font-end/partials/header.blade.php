<header id="header" class="site-header">
	<div class="container">
		<div class="col-md-4">
			<div class="list-social">
				<ul>
					<li>
						<a href="{{$info_s['url_facebook']}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="{{$info_s['url_ins']}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="{{$info_s['url_you']}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-4">
			<div class="logo">
				<h1>
					<a href="{{route('homepage')}}">
						<img src="{{$info_s['logo']}}" alt="">
					</a>
				</h1>
			</div>
		</div>
		<!-- <div class="col-md-4">
			<div class="search">
				<span style="margin-right: 10px; ">Search</span><i class="fa fa-search" aria-hidden="true"></i>
			</div>
		</div> -->
		<div class="nav-navigation">
			<ul class="center main-nav">
				<li class="spacer navbar-inner">
					<a href="{{route('homepage')}}">Trang chủ</a>
				</li>
				<li class="spacer navbar-inner">
					<a href="{{route('news')}}">Tin tức & sự  kiên</a>
				</li>
				<li class="spacer navbar-inner">
					<a href="{{route('brand')}}">Thương hiệu</a>
				</li>
				<li class="spacer navbar-inner">
					<a href="{{route('color')}}">COLOR ZOOM 2019</a>
				</li>
				<li class="spacer navbar-inner subnavi"><a href="{{route('categories')}}">Sản phẩm</a>
				</li>
				<li class="spacer navbar-inner">
					<a href="{{route('gallery-font-end')}}">Bộ sưu tập</a>
				</li>
				<li class="spacer navbar-inner">
					<a href="{{route('video')}}">Videos</a>
				</li>
			</ul>
		</div>
	</div>
</header>