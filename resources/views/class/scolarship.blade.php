@extends('layouts.app')
@section('content')

<div id="before-expert" class="section py-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 col-lg-6">
                <h2 class="title mt-4 pt-4 mb-2 d-block d-sm-none">About MoMa Scholarship</h2>
                <div class="block p-3 rounded my-sm-5">
                    <h2 class="title mb-4 d-none d-sm-block">About MoMa Scholarship</h2>
                    <div class="shortdesc pb-5">
                        <p>MoM Academy Scholarship merupakan program beasiswa yang disupport oleh brand dan partner MoM Academy untuk mencetak para Moms menjadi seorang yang profesional sebagai influencer, freelancer, ataupun entrepreneur</p>
                    </div>
                    <div class="button-wrapper d-flex justify-content-between">
                        <div class="button"><a href="{{url('get-income') }}" class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center py-3 px-5">lihat program</a></div>
                        <div class="button"><a data-toggle="modal" data-target="#modalRegist" class="rounded-pill link-gradient font-weight-bold d-flex align-items-center justify-content-center text-uppercase text-white text-center py-3 px-5">daftar sekarang</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop