@extends('layouts.app')
@section('content')
<div class="main-content">
    <div id="market" class="section pb-5 bg-white shadow-sm market-class-page">
        {{-- <form action="" class="filter-category mb-3 pt-4 pt-lg-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="submenux">
                                <ul>
                                    <li class="active"><a href="#">Books</a></li>
                                    <li><a href="#">Merchandise</a></li>
                                    <li><a href="#">Local Products</a></li>
                                    <li><a href="#">Our Brand Products</a></li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-between align-items-center mobile-column">
                                <div class="sell"><a href="#">Start Jualan</a></div>
                                <button class="rounded-pill bg-orange border-0 font-weight-bold btn-search text-white"><i class="fa fa-search mr-2" aria-hidden="true"></i> Cari <span>Sekarang</span></button>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </form>           --}}
        <div class="column-list border-top pt-3">
            <div class="container">
                <div class="column mb-5">
                    {{-- <div class="row justify-content-center pb-5">
                        <div class="sortmenus d-flex px-3 px-sm-0 mobile-column">
                            <p class="mr-5 mb-0">Urutkan</p>
                            <ul class="p-0 m-0">
                                <li class="active">Populer</li>
                                <li>Terbaru</li>
                                <li>Terlaris</li>
                                <li>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Harga
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Termurah</a>
                                    <a class="dropdown-item" href="#">Termahal</a>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="market-left-wrapper">
                                <div class="market-left-img mb-4">
                                    <div class="slider multiple-items-1">
                                        @if (sizeof($images)>0)
                                        @foreach ($images as $val)
                                        <img src="https://zonderstudio.com/moma/public/img/product/{{$val->file_image}}" class="img-fluid">
                                        @endforeach
                                        @else
                                        <img src="https://zonderstudio.com/moma/public/img/product/{{$results->product_image}}" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="user-block">
                                    <div class="row">
                                        <div class="col-lg-2 col-3">
                                            <div class="ava"><img src="images/avatar.png" alt="" class="img-fluid"></div>
                                        </div>
                                        <div class="col-lg-10 pl-0 col-9">
                                            <div class="block">
                                                <h4 class="name mb-0">Gerai Buku ABC</h4>
                                                <div class="city">Tangerang Selatan</div>
                                                <div class="ratings d-inline-block">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="feedback"><a href="#">Tulis Review</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="market-right-wrapper">
                                <h1 class="title-market">{{$results->name}}</h1>
                                <div class="after-title d-flex justify-content-between mb-4">
                                    {{-- <div class="ratings d-flex">
                                        <p class="mr-2 mb-0">(4,9)</p>
                                        <ul>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div> --}}
                                    {{-- <div class="reviews px-lg-5 px-3">
                                        <p class="text-center mb-0">10 Penilaian</p>
                                    </div>
                                    <div class="sold">
                                        <p class="text-center mb-0">150 Terjual</p>
                                    </div> --}}
                                </div>
                                <h2 class="price mb-4">Rp.{{number_format($results->price)}}</h2>
                                <div class="spec-block">
                                    <h4 class="font-weight-bold mb-4">Spesifikasi</h4>
                                    <div class="tablex mb-4">
                                        <div class="table-row d-flex">
                                            <label for="" class="w-25 mb-0">Merek</label>
                                            <div class="brand">{{$results->brand_name}}</div>
                                        </div>
                                        <div class="table-row d-flex">
                                            <label for="" class="w-25 mb-0">Stok</label>
                                            <div class="brand">{{$results->stock}}</div>
                                        </div>
                                        {{-- <div class="table-row d-flex">
                                            <label for="" class="w-25 mb-0">Dikirim Dari</label>
                                            <div class="brand">KAB. TANGERANG - KELAPA DUA, BANTEN, ID</div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="desc-block">
                                    <h4 class="font-weight-bold mb-4">Deskripsi</h4>
                                    <div class="desc">
                                        {{$results->name}}
                                    </div>
                                </div>
                                <div class="btn-wrapper d-flex justify-content-between mt-5">
                                    {{--<div class="chat w-50">
                                        <a href="https://wa.me/081290900231">
                                            <button class="btn text-center text-uppercase font-weight-bold w-100">
                                                Chat
                                            </button>
                                        </a>
                                    </div>--}}
                                    <div class="order w-75">
                                        <a href="https://wa.me/6281290900231?text=Hi mom, aku pesan produk ini ya! https://devmom.caricariconsultant.com/market-day/detail/{{$results->product_id}}">
                                            <button class="btn text-center text-uppercase font-weight-bold w-100">
                                                Pesan Sekarang
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="other-product mt-5">
                        <h4 class="font-weight-bold mb-4 d-block">Produk Lainnya</h4>
                        <div class="row">
                            @if ($other)
                            @foreach ($other as $item)
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="block">
                                    <div class="block-col position-relative">
                                        <div class="img"><a href="{{ url('/market-day/detail/'.$item->product_id)}}" class="position-relative">
                                                <img src="https://zonderstudio.com/moma/public/img/product/{{$item->product_image}}" alt="" class="img-fluid"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <div class="row column">
                                                <div class="col-9">
                                                    <h6 class="my-0 pt-0 text-card-wrap"><a href="{{ url('/market-day/detail/'.$item->product_id)}}">{{$item->name}}</a></h6>
                                                    <div class="price mb-2">Rp {{number_format($item->price)}}</div>
                                                </div>
                                                {{-- <div class="col-3">
                                                    <div class="rating"><span>4,8</span> <i class="fas fa-star"></i></div>
                                                    </div> --}}
                                            </div>
                                            <div class="d-flex btn-act-market justify-content-end">
                                                {{--<button class="buy text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0">beli</button>--}}
                                                <a href="{{ url('/market-day/detail/'.$item->product_id)}}" class="detail text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0" style="    width: 45%;
                                                        text-decoration: none;
                                                        text-align: center;
                                                        padding-top: 5px;
                                                        padding-bottom: 5px;">detail</a>
                                            </div>
                                        </div>
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
    </div>
</div>
@stop