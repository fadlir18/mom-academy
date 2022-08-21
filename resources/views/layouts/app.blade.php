<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta name="description" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mom Academy</title>
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<!-- Place favicon.ico in the root directory -->
	<link rel="stylesheet" href="{{ asset('css/vendor.css')}}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="{{ asset('css/main.css')}}">
	<script src="{{ asset('scripts/modernizr.js') }}"></script>
	<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-iOJZYodr3aj53jbf"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<style>
		.mnn::after {
			display: none !important;
		}

		.select-hd {
			display: none
		}
	</style>
</head>

<body>
	<div id="wrapper">
		<div id="top-desktop">
			<div class="orange-top">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-md-6">
							<div class="d-flex justify-content-end align-items-center">
								@if (AppHelper::getAuth())
								<div class=" pr-2 text-center">
									<div class="btn-group">
										<div class="user pr-2 ">
											<a class="dropdown-toggle mnn" data-toggle="dropdown" aria-expanded="true"
												href="#">
												<img src="{{ asset('images/ico-user.png') }}" alt="" class="img-fluid">
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{ url('logout') }}" class="dropdown-item">Logout</a>
											</div>
										</div>
									</div>
									<span class="white-color" style="color: #ffffff">{{
										ucwords(strtok(AppHelper::getAuth('user_name'), ' ')) }}</span>
								</div>
								@else
								<div class="user pr-2"><a data-dismiss="modal" data-toggle="modal" href="#modalLogin">
										<img src="{{ asset('images/ico-user.png') }}" alt="" class="img-fluid"></a>
								</div>
								<div class="act-link pr-2 text-center"><a data-toggle="modal"
										data-target="#modalRegist">Join MoMA</a></div>
								@endif
								<form class="searchbar">
									<input type="search" placeholder="Search here" name="search" class="searchbar-input"
										onkeyup="buttonUp();" required>
									<input type="submit" class="searchbar-submit" value="GO">
									<span class="searchbar-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="after-orange-top">
				<div class="container">
					<div class="top-wrapper d-flex py-3">
						<div class="logo"><a href="{{ url('/')}}"><img src="{{ asset('images/logo.png') }}" alt=""
									class="img-fluid"></a></div>
						<div class="menus d-flex align-items-center">
							<ul>
								<li class="mr-4 {{ Request::segment(1) == 'about-us' ? 'active' :'' }} ">
									<a href="{{ url('about-us') }}">About Us</a>
								</li>
								<li class="mr-4 {{ Request::segment(1) == 'class' ? 'active' :'' }}">
									<a href="{{ url('class') }}" class="nav-link link-hover dropdown-toggle p-0"
										id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">The Academy</a>
									<div class="dropdown-menu hover-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="/class?category=class">Kelas</a>
										<a class="dropdown-item" href="/class?category=module">Module</a>
										<a class="dropdown-item" href="/class/scolarship">Scholarship</a>
										<a class="dropdown-item" href="/class/expert">Expert</a>

									</div>
								</li>
								<li class="mr-4 {{ Request::segment(1) == 'get-income' ? 'active' :'' }} "><a
										href="{{ url('get-income') }}">Get Income</a></li>
								<li class="mr-4 {{ Request::segment(1) == 'events' ? 'active' :'' }} "><a
										href="{{ url('events') }}">Events</a></li>
								<li class="mr-4 {{ Request::segment(1) == 'articles' ? 'active' :'' }} "><a
										href="{{ url('articles') }}">Article</a></li>
								<li class="mr-4 {{ Request::segment(1) == 'market-day' ? 'active' :'' }} "><a
										href="{{ url('market-day') }}">Market Day</a></li>
								{{-- @if (!AppHelper::getAuth())
								<li class="mr-4 "><a data-toggle="modal" data-target="#modalRegist">Join Us</a></li>
								@endif --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="top-mobile">
			<nav class="navbar navbar-expand-lg orange-top">
				<button class="navbar-toggler p-0" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<i class="fas fa-bars text-white"></i>
				</button>
				<div class="d-flex justify-content-end align-items-center">
					@if (AppHelper::getAuth())
					<div class=" pr-2 text-center">
						<div class="btn-group">
							<div class="user pr-2 ">
								<a class="dropdown-toggle mnn" data-toggle="dropdown" aria-expanded="true" href="#">
									<img src="{{ asset('images/ico-user.png') }}" alt="" class="img-fluid">
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="{{ url('logout') }}" class="dropdown-item">Logout</a>
								</div>
							</div>
						</div>
						<span class="white-color" style="color: #ffffff">{{
							ucwords(strtok(AppHelper::getAuth('user_name'), ' ')) }}</span>
					</div>
					@else
					<div class="user pr-2"><a data-dismiss="modal" data-toggle="modal" href="#modalLogin">
							<img src="{{ asset('images/ico-user.png') }}" alt="" class="img-fluid"></a>
					</div>
					<div class="act-link pr-2 text-center"><a data-toggle="modal" data-target="#modalRegist">Join
							MoMa</a></div>
					@endif
				</div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link text-white" href="index.html">Home <span
									class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown mr-4 {{ Request::segment(1) == 'class' ? 'active' :'' }}">
							<a href="{{ url('class') }}" class="nav-link text-white dropdown-toggle p-0"
								id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">The Academy</a>
							<div class="dropdown-menu hover-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="/class?category=class">Class</a>
								<a class="dropdown-item" href="/class?category=module">Module</a>
								<a class="dropdown-item" href="/class/scolarship">Scholarship</a>
								<a class="dropdown-item" href="/class/expert">Expert</a>

							</div>
						</li>
						<li class="mr-4 nav-item {{ Request::segment(1) == 'get-income' ? 'active' :'' }} ">
							<a class="nav-link text-white" href="{{ url('get-income') }}">Get Income</a>
						</li>
						<li class="mr-4 nav-item {{ Request::segment(1) == 'events' ? 'active' :'' }} ">
							<a class="nav-link text-white" href="{{ url('events') }}">Events</a>
						</li>
						<li class="mr-4 nav-item {{ Request::segment(1) == 'articles' ? 'active' :'' }} ">
							<a class="nav-link text-white" href="{{ url('articles') }}">Article</a>
						</li>
						<li class="mr-4 nav-item {{ Request::segment(1) == 'market-day' ? 'active' :'' }} ">
							<a class="nav-link text-white" href="{{ url('market-day') }}">Market Day</a>
						</li>

					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-danger my-3 my-sm-0 text-white border-white"
							type="submit">Search</button>
					</form>
				</div>
			</nav>
		</div>

		@yield('content')

		<div id="bottom">
			<div class="container">
				<div class="d-flex justify-content-between py-4">
					<div class="block">
						<img src="/images/logo-footer.png" alt="" class="img-fluid">
					</div>
					<div class="block">
						<img src="/images/logo-fab.png" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Regist -->
	<div class="modal fade form-popup" id="modalRegist">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-0">
					<div class="text-center w-100"><img src="images/logo.png" alt="" class="img-fluid"></div>
				</div>
				<div class="modal-body px-md-5">
					<h4 class="title">Register</h4>
					<div class="sso mb-3">
						{{-- <a href="{{ url('auth/facebook') }}">
							<img src="images/btn-fb.png" alt="" class="img-fluid">
						</a> --}}
					</div>
					<div class="sso mb-3">
						<a href="{{ url('auth/google') }}">
							<img src="images/btn-google.png" alt="" class="img-fluid">
						</a>
					</div>
					<div class="wrapper-oblock position-relative text-center mb-3">
						<div class="oblock px-3">atau</div>
					</div>
					<form action="" class="form-regist" id="registerForm" content="{{ csrf_token() }}">

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nama Depan" name="name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nama Belakang" name="lastname">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Alamat Email" name="email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nomor Ponsel" name="phone">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="*Konfirmasi Password"
								name="password_confirmation">
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck1">
								<label class="form-check-label" for="gridCheck1">
									Saya telah <span>membaca dan mengerti</span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck2">
								<label class="form-check-label" for="gridCheck2">
									Saya menerima <span>kebijakan privasi</span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck3">
								<label class="form-check-label" for="gridCheck3">
									Saya tertarik mendapatkan kabar, informasi, diskon dari Mothers on Mission
								</label>
							</div>
						</div>
						<div class="form-group">
							<button class="text-uppercase text-white font-weight-bold border-0 w-100 btn-submit-popup"
								type="submit">Daftar sekarang</button>
							<div class="d-flex justify-content-center btn-spinner-login">

							</div>
						</div>
						<div class="form-group alert">
							{{-- <div class="alert alert-danger">error</div> --}}
						</div>
						<div class="form-group">
							<div data-dismiss="modal" data-toggle="modal" href="#modalLogin">Sudah punya akun? <span color: "#0491f9;">Masuk</span>!
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Login -->
	<div class="modal fade form-popup pb-5" id="modalLogin">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-0">
					<div class="text-center w-100"><img src="images/logo.png" alt="" class="img-fluid"></div>
				</div>
				<div class="modal-body px-md-5">
					<h4 class="title">Login</h4>
					<div class="sso mb-3">
						{{-- <a href="{{ url('auth/facebook') }}">
							<img src="images/btn-fb.png" alt="" class="img-fluid">
						</a> --}}
					</div>
					<div class="sso mb-3">
						<a href="{{ url('auth/google') }}">
							<img src="images/btn-google.png" alt="" class="img-fluid">
						</a>
					</div>
					<div class="wrapper-oblock position-relative text-center mb-3">
						<div class="oblock px-3">atau</div>
					</div>
					<form action="" class="form-regist" method="POST" id="loginForm" content="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<button class="text-uppercase text-white font-weight-bold border-0 w-100 btn-submit-popup"
								type="submit">Next</button>
							<div class="d-flex justify-content-center btn-spinner-login">

							</div>
						</div>
						<div class="form-group alert">
							{{-- <div class="alert alert-danger">error</div> --}}
						</div>
						<div class="form-group">
							<div class="" data-dismiss="modal" data-toggle="modal" href="#modalRegist">Belum punya akun?
								<span class="color: #0491f9;">Yuk Daftar!</span></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{-- modal alert --}}

	<!-- Modal -->
	<div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					{{-- <h5 class="modal-title" id="exampleModalLabel" style="margin: 0 auto"></h5> --}}
					{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> --}}
				</div>
				<div class="modal-body text-center">
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Anda belum Login!</strong><br> Silahkan login untuk melanjutkan.
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-footer text-center">
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Income -->
	<div class="modal fade form-popup" id="modalIncome">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header border-0">
					<div class="text-center w-100"><img src="images/logo.png" alt="" class="img-fluid"></div>
				</div>
				<div class="modal-body px-md-5">
					<h4 class="title">Register Income</h4>
					<form action="" class="form-regist" id="incomeForm" content="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nama" name="name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Alamat Email" name="email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nomor WhatsApp" name="phone">
						</div>
						<div class="form-group">
							<input type="input" class="form-control" placeholder="Tanggal Lahir" id="inputDate"
								name="birthdate">
						</div>
						<div class="form-group">
							{{-- <input type="password" class="form-control" placeholder="Alamat" name="address"> --}}
							<textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Kota" name="city">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Provinsi" name="province">
						</div>
						<div class="form-group">
							{{-- <input type="text" class="form-control" placeholder="Provinsi" name="province"> --}}
							<select name="apply_as" class="form-control">
								<option value="">Daftar Sebagai</option>
								<option value="momfluencer">MomFluencer</option>
								<option value="momblogger">MomBlogger</option>
								<option value="momfreelancer">MomFreelancer</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Instagram" name="link_ig">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Facebook" name="link_fb">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Tiktok" name="link_tiktok">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Twitter" name="link_twitter">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Youtube" name="link_youtube">
						</div>
						<div class="form-group">
							<select name="category" class="form-control">
								<option value="">Category</option>
								<option value="parenting">Parenting</option>
								<option value="beauty">Beauty</option>
								<option value="kuliner">Kuliner</option>

								<option value="kesehatan">Kesehatan</option>
								<option value="others">Kategori lain</option>
							</select>
						</div>
						<div class="form-group select-hd">
							<input type="text" class="form-control" placeholder="Category Lain" name="category2">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Pekerjaan Terakhir" name="current_job">
						</div>
						<div class="form-group">
							<button class="text-uppercase text-white font-weight-bold border-0 w-100 btn-submit-popup"
								type="submit">Daftar sekarang</button>
							<div class="d-flex justify-content-center btn-spinner-login"></div>
						</div>
						<div class="form-group alert">
							{{-- <div class="alert alert-danger">error</div> --}}
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function (b, o, i, l, e, r) {
			b.GoogleAnalyticsObject = l;
			b[l] || (b[l] =
				function () {
					(b[l].q = b[l].q || []).push(arguments)
				});
			b[l].l = +new Date;
			e = o.createElement(i);
			r = o.getElementsByTagName(i)[0];
			e.src = 'https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e, r)
		}(window, document, 'script', 'ga'));
		ga('create', 'UA-XXXXX-X');
		ga('send', 'pageview');
	</script>
	<script src="{{ asset('scripts/vendor.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
	<script src="{{ asset('scripts/main.js') }}"></script>
	<script src="{{ asset('scripts/ajax.js') }}"></script>
	<script>
		//   $('#modalIncome').modal('show')
		$('#inputDate').datepicker({});
	</script>

	<script>
		$(function () {
			$('.link-hover').hover(function () {
				$('.hover-menu').addClass('show');
			});
			$('.hover-menu').hover(function () {
				$(this).addClass('show');
			},
				function () {
					$(this).removeClass('show');
				});
		});
	</script>
</body>

</html>