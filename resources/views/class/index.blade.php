@extends('layouts.app')
@section('content')
<div class="main-content">
	<div id="academy" class="section pb-5 bg-white shadow-sm academy-class-page">
		{{-- <form action="" class="filter-category mb-4 pt-4 pt-lg-0">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-9">
						<div class="row">
							 <div class="col-md-3">
                    <div class="form-group">
                      <select class="form-control rounded-pill" id="select-module">
                        <option select hidden>Module</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <select class="form-control rounded-pill" id="select-workshop">
                        <option select hidden>Workshop</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div> 
							<div class="col-md-3">
								<div class="form-group">
									<select class="form-control rounded-pill" id="select-category" name="category">
										<option select hidden value="">Choose Category</option>
										<option value="class">Class</option>
										<option value="module">Module</option>
										 <option>3</option>
                        <option>4</option>
                        <option>5</option> 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<button id="academyBtn" class="rounded-pill font-weight-bold btn-search text-white w-100"><i class="fa fa-search" aria-hidden="true"></i> Cari <span>Sekarang</span></button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form> --}}
		<div id="academy" class="section py-5">
			<div class="container">
				<h1 class="title">The Academy</h1>
				@if($title == 'Class')
				<div class="column mb-5">
					<h4 class="text-center mb-4">Class</h4>
					<div class="row">
						@if(count($results)>0)
						@foreach ($cekOrderClass as $row)
						<div class="col-md-6 col-lg-4 mb-5 ">
							<div class="block">
								@if (AppHelper::getAuth())
								<div class="block-col position-relative">
									<div class="img">
										<a class="position-relative">
											<img src="https://zonderstudio.com/moma/public/img/course/{{ $row->image }}" alt="" class="img-fluid">
											<div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
												<h6>{{Str::words($row->course_name,5)}}</h6>
												<div class="author">By {{ $row->expert_name}}</div>
											</div>
										</a>
									</div>
									<div class="block-text w-100 p-3">
										<div class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">{{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span class="text-uppercase font-weight-normal">{{ \Carbon\Carbon::parse($row->start_date)->format('M') }}
											</span></div>
										<h6 class="d-none d-sm-block"><a >{{Str::words(ucwords(strtolower($row->course_name)),4)}}</a></h6>
										<div class="column">
											<div class="author d-none d-sm-block">By Widya Safitri</div>
											<div class="btn-act text-center">
                                                @if ($row->price == 0)
                                                <a class="free text-white rounded-pill mb-2 text-uppercase p-1">Free</a>
                                                <a href="{{url('class/detail/'.$row->course_id)}}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                @else
                                                <a class="free text-white rounded-pill mb-2 text-uppercase p-1">Rp.
                                                    {{number_format($row->price)}}</a>
                                                    @if($row->status ==  'settlement')
                                      <a href="{{url('class/detail/'.$row->course_id)}}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                    @else
                                    <a href="payment/course/{{$row->course_id}}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                    @endif
                                                @endif

											</div>
										</div>
									</div>
								</div>
								@else
								<div class="block-col position-relative">
									<div class="img">
										<a data-toggle="modal" data-target="#modalAlert" class="position-relative">
											<img src="https://zonderstudio.com/moma/public/img/course/{{ $row->image }}" alt="" class="img-fluid">
											<div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
												<h6>{{Str::words($row->course_name,5)}}</h6>
												<div class="author">By {{ $row->expert_name}}</div>
											</div>
										</a>
									</div>
									<div class="block-text w-100 p-3">
										<div class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">{{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span class="text-uppercase font-weight-normal">{{ \Carbon\Carbon::parse($row->start_date)->format('M') }}
											</span></div>
										<h6 class="d-none d-sm-block"><a data-toggle="modal" data-target="#modalAlert">{{Str::words(ucwords(strtolower($row->course_name)),4)}}</a></h6>
										<div class="column">
											<div class="author d-none d-sm-block">By Widya Safitri</div>
											<div class="btn-act text-center">
                                                @if ($row->price == 0)
                                                    <a class="free rounded-pill mb-2 ">Free</a>
                                                @else
                                                <a data-dismiss="modal" data-toggle="modal" href="#modalLogin"  class="free rounded-pill mb-2">Rp.
                                                    {{number_format($row->price)}}</a>
												<a class="free rounded-pill mb-2 ">Free</a>
                                                @endif
												<a data-toggle="modal" data-target="#modalAlert" class="daftar rounded-pill mb-2">Daftar</a>
											</div>
										</div>
									</div>
								</div>
								@endif
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="row">
						<div class="col-12 mx-auto">
							{{ $paginator->render() }}
						</div>
					</div>
				</div>
				@else
				<div class="column mb-5">
					<h4 class="text-center mb-4">Module</h4>
					<hr/>
					<div class="row justify-content-center pb-5">
						<div class="sortmenus d-flex px-3 px-sm-0 mobile-column">
							<ul class="p-0 m-0" id="filter">
								<li id="module-ebook" class="child-filter active" type="button">E-book</li>
								<li id="module-video" class="child-filter" type="button">Video</li>
							</ul>
						</div>
					</div>
					<div class="row">
							@if($type == 'module-ebook' || $type == null)
								@if(count($results)>0)
								@foreach ($cekOrderEbook as $row)
								<div class="col-md-6 col-lg-4 mb-5 ">
									<div class="block">
										@if (AppHelper::getAuth())
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a target="_blank" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a target="_blank">{{ $row->title }}</a></h6>
												<div class="btn-act">
                                                   @if ($row->price == 0)
                                                        <a class="free rounded-pill mb-2">Free</a>
                                                        <a href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                    @else
                                                    <a class="rounded-pill mb-2">Rp.
                                                        {{number_format($row->price)}}</a>
                                                        @if($row->status ==  'settlement')
                                                    <a href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                        @else
                             <a href="payment/module_ebook/{{$row->ebook_id}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                        @endif
                                                    @endif
                                                                                
												</div>
											</div>
										</div>
										@else
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a data-toggle="modal" data-target="#modalAlert" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a data-toggle="modal" data-target="#modalAlert">{{ $row->title }}</a></h6>
												<div class="btn-act">
													@if ($row->price == 0)
													<a class="rounded-pill mb-2 text-uppercase">Free</a>
													@else
													<a data-toggle="modal" href="#modalLogin" class="rounded-pill mb-2">Rp. {{number_format($row->price)}}</a>
													@endif
													<a data-toggle="modal" href="#modalLogin" class="rounded-pill text-uppercase">Lihat</a>
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
								@endforeach
								@endif
							@elseif($type == 'module-video')
								@if(count($results)>0)
								@foreach ($cekOrderVideo as $row)
								<div class="col-md-6 col-lg-4 mb-5 ">
									<div class="block">
										@if (AppHelper::getAuth())
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a href="/class/detail-video/{{$row->video_id}}" target="_blank" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/video/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a href="/class/detail-video/{{$row->video_id}}" target="_blank">{{ $row->title }}</a></h6>
												<div class="btn-act">
													@if ($row->price == 0)
													<a class="rounded-pill mb-2 text-uppercase">Free</a>
													@else
													<a class="rounded-pill mb-2">Rp. {{number_format($row->price)}}</a>
													@if($row->status ==  'settlement')
								<a href="/class/detail-video/{{$row->video_id}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
													@else
													<a href="/payment/module_video/{{$row->video_id}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
													@endif
													@endif
													

												</div>
											</div>
										</div>
										@else
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a data-toggle="modal" data-target="#modalAlert" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/video/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a data-toggle="modal" data-target="#modalAlert">{{ $row->title }}</a></h6>
												<div class="btn-act">
													@if ($row->price == 0)
													<a class="rounded-pill mb-2 text-uppercase">Free</a>
													@else
													<a class="rounded-pill mb-2">Rp. {{number_format($row->price)}}</a>
													@endif
																										<a data-toggle="modal" href="#modalLogin" class="rounded-pill text-uppercase">Lihat</a>
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
								@endforeach
								@endif
							@else
                                @if(count($results)>0)
                                @foreach ($cekOrderEbook as $row)
								<div class="col-md-6 col-lg-4 mb-5 ">
									<div class="block">
										@if (AppHelper::getAuth())
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a target="_blank" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a target="_blank">{{ $row->title }}</a></h6>
												<div class="btn-act">
                                                   @if ($row->price == 0)
                                                        <a class="free rounded-pill mb-2">Free</a>
                                                        <a href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                    @else
                                                    <a href=""  class="rounded-pill mb-2">Rp.
                                                        {{number_format($row->price)}}</a>
                                                        @if($row->status ==  'settlement')
                                            <a href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                        @else
                                               <a href="payment/module_ebook/{{$row->ebook_id}}" target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                                        @endif
                                                    @endif
												</div>
											</div>
										</div>
										@else
										<div class="block-col block-module position-relative bg-orange">
											<div class="img">
												<a data-toggle="modal" data-target="#modalAlert" class="position-relative">
													<img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}" alt="" class="img-fluid">
												</a>
											</div>
											<div class="block-text w-100 p-3">
												<h6 class="mb-4 d-none d-sm-block"><a data-toggle="modal" data-target="#modalAlert">{{ $row->title }}</a></h6>
												<div class="btn-act">
													@if ($row->price == 0)
													<a class="rounded-pill mb-2 text-uppercase">Free</a>
													@else
													<a data-toggle="modal" href="#modalLogin" class="rounded-pill mb-2">Rp. {{number_format($row->price)}}</a>
													@endif
													<a data-toggle="modal" href="#modalLogin" class="rounded-pill text-uppercase">Lihat</a>
												</div>
											</div>
										</div>
										@endif
									</div>
								</div>
                                @endforeach
                                @endif
							@endif
					</div>
					<div class="row">
						<div class="col-12 mx-auto">
							{{-- {{ $results->links() }} --}}
							{{ $paginator->render() }}
						</div>
					</div>
				</div>
                @endif
			</div>
		</div>

		<!-- <div id="expert" class="section py-5">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h1 class="headline text-white">MoMa Expert</h1>
					</div>
					<div class="col-md-10">
						<div class="sliders-wrapper">
							<div class="slider multiple-items">
								@if ($moms)
								@foreach ($moms as $row)
								<div class="block text-center">
									<div class="img d-inline-block"><img src="https://zonderstudio.com/moma/public/img/expert/{{ $row->image }}" alt="" class="img-fluid"></div>
									<div class="after-img text-white mt-2">
										<div class="name">{{ $row->expert_name }}</div>
										<div class="position">{{ $row->profesi }}</div>
										<div class="more my-4"><a class="rounded-pill text-uppercase bg-white px-3 py-1">cek profil</a>
										</div>
										{{--<div
                                            class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                                            <a href="https://www.instagram.com/{{ $row->link_instagram }}" class="ig btn-sosmed"><i class="fab fa-instagram"></i></a>
										<a href="https://wa.me/#" class="wa btn-sosmed"><i class="fab fa-whatsapp"></i></a>
									</div>--}}
								</div>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div> -->

	</div>
</div>
</div>

<script>
    var url = new URL(window.location.href);
    var type = url.searchParams.get("category");
    if(type == 'module'){
        location.href='?category=module-ebook';
    }
    if(type){
    $("#filter li ").removeClass("active")
      document.getElementById(type).classList.add("active");
    }
</script>
@stop