@extends('layouts.app')
@section('content')
<div class="main-content">
    <div id="market" class="section pb-5 bg-white shadow-sm market-class-page">
        <form action="" class="filter-category mb-3 pt-4 pt-lg-0">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <div class="submenux">
                      <ul>
                        {{--<li><a href="#">Books</a></li>
                        <li><a href="#">Merchandise</a></li>
                        <li><a href="#">Local Products</a></li>--}}
                        <li class="active"><a href="#">Our Brand Products</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="d-flex justify-content-between align-items-center">
                      {{--<div class="sell"><a href="#">Start Jualan</a></div>--}}
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
				<div class="column mb-5">              
					<div class="row justify-content-center pb-5">
						<div class="sortmenus d-flex px-3 px-sm-0 mobile-column">
							<p class="mr-5 mb-0">Urutkan</p>
							<ul class="p-0 m-0" id="filter">
								<li id="populer" class="child-filter">Populer</li>
								<li id="terbaru" class="child-filter">Terbaru</li>
								<li id="terlaris" class="child-filter">Terlaris</li>
								<li class="child-filter">
									<div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Harga
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#" id="termurah">Termurah</a>
										<a class="dropdown-item" href="#" id="termahal">Termahal</a>
									</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						@if ($results)
							@foreach ($results as $row)
							<div class="col-md-6 col-lg-4 mb-5">
								<div class="block">
									<div class="block-col position-relative">
										<div class="img"><a href="{{ url('/market-day/detail/'.$row->product_id)}}" class="position-relative">
											<img src="https://zonderstudio.com/moma/public/img/product/{{$row->product_image}}" alt="" class="img-fluid"></a></div>
										<div class="block-text w-100 p-3">
										<div class="row column">
											<div class="col-9">
											<h6 class="my-0 pt-0 text-card-wrap"><a href="{{ url('/market-day/detail/'.$row->product_id)}}">{{$row->name}} </a></h6>
											<div class="price mb-2">Rp {{number_format($row->price)}}</div>
											</div>
											<div class="col-3">
											{{-- <div class="rating"><span>4,8</span> <i class="fas fa-star"></i></div> --}}
											</div>
										</div>
										<div class="d-flex btn-act-market justify-content-end">
											{{--<button class="buy text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0">beli</button>--}}
											<a href="{{ url('/market-day/detail/'.$row->product_id)}}" class="detail text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0" style="    width: 45%;
												text-decoration: none;
												text-align: center;
												padding-top: 5px;">detail</a>
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
        </div>
    </div>
</div>
@stop