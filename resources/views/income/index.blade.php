@extends('layouts.app')
@section('content')
<div class="main-content">
	<div id="banner-get-income" class="section pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-6">
					<div class="block p-3 rounded my-sm-5">
						<h1 class="title mt-4 pt-4 mb-2">Yuk dapatkan penghasilan tambahan melalui MoM Academy</h1>
						<div class="shortdesc">
							<p class="mb-0">Penasaran gimana caranya dapat penghasilan tambahan yang bisa flexibel? cari
								tahu caranya
							</p>
							<div class="more"><a href="#">disini</a></div>
						</div>
						<div class="register-btn mt-4">
							@if (AppHelper::getAuth())
							<a data-toggle="modal" data-target="#modalIncome" class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar</a>
							@else
							<a data-toggle="modal" data-target="#modalAlert" class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="freelancer" class="section py-5">
		<div class="container">
			<h1 class="title mb-3">Ingin seperti mereka?</h1>
			<div class="list-freelancer-wrapper">
				<div class="row">
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="block">
							<div class="img">
								<a class="d-block position-relative">
									<img src="{{ asset('images/shinta-destarina.png') }}" alt="" class="img-fluid">
									<div class="txt position-absolute p-4">
										<h4 class="text-white font-weight-bold text-uppercase">SOSIAL MEDIA SPESIALIS
										</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="block">
							<div class="img">
								<a class="d-block position-relative">
									<img src="{{ asset('images/tria.png') }}" alt="" class="img-fluid">
									<div class="txt position-absolute p-4">
										<h4 class="text-white font-weight-bold text-uppercase">DESAIN GRAFIS</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="block">
							<div class="img">
								<a class="d-block position-relative">
									<img src="{{ asset('images/katri.png') }}" alt="" class="img-fluid">
									<div class="txt position-absolute p-4">
										<h4 class="text-white font-weight-bold text-uppercase">CONTENT WRITER</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="block">
							<div class="img">
								<a class="d-block position-relative">
									<img src="{{ asset('images/femy.png') }}" alt="" class="img-fluid">
									<div class="txt position-absolute p-4">
										<h4 class="text-white font-weight-bold text-uppercase">PROJECT LEADER</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="block">
							<div class="img">
								<a class="d-block position-relative">
									<img src="{{ asset('images/elga-momfluencer.png') }}" alt="" class="img-fluid">
									<div class="txt position-absolute p-4">
										<h4 class="text-white font-weight-bold text-uppercase">INFLUENCER</h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 mb-3">
						<div class="box bg-orange d-flex align-items-center p-4 h-100">
							<h4 class="text-white">
								Yuk, kenali profesi mereka lebih jauh lagi
								@if (AppHelper::getAuth())
								<a data-toggle="modal" data-target="#modalRegist" class="text-uppercase text-white font-weight-bold mt-4 d-block">DAFTAR SEKARANG</a>
								@else
								<a data-toggle="modal" data-target="#modalAlert" class="text-uppercase text-white font-weight-bold mt-4 d-block">DAFTAR SEKARANG</a>
								@endif
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="income2" class="section py-5">
		<div class="container">
			<div class="d-none d-sm-block">
				<div class="row mb-5">
					<div class="col-md-3">
						<div class="block">
							<h4 class="subtitle text-center mb-4 font-weight-bold">MoMReseller</h4>
							<div class="img container-momfreelancer"><img src="{{ asset('images/MomReseller.jpg') }}" alt="" class="img-fluid img-momfreelancer" style="border-radius: 20px;">
								<div class="overlay-momfreelancer">
									<div class="text-momfreelancer">Mom bebas memilih produk yang ingin di jual, sehingga bisa menentukan pendapatannya sendiri.</div>
								</div>
							</div>
							<div class="list-wrapper">
								<ul class="pl-3">
									<li>Tentukan pendapatanmu sendiri</li>
									<li>Temukan Klien yang cocok untukmu</li>
									<li>Dapatkan pemasukan mingguan hingga bulanan</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<h4 class="subtitle text-center mb-4 font-weight-bold">MoMFluencer</h4>
							<div class="img container-momfreelancer"><img src="{{ asset('images/MomFluencer.jpg') }}" alt="" class="img-fluid img-momfreelancer" style="border-radius: 20px;">
								<div class="overlay-momfreelancer">
									<div class="text-momfreelancer">Dapatkan penghasilan tambahan dengan menjadi influencer MoM. </div>
								</div>
							</div>
							<div class="list-wrapper">
								<ul class="pl-3">
									<li>Membuat konten sesuai project yang sudah di tentukan</li>
									<li>Mengikuti arahan/brief dari Brand</li>
									<li>Memberikan report/insight setelah campaign</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<h4 class="subtitle text-center mb-4 font-weight-bold">MoMFreelancer</h4>
							<div class="img container-momfreelancer"><img src="{{ asset('images/MomFreelancer.jpg') }}" alt="" class="img-fluid img-momfreelancer" style="border-radius: 20px;">
								<div class="overlay-momfreelancer">
									<div class="text-momfreelancer">Memiliki kemampuan di bidang digital marketing, blogger, project leader, social media dan desain grafis. Yuk, gabung di MoMFreelancer!</div>
								</div>
							</div>
							<div class="list-wrapper">
								<ul class="pl-3">
									<li>Apply Project</li>
									<li>Menemukan klien yang cocok</li>
									<li>Mendapatkan income mingguan hingga bulanan</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<h4 class="subtitle text-center mb-4 font-weight-bold">MoMTalent</h4>
							<div class="img container-momfreelancer"><img src="{{ asset('images/MomTalent.jpg') }}" alt="" class="img-fluid img-momfreelancer" style="border-radius: 20px;">
								<div class="overlay-momfreelancer">
									<div class="text-momfreelancer">Bisa akting, percaya diri di depan kamera, foto genik, ekspresif. Yuk, join sebagai MoMTalent!</div>
								</div>
							</div>
							<div class="list-wrapper">
								<ul class="pl-3">
									<li>Apply Project</li>
									<li>Menemukan klien yang cocok</li>
									<li>Mendapatkan income mingguan hingga bulanan</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row d-block d-sm-none">
				<div class="mobile-tabs mb-5">
					<div class="container">
						<ul class="nav nav-pills mb-3" id="testi-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase text-white font-weight-bold bg-transparent" id="testi-reseller-tab" data-toggle="pill" href="#testi-reseller" role="tab" aria-controls="testi-reseller" aria-selected="true">mom reseller</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase text-white font-weight-bold bg-transparent" id="testi-influencer-tab" data-toggle="pill" href="#testi-influencer" role="tab" aria-controls="testi-influencer" aria-selected="false">mom influencer</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase text-white font-weight-bold bg-transparent" id="testi-freelancer-tab" data-toggle="pill" href="#testi-freelancer" role="tab" aria-controls="testi-freelancer" aria-selected="false">mom freelancer</a>
							</li>
						</ul>
						<div class="tab-content" id="testi-tabContent">
							<div class="tab-pane fade show active" id="testi-reseller" role="tabpanel" aria-labelledby="testi-reseller-tab">
								<div class="img mb-4 text-center"><img src="{{ asset('images/img-income-1.png') }}" alt="" class="img-fluid"></div>
								<div class="button-wrapper text-center">
									<div class="button d-inline-block">
										<a href="#" class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center">daftar</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="testi-influencer" role="tabpanel" aria-labelledby="testi-influencer-tab">
								<div class="headline mb-4 text-white text-center">
									<p>Dapatkan penghasilan tambahan dengan menjadi influencer MoM. Klik untuk info
										lebih lanjut</p>
								</div>
								<div class="button-wrapper text-center">
									<div class="button d-inline-block">
										<a href="#" class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center">daftar</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="testi-freelancer" role="tabpanel" aria-labelledby="testi-freelancer-tab">
								<div class="img mb-4 text-center"><img src="{{ asset('images/img-income-2.png') }}" alt="" class="img-fluid"></div>
								<div class="button-wrapper text-center">
									<div class="button d-inline-block">
										<a href="#" class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center">daftar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="step-wrapper" class="section py-5">
		<div class="container">
			<h1 class="font-weight-bold mb-5">Langkah Mudah Menjadi Freelancer kami</h1>
			<div class="row">
				<div class="col-md-6 col-lg-3 mb-4">
					<div class="block">
						<div class="img"><img src="{{ asset('images/step-1.png') }}" alt="" class="img-fluid"></div>
						<h4 class="font-weight-bold my-3">Gabung sekarang</h4>
						<div class="shortdesc">
							<p>Daftar sebagai freelancer kami dengan apply di project yang diinginkan</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<div class="block">
						<div class="img"><img src="{{ asset('images/step-2.png') }}" alt="" class="img-fluid"></div>
						<h4 class="font-weight-bold my-3">Posting Pekerjaan dan tetap terhubung</h4>
						<div class="shortdesc">
							<p>Siapkan portofolio dengan informasi pekerjaan</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<div class="block">
						<div class="img"><img src="{{ asset('images/step-3.png') }}" alt="" class="img-fluid"></div>
						<h4 class="font-weight-bold my-3">Bekerja Tanpa Khawatir</h4>
						<div class="shortdesc">
							<p>Informasikan data (setelah bekerja sama) sesuai kebutuhan tim finance untuk verifikasi
								proses
								pembayaran</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4">
					<div class="block">
						<div class="img"><img src="{{ asset('images/step-4.png') }}" alt="" class="img-fluid"></div>
						<h4 class="font-weight-bold my-3">Terima Uangnya</h4>
						<div class="shortdesc">
							<p>MoMA akan transfer fee ke nomor rekening yang sudah terdaftar setelah pekerjaan selesai
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				@if (AppHelper::getAuth())
				<div class="register-btn text-center mt-4"><a data-toggle="modal" data-target="#modalIncome" class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar
						Sekarang</a></div>
				@else
				<div class="register-btn text-center mt-4"><a data-toggle="modal" data-target="#modalAlert" class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar
						Sekarang</a></div>
				@endif
			</div>
		</div>
	</div>

	<!-- 
        <div id="headline2" class="section py-5">
            <div class="container">
                <h1 class="font-weight-bold mb-5 text-center">Siap Untuk Bergabung Bersama Kami?</h1>
                @if (AppHelper::getAuth())
                <div class="register-btn text-center mt-4"><a data-toggle="modal" data-target="#modalIncome"
                        class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar
                        Sekarang</a></div>
                @else
                <div class="register-btn text-center mt-4"><a data-toggle="modal" data-target="#modalAlert"
                        class="text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase">Daftar
                        Sekarang</a></div>
                @endif
            </div>
        </div>
     -->
	<div id="get-intouch" class="section py-5">
		<div class="container">
			<h1 class="font-weight-bold mb-4">Get In Touch</h1>
			<div class="row">
				<div class="col-md-6">
					<div class="block bg-white rounded">
						<form>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" readonly class="form-control-plaintext" id="">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control-plaintext" id="" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<textarea name="" id="" rows="3" class="form-control" placeholder="tulis pesanmu"></textarea>
							</div>
							<div class="button-wrapper mt-4">
								<button type="submit" class="btn btn-primary text-uppercase text-white link-gradient rounded-pill border-0 font-weight-bold">Kirim</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-column d-flex align-items-center h-100 mt-4 mt-sm-0">
						<ul>
							<li class="wa"><a href="https://web.whatsapp.com/" target="_blank">Admin Moma</a></li>
							<li class="location">Jl Lamandau No 10 Kramat Pela, Kebayoran Baru <br>Jakarta Selatan</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@Stop