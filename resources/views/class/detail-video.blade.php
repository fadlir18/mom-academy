@extends('layouts.app')
@section('content')
<div id="academy" class="section pb-5 bg-white shadow-sm academy-class-page">
	<form action="" class="filter-category mb-4 pt-4 pt-lg-0">
	  <div class="container">
		<div class="row justify-content-center">
		  <div class="col-md-10">
			<div class="row">
			  <div class="col-lg-3 col-sm-6">
				<div class="form-group">
				  <select class="form-control rounded-pill" id="select-module">
					<option select hidden>Cari Class</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				  </select>
				</div>
			  </div>
			  <div class="col-lg-3 col-sm-6">
				<button class="rounded-pill font-weight-bold btn-search text-white w-100"><i class="fa fa-search mr-2" aria-hidden="true"></i> Cari Sekarang</button>
			  </div>
			</div>
		  </div>              
		</div>
	  </div>
	</form>          
	<div class="detail-class-page-wrapper border-top pt-4">
	  <div class="container">
		<h2 class="title-page">{{ucwords(strtolower($resultsPlay->title))}}</h2>
		{{-- <p class="details-info mb-4">Widya safitri, CEO Mothers in Mission</p> --}}
		<div class="row">
		  <div class="col-md-9">
			<div class="video-wrapper mb-4">
			  <video class="video-player video-js vjs-default-skin vjs-16-9 vjs-big-play-centered" data-setup='{"fluid": true}' poster="{!! $resultsPlay->thumbnail_video !!}" controls>
				<source src="{!! $resultsPlay->filename !!}" type='video/mp4'>
			  </video>
			</div>                
			<div class="shortdesc">
			  <p>{!!$resultsDetail->description !!}</p>
			</div>
		  </div>
		  <div class="col-md-3">
			<div class="sidebar-menus p-4">
			  <ul>
				@foreach($results as $res)
				<li>
					<a href="?video={{$res->detail_video_id}}">
						<video class="video-player video-js vjs-default-skin vjs-16-9 vjs-big-play-centered" style="pointer-events: none;" data-setup='{"fluid": true}' poster="{{$res->thumbnail_video}}" controls>
							<source src="{{$res->filename}}" type='video/mp4'>
						</video>
					</a>
				</li>
				@endforeach
			  </ul>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
@stop