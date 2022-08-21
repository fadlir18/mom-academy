@extends('layouts.app')
@section('content')
<div class="main-content">
	<div id="article" class="section pb-5 bg-white shadow-sm article-class-page">
        <form action="" class="filter-category mb-3 pt-4 pt-lg-0">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <div class="submenux w-100 text-center">
                      {{-- <ul class="d-inline-block nav nav-tabs border-bottom-0">
                        <li class="active"><a data-toggle="tab" href="#wajibtau">Wajib tau</a></li>
                        <li><a data-toggle="tab" href="#artikelbaru">Artikel Baru</a></li>
                        <li><a data-toggle="tab" href="#artikellain">Artikel Lainnya</a></li>
                      </ul> --}}
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center">
					<div class="searchbar-page">
							<input type="search" title=" " oninvalid="this.setCustomValidity(' ')" onchange="this.setCustomValidity('')"  placeholder="Search here" name="search" class="searchbar-input-page" onkeyup="buttonSearchPage();" autocomplete="off" required>
						</div>
							<button class="searchbar-icon-page rounded-pill bg-orange border-0 font-weight-bold btn-search text-white"><i class="fa fa-search mr-2" aria-hidden="true"></i> Cari Sekarang</button>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </form>          
        <div class="column-list border-top pt-3">
			<div class="container">
				<div class="tab-content">
					<div id="wajibtau" class="tab-pane fade show active">
						<div class="column mb-5">       
							<div class="row">
								@if(count($results)>0)
									@foreach ($results as $row)
										<div class="col-md-3 mb-5">
											<div class="block">
												<div class="block-col position-relative">
													<div class="img">
														<a href="{{ url('articles/detail/'.$row->article_id) }}" class="position-relative"><img src="https://zonderstudio.com/moma/public/img/article/{{ $row->image }}" alt="" class="img-fluid"></a>
													</div>
													<div class="block-text w-100 p-3">
														<div class="date-post mb-2">{{ \Carbon\Carbon::parse($row->created_at)->format('d F Y') }}</div>
														<div class="title-post">
															<a href="{{ url('articles/detail/'.$row->article_id) }}">{{ $row->title }}</a>
														</div>
													</div>
												</div>       
											</div>
										</div>
									@endforeach
								@endif          
							</div>
							<div class="row">
								<div class="col-12 mx-auto">
									{{ $results->links() }}
								</div>
							</div>
						</div>
					</div>
					<div id="artikelbaru" class="tab-pane fade">
						<div class="column mb-5">       
							<div class="row">
								@if(count($results)>0)
									@foreach ($results as $row)
										<div class="col-md-3 mb-5">
											<div class="block">
												<div class="block-col position-relative">
													<div class="img">
														<a href="{{ url('articles/detail/'.$row->article_id) }}" class="position-relative"><img src="https://zonderstudio.com/img/article/{{ $row->image }}" alt="" class="img-fluid"></a>
													</div>
													<div class="block-text w-100 p-3">
														<div class="date-post mb-2">{{ \Carbon\Carbon::parse($row->created_at)->format('d F Y') }}</div>
														<div class="title-post">
															<a href="{{ url('articles/detail/'.$row->article_id) }}">{{ $row->title }}</a>
														</div>
													</div>
												</div>       
											</div>
										</div>
									@endforeach
								@endif          
							</div>
							<div class="row">
								<div class="col-12">
									{{ $results->links() }}
								</div>
							</div>
						</div>
					</div>
					<div id="artikellain" class="tab-pane fade">
						<div class="column mb-5">       
							<div class="row">
								@if(count($results)>0)
									@foreach ($results as $row)
										<div class="col-md-3 mb-5">
											<div class="block">
												<div class="block-col position-relative">
													<div class="img">
														<a href="{{ url('articles/detail/'.$row->article_id) }}" class="position-relative"><img src="https://zonderstudio.com/img/article/{{ $row->image }}" alt="" class="img-fluid"></a>
													</div>
													<div class="block-text w-100 p-3">
														<div class="date-post mb-2">{{ \Carbon\Carbon::parse($row->created_at)->format('d F Y') }}</div>
														<div class="title-post">
															<a href="{{ url('articles/detail/'.$row->article_id) }}">{{ $row->title }}</a>
														</div>
													</div>
												</div>       
											</div>
										</div>
									@endforeach
								@endif          
							</div>
							<div class="row">
								<div class="col-12">
									{{ $results->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
      </div>
</div>
@Stop