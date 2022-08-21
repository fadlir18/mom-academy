@extends('layouts.app')
@section('content')
<div id="expert" class="section py-5">
    <div class="container">
        <h1 class="headline text-white text-center mb-5">MoMa Expert</h1>
        <div class="row justify-content-between">
            @if ($moms)
            @foreach ($moms as $row)
            <div class="col-md-2">
                <div class="block text-center">
                    <div class="img d-inline-block"><img width="250px" height="250px"  src="https://zonderstudio.com/moma/public/img/expert/{{ $row->image }}" alt="" class="img-fluid"></div>
                    <div class="after-img text-white mt-2">
                        <div class="name">{{ $row->expert_name }}</div>
                        <div class="position">{{ $row->profesi }}</div>
                        {{--<div class="more my-4"><a href="{{$row->link_portofolio}}" class="rounded-pill text-uppercase bg-white px-3 py-1">cek profil</a>
                        </div>--}}
                        {{--<div
                                            class="d-flex align-items-center justify-content-center sosmed-profile my-4">
                                            <a href="{{ $row->link_portofolio }}" class="ig btn-sosmed"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/#" class="wa btn-sosmed"><i class="fab fa-whatsapp"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>
@stop