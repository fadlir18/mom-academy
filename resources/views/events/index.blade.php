@extends('layouts.app')
@section('content')
<div class="main-content">
	<div id="events" class="section pb-5 bg-white shadow-sm">
		<div class="container">
			<h1 class="title text-center pb-5 mt-3">MoM Events</h1>
			<div class="sortby">
				<div class="text-right font-weight-bold mb-3">
					{{-- <span class="text-uppercase">sort by:</span> <span>Terpopuler</span> --}}
				</div>
			</div>
			<div class="column mb-5">
				<div class="row">
					@if ($results)
					@foreach ($results as $row)
					<div class="col-md-6 col-lg-4 mb-5">
						<div class="block">
							<div class="block-col position-relative">
								<div class="img">
									<a class="position-relative">
										<img src="https://zonderstudio.com/moma/public/img/event/{{ $row->image }}" alt="" class="img-fluid">
										<div class="floating-txt d-block d-sm-none position-absolute text-white p-2">course_name
											<h6>{{Str::words($row->event_name,5)}}</h6>
											<div class="author">By {{$row->speaker}}</div>
										</div>
									</a>
								</div>
								<div class="block-text w-100 p-3">
									<div class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">{{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span class="text-uppercase font-weight-normal">{{ \Carbon\Carbon::parse($row->start_date)->format('M') }} </span>
									</div>
									<h6 class="d-none d-sm-block"><a href="{{ url('/events/detail/'.$row->event_id)}}">{{Str::words($row->event_name,5)}}</a></h6>
									<div class="column">
										<div class="author d-none d-sm-block">By {{$row->speaker}}</div>
										<div class="btn-act text-center">
											@if ($row->price == 0)
											<a class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
											<a href="/events/detail/{{ $row->event_id }}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
											@else
											<a class="rounded-pill mb-2 text-uppercase">Rp.
												{{number_format($row->price)}}</a>
											@if($row->status == 'settlement')
											<a href="/events/detail/{{ $row->event_id }}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
											@else
											<a href="payment/event/{{$row->event_id}}" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
											@endif
											@endif
											<!-- <a href="#" class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
											<a href="#" class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<div class="row">
					<div class="col-12 mx-auto mt-5">
						{{ $results->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop