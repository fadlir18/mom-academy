@extends('layouts.app')
@section('content')
<div class="main-content">
    <div id="about" class="section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <h1 class="title mt-4 pt-4 mb-2 d-block d-sm-none">About <span class="d-block">MoM Academy</span>
                    </h1>
                    <div class="block p-3 rounded my-sm-5">
                        <h1 class="title mb-4 d-none d-sm-block">About <span class="d-block">MoM Academy</span></h1>
                        <div class="shortdesc">
                            <p class="mb-3">MoM Academy (MoMA) komunitas yang dibina oleh Mothers on Mission, sebuah
                                perusahaan yang fokus kepada pemberdayaan Ibu dan wanita. Berdirinya MoM Academy
                                diharapkan ibu di Indonesia menjadi ibu yang produktif, sejahtera, dan bahagia.
                                Komunitas di bawah naungan Mothers on Mission ini berkembang pesat hanya dalam satu
                                tahun terakhir.</p>
                            <p class="mb-0">Saat ini MoMA sudah memiliki lebih dari ribuan anggota yang tersebar di
                                seluruh Indonesia serta Mancanegara dan terbagi dalam puluhan whatsapp group yang
                                dikelola oleh para pengurus regional masing-masing area.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="academy" class="section py-5">
        <div class="container">
            <h1 class="title">The Academy</h1>
            <div class="column mb-5">
                <h4 class="text-center mb-4">Class</h4>
                <div class="row">
                    @if(count($course)>0)
                    @foreach ($course as $row)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="block">
                            @if (AppHelper::getAuth())
                            <div class="block-col position-relative">
                                <div class="img">
                                    <a class="position-relative">
                                        <img src="https://zonderstudio.com/moma/public/img/course/{{ $row->image }}"
                                            alt="" class="img-fluid">
                                        <div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
                                            <h6>{{Str::words($row->course_name,5)}}</h6>
                                            <div class="author">By {{ $row->expert_name}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="block-text w-100 p-3">
                                    <div
                                        class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">
                                        {{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span
                                            class="text-uppercase font-weight-normal">{{
                                            \Carbon\Carbon::parse($row->start_date)->format('M') }}
                                        </span>
                                    </div>
                                    <h6 class="d-none d-sm-block">
                                        <a>{{Str::words(ucwords(strtolower($row->course_name)),4)}}</a>
                                    </h6>
                                    <div class="column">
                                        <div class="author d-none d-sm-block">By Widya Safitri</div>
                                        <div class="btn-act text-center">
                                            @if ($row->price == 0)
                                            <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
                                            <a type="button" href="{{url('class/detail/'.$row->course_id)}}"
                                                class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                            @else
                                            <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Rp.
                                                {{number_format($row->price)}}</a>
                                            @if(!is_null($cekOrderClass))
                                            <a type="button" href="{{url('class/detail/'.$row->course_id)}}"
                                                class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                            @else
                                            <a type="button" href="payment/course/{{$row->course_id}}"
                                                class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
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
                                        <img src="https://zonderstudio.com/moma/public/img/course/{{ $row->image }}"
                                            alt="" class="img-fluid">
                                        <div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
                                            <h6>{{Str::words($row->course_name,5)}}</h6>
                                            <div class="author">By {{ $row->expert_name}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="block-text w-100 p-3">
                                    <div
                                        class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">
                                        {{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span
                                            class="text-uppercase font-weight-normal">{{
                                            \Carbon\Carbon::parse($row->start_date)->format('M') }}
                                        </span>
                                    </div>
                                    <h6 class="d-none d-sm-block"><a data-toggle="modal"
                                            data-target="#modalAlert">{{Str::words(ucwords(strtolower($row->course_name)),4)}}</a>
                                    </h6>
                                    <div class="column">
                                        <div class="author d-none d-sm-block">By Widya Safitri</div>
                                        <div class="btn-act text-center">
                                            @if ($row->price == 0)
                                            <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
                                            @else
                                            <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Rp.
                                                {{number_format($row->price)}}</a>
                                            @endif
                                            <a type="button" data-toggle="modal" data-target="#modalAlert"
                                                class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
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
            </div>
            <div class="column mb-5">
                <h4 class="text-center mb-4">Modul</h4>
                <div class="row">
                    @if(count($module)>0)
                    @foreach ($cekOrderEbook as $row)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                        <div class="block">
                            @if (AppHelper::getAuth())
                            <div class="block-col block-module position-relative bg-orange">
                                <div class="img">
                                    <a target="_blank" class="position-relative">
                                        <img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}"
                                            alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="block-text w-100 p-3">
                                    <h6 class="mb-4 d-none d-sm-block">{{ $row->title }}</h6>
                                    <div class="btn-act">
                                        @if ($row->price == 0)
                                        <a class="rounded-pill mb-2 text-uppercase">Free</a>
                                        <a href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}"
                                            target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                        @else
                                        <a class="rounded-pill mb-2 text-uppercase">Rp.
                                            {{number_format($row->price)}}</a>
                                        @if($row->status == 'settlement')
                                        <a type="button"
                                            href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}"
                                            target="_blank" class="rounded-pill text-uppercase">Lihat</a>
                                        @else
                                        <a type="button" href="payment/module_ebook/{{$row->ebook_id}}" target="_blank"
                                            class="rounded-pill text-uppercase">Lihat</a>
                                        @endif
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="block-col block-module position-relative bg-orange">
                                <div class="img">
                                    <a data-toggle="modal" data-target="#modalAlert" class="position-relative">
                                        <img src="https://zonderstudio.com/moma/public/img/ebook/{{ $row->thumbnail }}"
                                            alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="block-text w-100 p-3">
                                    <h6 class="mb-4 d-none d-sm-block"><a data-toggle="modal"
                                            data-target="#modalAlert">{{ $row->title }}</a></h6>
                                    <div class="btn-act">
                                        @if ($row->price == 0)
                                        <a class="rounded-pill mb-2 text-uppercase">Free</a>
                                        @else
                                        <a class="rounded-pill mb-2 text-uppercase">Rp.
                                            {{number_format($row->price)}}</a>
                                        @endif
                                        {{--<a type="button"
                                            href="https://zonderstudio.com/moma/public/file/ebook/{{$row->file_ebook}}"
                                            target="_blank" class="rounded-pill text-uppercase">Lihat</a>--}}
                                        <a type="button" data-toggle="modal" data-target="#modalAlert" target="_blank"
                                            class="rounded-pill text-uppercase">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div id="expert" class="section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h1 class="headline text-white">MoMa Expert</h1>
                        <div class="moreknow d-none d-sm-block"><a
                                href="https://www.google.com/url?q=https://docs.google.com/forms/d/19P1CSqQozjeRpYHBq4MUANNyynxvHB-4XP3Y2Io7tVw/edit&sa=D&source=editors&ust=1654338396743627&usg=AOvVaw1ciEL5h8KsJ0Ot7EH69yRo"
                                class="d-block text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase font-weight-bold">Daftar
                                Sebagai Expert</a></div>
                    </div>
                    <div class="col-md-9">
                        <div class="sliders-wrapper">
                            <div class="slider multiple-items">
                                @if ($expert)
                                @foreach ($expert as $row)
                                <div class="block text-center">
                                    <div class="img d-inline-block"><img
                                            src="https://zonderstudio.com/moma/public/img/expert/{{ $row->image }}"
                                            alt="" class="img-fluid"></div>
                                    <div class="after-img text-white mt-2">
                                        <div class="name">{{ $row->expert_name }}</div>
                                        <div class="position">{{ $row->profesi }}</div>
                                        {{--<div class="more my-4"><a href="{{$row->link_portofolio}}"
                                                class="rounded-pill text-uppercase bg-white px-3 py-1">cek profil</a>
                                        </div>--}}
                                        {{--<div
                                            class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                                            <a href="https://www.instagram.com/{{ $row->link_instagram }}"
                                                class="ig btn-sosmed"><i class="fab fa-instagram"></i></a>
                                            <a href="https://wa.me/#" class="wa btn-sosmed"><i
                                                    class="fab fa-whatsapp"></i></a>
                                        </div>--}}
                                    </div>
                                </div>
                                {{-- <div class="block text-center">
                                    <div class="img d-inline-block"><img
                                            src="https://zonderstudio.com/moma/public/img/mom/{{ $row->image }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="after-img text-white mt-2">
                                        <div class="name">{{ $row->name }}</div>
                                        <div class="position">{{ $row->quote }}</div>
                                        <div
                                            class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                                            <a href="https://www.instagram.com/{{ $row->link_instagram }}" class="ig"><i
                                                    class="fab fa-instagram"></i></a>
                                            <a href="https://wa.me/#" class="wa"><i class="fab fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="events" class="section py-5">
            <div class="container">
                <div class="banner-ads text-center">
                    <img src="{{ asset('images/banner-ads-01.jpg') }}" alt="" class="img-fluid">
                </div>
                <h1 class="title text-center py-5 mt-3">MoM Events</h1>
                <div class="column mb-5">
                    <div class="row">
                        @if(count($cekOrderEvents)>0)
                        @foreach ($cekOrderEvents as $row)
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                            <div class="block">
                                @if (AppHelper::getAuth())
                                <div class="block-col position-relative">
                                    <div class="img">
                                        <p class="position-relative">
                                            <img src="https://zonderstudio.com/moma/public/img/event/{{ $row->image }}"
                                                alt="" class="img-fluid">
                                        <div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
                                            course_name
                                            <h6>{{Str::words($row->event_name,5)}}</h6>
                                            <div class="author">By {{$row->speaker}}</div>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="block-text w-100 p-3">
                                        <div
                                            class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">
                                            {{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span
                                                class="text-uppercase font-weight-normal">{{
                                                \Carbon\Carbon::parse($row->start_date)->format('M') }} </span>
                                        </div>
                                        <h6 class="d-none d-sm-block text-card-wrap">
                                            <p>{{Str::words($row->event_name,5)}}</p>
                                        </h6>
                                        <div class="column">
                                            <div class="author d-none d-sm-block">By {{$row->speaker}}</div>
                                            <div class="btn-act text-center">
                                                @if ($row->price == 0)
                                                <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
                                                <a href="/events/detail/{{ $row->event_id }}"
                                                    class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                @else
                                                <a class="rounded-pill mb-2 text-uppercase">Rp.
                                                    {{number_format($row->price)}}</a>
                                                @if($row->status == 'settlement')
                                                <a href="/events/detail/{{ $row->event_id }}"
                                                    class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                @else
                                                <a href="payment/event/{{$row->event_id}}"
                                                    class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="block-col position-relative">
                                    <div class="img">
                                        <p class="position-relative">
                                            <img src="https://zonderstudio.com/moma/public/img/event/{{ $row->image }}"
                                                alt="" class="img-fluid">
                                        <div class="floating-txt d-block d-sm-none position-absolute text-white p-2">
                                            course_name
                                            <h6>{{Str::words($row->event_name,5)}}</h6>
                                            <div class="author">By {{$row->speaker}}</div>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="block-text w-100 p-3">
                                        <div
                                            class="date text-white text-center font-weight-bold d-flex align-items-center justify-content-center flex-column">
                                            {{ \Carbon\Carbon::parse($row->start_date)->format('d') }} <span
                                                class="text-uppercase font-weight-normal">{{
                                                \Carbon\Carbon::parse($row->start_date)->format('M') }} </span>
                                        </div>
                                        <h6 class="d-none d-sm-block text-card-wrap">
                                            <p>{{Str::words($row->event_name,5)}}</p>
                                        </h6>
                                        <div class="column">
                                            <div class="author d-none d-sm-block">By {{$row->speaker}}</div>
                                            <div class="btn-act text-center">
                                                <a class="free rounded-pill text-white mb-2 text-uppercase p-1">Free</a>
                                                <a href="" data-toggle="modal" data-target="#modalAlert"
                                                    class="daftar rounded-pill text-white text-uppercase p-1">Daftar</a>
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
                </div>
            </div>
        </div>
        <div id="market" class="section py-5 position-relative market-class-page">
            <div class="container">
                <div class="d-none d-sm-block">
                    <div class="row text-white mb-5">
                        <div class="col-md-3">
                            <h1 class="h-100 d-flex align-items-center">Market Day</h1>
                        </div>
                        <div class="col-md-9">
                            <div class="shortdesc">
                                <p>Temukan produk-produk berkualitas pilihan MoM Academy. Setiap keuntungan penjualan
                                    akan disalurkan untuk program pemberdayaan ibu dan wanita.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($product)
                        @foreach ($product as $row)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="block">
                                <div class="block-col position-relative">
                                    <div class="img"><a href="{{ url('/market-day/detail/'.$row->product_id)}}"
                                            class="position-relative">
                                            <img src="https://zonderstudio.com/moma/public/img/product/{{$row->product_image}}"
                                                alt="" class="img-fluid"></a></div>
                                    <div class="block-text w-100 p-3">
                                        <div class="row column">
                                            <div class="col-9">
                                                <h6 class="my-0 pt-0 text-card-wrap"><a
                                                        href="{{ url('/market-day/detail/'.$row->product_id)}}">{{$row->name}}
                                                    </a></h6>
                                                <div class="price mb-2">Rp {{number_format($row->price)}}</div>
                                            </div>
                                            <div class="col-3">
                                                {{-- <div class="rating"><span>4,8</span> <i class="fas fa-star"></i>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="d-flex btn-act-market justify-content-end">
                                            {{--<button
                                                class="buy text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0">beli</button>--}}
                                            <a href="{{ url('/market-day/detail/'.$row->product_id)}}"
                                                class="detail text-uppercase font-weight-bold rounded-pill bg-orange text-white border-0"
                                                style="    width: 45%;
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
                <div class="d-block d-sm-none">
                    <h1 class="h-100 d-flex align-items-center text-white">Market Day</h1>
                    <div class="shortdesc text-white">
                        <p>Temukan produk-produk berkualitas dari member MoMA di sini.</p>
                    </div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase text-white font-weight-bold bg-transparant"
                                id="label-1" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1"
                                aria-selected="true">Product of the day</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-white font-weight-bold bg-transparant" id="label-2"
                                data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2"
                                aria-selected="false">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-white font-weight-bold bg-transparant" id="label-3"
                                data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3"
                                aria-selected="false">UMKM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-white font-weight-bold bg-transparant" id="label-4"
                                data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4"
                                aria-selected="false">Our brand</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-white font-weight-bold bg-transparant" id="label-5"
                                data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5"
                                aria-selected="false">Merchandise</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="label-1">
                            <div class="block-col">
                                <div class="block-label rounded-pill bg-white d-inline-block p-1 px-3 mb-3 ml-2">Product
                                    of The Day</div>
                                <div class="block product-off-the-day">
                                    <div class="block-col position-relative">
                                        <div class="img h-100"><a href="detail-market.html"
                                                class="position-relative h-100"><img
                                                    src="{{ asset('images/img-product-day.png') }}" alt=""
                                                    class="img-fluid h-100"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <h6><a href="detail-market.html">cottonink x liunic </a></h6>
                                            <div class="column">
                                                <div class="price">Rp 180.000</div>
                                                <div class="rating">4,8 <i class="fas fa-star"></i> Terjual 3,4rb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="label-2">
                            <div class="block-col">
                                <div class="block-label rounded-pill bg-white d-inline-block p-1 px-3 mb-3 ml-3">Books
                                </div>
                                <div class="block">
                                    <div class="block-col position-relative">
                                        <div class="img"><a href="detail-market.html" class="position-relative"><img
                                                    src="{{ asset('images/img-product-1.png') }}" alt=""
                                                    class="img-fluid"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <h6 class="mb-0"><a href="detail-market.html">cottonink x liunic </a></h6>
                                            <div class="column">
                                                <div class="price mb-2">Rp 180.000</div>
                                                <div class="rating">4,8 <i class="fas fa-star"></i> Terjual 3,4rb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="label-3">
                            <div class="block-col">
                                <div class="block-label mt-3 rounded-pill bg-white d-inline-block p-1 px-3 mb-3 ml-3">
                                    UMKM</div>
                                <div class="block">
                                    <div class="block-col position-relative">
                                        <div class="img"><a href="detail-market.html" class="position-relative"><img
                                                    src="{{ asset('images/img-product-2.png') }}" alt=""
                                                    class="img-fluid"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <h6 class="mb-0"><a href="detail-market.html">cottonink x liunic </a></h6>
                                            <div class="column">
                                                <div class="price mb-2">Rp 180.000</div>
                                                <div class="rating">4,8 <i class="fas fa-star"></i> Terjual 3,4rb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="label-4">
                            <div class="block-col">
                                <div class="block-label mt-3 rounded-pill bg-white d-inline-block p-1 px-3 mb-3 ml-3">
                                    Our Brands Product</div>
                                <div class="block">
                                    <div class="block-col position-relative">
                                        <div class="img"><a href="detail-market.html" class="position-relative"><img
                                                    src="{{ asset('images/img-product-2.png') }}" alt=""
                                                    class="img-fluid"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <h6 class="mb-0"><a href="detail-market.html">cottonink x liunic </a></h6>
                                            <div class="column">
                                                <div class="price mb-2">Rp 180.000</div>
                                                <div class="rating">4,8 <i class="fas fa-star"></i> Terjual 3,4rb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="label-5">
                            <div class="block-col">
                                <div class="block-label mt-3 rounded-pill bg-white d-inline-block p-1 px-3 mb-3 ml-3">
                                    Merchandise</div>
                                <div class="block">
                                    <div class="block-col position-relative">
                                        <div class="img"><a href="detail-market.html" class="position-relative"><img
                                                    src="{{ asset('images/img-product-3.png') }}" alt=""
                                                    class="img-fluid"></a></div>
                                        <div class="block-text w-100 p-3">
                                            <h6 class="mb-0"><a href="detail-market.html">cottonink x liunic </a></h6>
                                            <div class="column">
                                                <div class="price mb-2">Rp 180.000</div>
                                                <div class="rating">4,8 <i class="fas fa-star"></i> Terjual 3,4rb</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="income" class="section py-5">
            <div class="container">
                <div class="row mb-sm-5">
                    <div class="col-md-4">
                        <h1 class="text-white font-weight-bold">Get Income</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="shortdesc text-white">
                            <p>Dapatkan penghasilan tambahan melalui MoM Academy</p>
                        </div>
                    </div>
                </div>
                <div class="d-none d-sm-block">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="block">
                                <h4 class="subtitle text-white text-center mb-4 font-weight-bold">MoMReseller</h4>
                                <div class="img container-momfreelancer"><img
                                        src="https://devmom.zonderstudio.com/images/MomReseller.jpg" alt=""
                                        class="img-fluid img-momfreelancer" style="border-radius: 20px;">
                                    <div class="overlay-momfreelancer">
                                        <div class="text-momfreelancer">Mom bebas memilih produk yang ingin di jual,
                                            sehingga bisa menentukan pendapatannya sendiri.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block">
                                <h4 class="subtitle text-white text-center mb-4 font-weight-bold">MoMFluencer</h4>
                                <div class="img container-momfreelancer"><img
                                        src="https://devmom.zonderstudio.com/images/MomFluencer.jpg" alt=""
                                        class="img-fluid img-momfreelancer" style="border-radius: 20px;">
                                    <div class="overlay-momfreelancer">
                                        <div class="text-momfreelancer">Dapatkan penghasilan tambahan dengan menjadi
                                            influencer MoM. </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block">
                                <h4 class="subtitle text-white text-center mb-4 font-weight-bold">MoMFreelancer</h4>
                                <div class="img container-momfreelancer"><img
                                        src="https://devmom.zonderstudio.com/images/MomFreelancer.jpg" alt=""
                                        class="img-fluid img-momfreelancer" style="border-radius: 20px;">
                                    <div class="overlay-momfreelancer">
                                        <div class="text-momfreelancer">Memiliki kemampuan di bidang digital marketing,
                                            blogger, project leader, social media dan desain grafis. Yuk, gabung di
                                            MoMFreelancer!</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="block">
                                <h4 class="subtitle text-white text-center mb-4 font-weight-bold">MoMTalent</h4>
                                <div class="img container-momfreelancer"><img
                                        src="https://devmom.zonderstudio.com/images/MomTalent.jpg" alt=""
                                        class="img-fluid img-momfreelancer" style="border-radius: 20px;">
                                    <div class="overlay-momfreelancer">
                                        <div class="text-momfreelancer">Bisa akting, percaya diri di depan kamera, foto
                                            genik, ekspresif. Yuk, join sebagai MoMTalent!</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            @if (AppHelper::getAuth())
                            <div class="button" style="font-size: 24px;"><a href="" data-toggle="modal"
                                    data-target="#modalIncome"
                                    class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                            </div>
                            @else
                            <div class="button" style="font-size: 24px;"><a href="" data-toggle="modal"
                                    data-target="#modalAlert"
                                    class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row d-block d-sm-none">
                    <div class="mobile-tabs mb-5">
                        <div class="container">
                            <ul class="nav nav-pills mb-3" id="testi-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-white font-weight-bold bg-transparent"
                                        id="testi-reseller-tab" data-toggle="pill" href="#testi-reseller" role="tab"
                                        aria-controls="testi-reseller" aria-selected="true">MoM Reseller</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white font-weight-bold bg-transparent"
                                        id="testi-influencer-tab" data-toggle="pill" href="#testi-influencer" role="tab"
                                        aria-controls="testi-influencer" aria-selected="false">MoM Influencer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white font-weight-bold bg-transparent"
                                        id="testi-freelancer-tab" data-toggle="pill" href="#testi-freelancer" role="tab"
                                        aria-controls="testi-freelancer" aria-selected="false">MoM Freelancer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white font-weight-bold bg-transparent" id="testi-talent-tab"
                                        data-toggle="pill" href="#testi-talent" role="tab" aria-controls="testi-talent"
                                        aria-selected="false">MoM Talent</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="testi-tabContent">
                                <div class="tab-pane fade show active" id="testi-reseller" role="tabpanel"
                                    aria-labelledby="testi-reseller-tab">
                                    <div class="img mb-4 text-center"><img src="{{ asset('images/img-income-1.png') }}"
                                            alt="" class="img-fluid"></div>
                                    <div class="button-wrapper text-center">
                                        @if (AppHelper::getAuth())
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalIncome"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @else
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalAlert"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="testi-influencer" role="tabpanel"
                                    aria-labelledby="testi-influencer-tab">
                                    <div class="headline mb-4 text-white text-center">
                                        <p>Dapatkan penghasilan tambahan dengan menjadi influencer MoM. Klik untuk info
                                            lebih lanjut</p>
                                    </div>
                                    <div class="button-wrapper text-center">
                                        @if (AppHelper::getAuth())
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalIncome"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @else
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalAlert"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="testi-freelancer" role="tabpanel"
                                    aria-labelledby="testi-freelancer-tab">
                                    <div class="img mb-4 text-center"><img src="{{ asset('images/img-income-2.png') }}"
                                            alt="" class="img-fluid"></div>
                                    <div class="button-wrapper text-center">
                                        @if (AppHelper::getAuth())
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalIncome"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @else
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalAlert"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="testi-talent" role="tabpanel"
                                    aria-labelledby="testi-talent-tab">
                                    <div class="headline mb-4 text-white text-center">
                                        <p>Bisa akting, PD di depan kamera, yuk join sebagai MoMTalent aja!</p>
                                    </div>
                                    <div class="button-wrapper text-center">
                                        @if (AppHelper::getAuth())
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalIncome"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @else
                                        <div class="button"><a href="" data-toggle="modal" data-target="#modalAlert"
                                                class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center income-button">daftar</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="testi-block">
                                <div class="row">
                                    <div class="col-md-4 col-4">
                                        <div class="user rounded-circle"><img
                                                src="{{ asset('images/eva-musarropah-momfreelancer.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="testi">
                                            <p>"Benefitnya banyak banget. Selain membantu keuangan rumah tangga, wawasan
                                                kerja dan jaringan pertemanan juga makin luas. Padahal cuma kerja dari
                                                rumah lho, Moms!" <span class="font-weight-bold d-block mt-2">- Eva
                                                    Musarropah, MoMFreelancer</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-sm-block">
                            <div class="testi-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="user rounded-circle"><img
                                                src="{{ asset('images/ningsih-momreseller.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="testi">
                                            <p>"Gabung di MoMReseller banyak manfaatnya, karena bisa menghasilkan cuan
                                                kalau kita serius menjalankannya. Dapat update ilmu seputar jualan
                                                online, serta teman sehingga menambah relasi." <span
                                                    class="font-weight-bold d-block mt-2">- Ningsih, MoMReseller</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="trusted" class="section py-5">
            <div class="container">
                <div class="column text-center">
                    <h1 class="font-weight-bold mb-4">Trusted by</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="sliders-wrapper">
                                <div class="slider multiple-items-2">
                                    <div class="block text-center">
                                        <div class="img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('images/img-client-1.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="block text-center">
                                        <div class="img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('images/img-client-2.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="block text-center">
                                        <div class="img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('images/img-client-3.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="block text-center">
                                        <div class="img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('images/img-client-2.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="client-stories" class="section pt-4">
            <div class="container">
                <h1 class="font-weight-bold mb-4">Client Stories</h1>
                <div class="column white-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block p-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="img"><img
                                                src="https://devmom.zonderstudio.com/images/default-client.png" alt=""
                                                class="img-fluid"></div>
                                    </div>
                                    <div class="col-md-8 client-stories-font">
                                        <div>“Event MOMFEST 2022 seru banget,next event kami akan rutin support Mom
                                            Academy”
                                        </div>
                                        <div class="testi font-weight-bold">Theresa Subali , Brand Manager PT Nutragen
                                            Global Ensana (IzIsoup & Coconut Yogurt)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block p-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="img"><img
                                                src="https://devmom.zonderstudio.com/images/default-client.png" alt=""
                                                class="img-fluid"></div>
                                    </div>
                                    <div class="col-md-8 client-stories-font">
                                        <div>“Selamat atas suksesnya acara MOMFEST 2022 ya….<br />
                                            Terima kasih juga untuk support yang diberikan. Semoga kerjasama dapat
                                            terjalin terus di kemudian hari.”
                                        </div>
                                        <div class="testi font-weight-bold">Ni Ketut Sukartiwi, Sr. GM Marketing
                                            Wellness combhipar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--

        <div class="column white-right">
            <div class="row">
                <div class="col-md-6">
                    <div class="block p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img"><img src="https://devmom.zonderstudio.com/images/client-unilever.png" alt="" class="img-fluid"></div>
                            </div>
                            <div class="col-md-8 client-stories-font">
                                <div>“Kami mendapatkan pengalaman bekerja dengan
                                    freelancer terbaik”
                                </div>
                                <div class="testi font-weight-bold">Andina, Head of Marketing GOJEK INDONESIA</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block p-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img"><img src="https://devmom.zonderstudio.com/images/client-gojek.png" alt="" class="img-fluid"></div>
                            </div>
                            <div class="col-md-8 client-stories-font">
                                <div>“Kami mendapatkan pengalaman bekerja dengan
                                    freelancer terbaik”
                                </div>
                                <div class="testi font-weight-bold">Andina, Head of Marketing GOJEK INDONESIA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

-->
            </div>
        </div>
        <div id="behind-mom" class="section py-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3">
                        <h1 class="headline text-white">Behind MoM Academy</h1>
                        <div class="shortdesc py-4 d-none d-sm-block">
                            <p>Mari berkenalan dengan pendiri dan penggerak di MoM Academy<br /><br /><br /><br />
                            </p>
                        </div>
                        <div class="moreknow d-none d-sm-block"><a href="/about-us#academy"
                                class="d-block text-uppercase d-flex align-items-center justify-content-center link-gradient rounded-pill text-white text-uppercase font-weight-bold">Yuk,
                                Kenalan!</a></div>
                    </div>
                    <div class="col-md-9">
                        <div class="sliders-wrapper">
                            <div class="slider multiple-items">
                                @if ($moms)
                                @foreach ($moms as $row)
                                {{-- <div class="block text-center">
                                    <div class="img d-inline-block"><img
                                            src="https://zonderstudio.com/moma/public/img/mom/{{ $row->image }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="after-img text-white mt-2">
                                        <div class="name">{{ $row->name }}</div>
                                        <div class="position">{{ $row->quote }}</div>
                                        <div class="more my-4"><a href="#"
                                                class="rounded-pill text-uppercase bg-white px-3 py-1">cek profil</a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="block text-center">
                                    <div class="img d-inline-block"><img
                                            src="https://zonderstudio.com/moma/public/img/mom/{{ $row->image }}" alt=""
                                            class="img-fluid"></div>
                                    <div class="after-img text-white mt-2">
                                        <div class="name mom-name rounded-pill">{{ $row->name }}</div>
                                        <div class="job_name"><strong>{{ $row->job_name }}</strong></div>
                                        <div class="position-mom" style="font-size:13px; margin: 10px;"><i>{{
                                                $row->quote }}</i></div>
                                        <div
                                            class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                                            <a href="https://www.instagram.com/{{ $row->link_instagram }}"
                                                class="ig btn-sosmed"><i class="fab fa-instagram"></i></a>
                                            <a href="https://wa.me/{{ $row->whatsapp }}" class="wa btn-sosmed"><i
                                                    class="fab fa-whatsapp"></i></a>
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
        <div id="get-intouch" class="section py-5">
            <div class="container">
                <h1 class="font-weight-bold mb-4">Get In Touch</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="block bg-white rounded">

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                Session::forget('success');
                                @endphp
                            </div>
                            @endif

                            <form action="{{ route('sendMail') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext get-in-touch-input" id=""
                                            placeholder="" name="name">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Whatsapp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext get-in-touch-input" id=""
                                            placeholder="" name="noWhatsapp">
                                        @if ($errors->has('noWhatsapp'))
                                        <span class="text-danger">{{ $errors->first('noWhatsapp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext get-in-touch-input" id=""
                                            placeholder="" name="email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" id="" rows="3" class="form-control"
                                        placeholder="tulis pesanmu"></textarea>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="button-wrapper mt-4">
                                    <button type="submit"
                                        class="btn btn-primary text-uppercase text-white link-gradient rounded-pill border-0 font-weight-bold">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-column d-flex align-items-center h-100 mt-4 mt-sm-0">
                            <ul>
                                <li class="wa"><a href="https://wa.me/6281290900231" target="_blank">Admin MoMA</a></li>
                                <li class="location">Jl. Pekayon 1 No.34K, Ragunan, Kec. Ps. Minggu<br />Kota Jakarta
                                    Selatan, Daerah Khusus Ibukota Jakarta 12540</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop