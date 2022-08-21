@extends('layouts.app')
@section('content')
<div id="about" class="section pb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <h1 class="title mt-4 pt-4 mb-2 d-block d-sm-none">About <span class="d-block">MoM Academy</span></h1>
        <div class="block p-3 rounded my-sm-5">
          <h1 class="title mb-4 d-none d-sm-block">About <span class="d-block">MoM Academy</span></h1>
          <div class="shortdesc">
            <p class="mb-3">MoM Academy (MoMA) komunitas yang dibina oleh Mothers on Mission, sebuah perusahaan yang fokus kepada pemberdayaan Ibu dan wanita. Berdirinya MoM Academy diharapkan ibu di Indonesia menjadi ibu yang produktif, sejahtera, dan bahagia. Komunitas di bawah naungan Mothers on Mission ini berkembang pesat hanya dalam satu tahun terakhir.</p>
            <p class="mb-0">Saat ini MoMA sudah memiliki lebih dari ribuan anggota yang tersebar di seluruh Indonesia serta Mancanegara dan terbagi dalam puluhan whatsapp group yang dikelola oleh para pengurus regional masing-masing area.

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="academy" class="section py-5">
  <div class="container">
    <h1 class="title text-center">Moms Behind MoM Academy</h1>
  </div>
</div>

<!-- <div id="expert" class="section py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="sliders-wrapper">
                <div class="slider multiple-items">
                    @if ($results)
							@foreach ($results as $row)														
								<div class="block text-center">
									<div class="img d-inline-block"><img src="https://zonderstudio.com/moma/public/img/mom/{{ $row->image }}" alt="" class="img-fluid"></div>
									<div class="after-img text-white mt-2">
										<div class="name">{{ $row->name }}</div>
                    <div class="job_name">{{ $row->job_name }}</div>

										<div class="position">{{ $row->quote }}</div>
										<div class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                      <a href="https://www.instagram.com/{{ $row->link_instagram }}" class="ig"><i class="fab fa-instagram"></i></a>
                      <a href="https://wa.me/{{ $row->whatsapp }}" class="wa"><i class="fab fa-whatsapp"></i></a>
                    </div>
									</div>
								</div>
							@endforeach						
						@endif	
                </div>
            </div>
        </div>
        </div>
    </div>
</div> -->

<div id="expert" class="section py-5">
  <div class="container">
    <div class="row justify-content-center">
      @if ($results)
      @foreach ($results as $row)
      <div class="col-md-4 p-5 pb-5">
        <div class="block text-center">
          <div class="img d-inline-block"><img src="https://zonderstudio.com/moma/public/img/mom/{{ $row->image }}" alt="" class="img-fluid"></div>
          <div class="after-img text-white mt-2">
            <div class="name">{{ $row->name }}</div>
            <div class="job_name">{{ $row->job_name }}</div>

            <div class="position">{{ $row->quote }}</div>
            <div class="d-flex align-items-center justify-content-center sosmed-profile my-4">
              <a href="https://www.instagram.com/{{ $row->link_instagram }}" class="ig btn-sosmed"><i class="fab fa-instagram"></i></a>
              <a href="https://wa.me/{{ $row->whatsapp }}" class="wa btn-sosmed"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>

<script>
  // set a short timeout before taking action
  // so as to allow hash to be set
  setTimeout(() => {
    // uses HTML5 history API to manipulate the location bar
    history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
  }, 500); // 5 millisecond timeout in this case
</script>

@stop