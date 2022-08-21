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
            <div class="col-12">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @elseif(Session::has('failed'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('failed')}}
                </div>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Data Order</h5>
                    </div>
                    <div class="table-responsive">
                            @if (AppHelper::getAuth())
                            <table class="table table-hover table-condensed">
                                @if(Session::has('success') || isset($data_order->status) == 'settlement')
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td><input class="form-control" type="text" placeholder="Masukan Nomor" value="@if($data_order->status === 'settlement') Pembayaran Berhasil @else Pending @endif" name="number" required readonly></td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Nama</td>
                                    <td><input class="form-control" type="text" value="{{
                                            AppHelper::getAuth('user_name')}}" required readonly></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" type="text" value="{{
                                            AppHelper::getAuth('user_email')}}" required readonly></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td><input class="form-control" type="text" value="{{$number}}" required readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        @if(isset($data_order->status))
                                        @if($data_order->status === 'settlement')
                                        <a href="/" class="btn btn-primary">Kembali ke Home</a>
                                        @else
                                        <button href="https://devmom.caricariconsultant.com/api/payment-handler" class="btn btn-primary" id="paid-button">Saya sudah membayar</button>
                                        @endif
                                    @else
                                    <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                                    @endif
                                    </td>
                                </tr>
                            </table>
                            @endif
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
                        <span class="text-right">{{$data_order->title}}</span>
                        <hr/>
                        <p>Harga : </p>
                        <span class="text-right">{{$data_order->price}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$snapToken}}">
        <input type="hidden" name="json" id="json_callback">
    </form>
    
    @if(isset($data_order->order_id))
        <form action="" id="paid_form" method="get">
            <input type="hidden" name="id" value="{{$data_order->order_id}}" />
        </form>
    @endif
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      var alreadyPaidButton = document.getElementById('paid-button');

      alreadyPaidButton.addEventListener('click', function () {
        send_response_paid_form();
        location.reload();
    });
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            console.log(result);
            alert("Sukses");
            send_response_to_form(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            console.log(result);
            alert("pending");
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });

    function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
    
    function send_response_paid_form(){
        $('#paid_form').submit();
        location.reload();
      }
    </script>
@endsection