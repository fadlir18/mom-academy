@extends('layouts.app')

@section('content')
    <style>
        html {
            font-size: 14px;
        }

        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

    </style>

    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Konfirmasi Pembelian</h5>
                    </div>
                    <div class="table-responsive card-body">
                        <form action="/payment/confirm" method="GET">
                            <input class="form-control" value="{{$data_order->event_id}}" type="text" hidden name="product_id" required>
                            <input class="form-control" value="{{$data_order->event_name}}" type="text" hidden name="product_title" required>
                            @if (AppHelper::getAuth())
                            <table class="table table-hover table-condensed">
                                <tr>
                                    <td>Tipe Produk</td>
                                    <td><input class="form-control" type="text" placeholder="Masukan nama" name="product_type" value="Event" required readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input class="form-control" type="text" placeholder="Masukan nama" name="uname" value="{{
                                            AppHelper::getAuth('user_name')}}" required readonly></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" type="text" placeholder="Masukan Email" name="email" value="{{
                                            AppHelper::getAuth('user_email')}}" required readonly></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td><input class="form-control" type="text" placeholder="Masukan Nomor" name="number" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button class="btn btn-primary">Lanjut</button>
                                    </td>
                                </tr>
                            </table>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Detail Produk</h5>
                    </div>
                    <div class="card-body">
                        <p>Nama Produk :</p>
                        <span class="text-right">{{$data_order->event_name}}</span>
                        <hr/>
                        <p>Harga : </p>
                        <span class="text-right">{{$data_order->price}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection