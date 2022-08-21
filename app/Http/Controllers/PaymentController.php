<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\OrdersModuleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ApiController;

class PaymentController extends Controller
{
    public function indexEbook($id){

        $data['data_order'] = DB::table('module_ebook')->where('ebook_id','=',$id)->first();
        return view('payment.indexEbook', $data);
    }

    public function indexVideo($id){

        $data['data_order'] = DB::table('module_video')->where('video_id','=',$id)->first();
        return view('payment.indexVideo', $data);
    }

    public function indexCourse($id){

        $data['data_order'] = DB::table('course')->where('course_id','=',$id)->first();
        return view('payment.indexCourse', $data);
    }

    public function indexEvent($id){

        $data['data_order'] = DB::table('events')->where('event_id','=',$id)->first();
        return view('payment.indexEvent', $data);
    }

    public function payment(Request $request){
        // dd('payment');
        // $json = json_decode($request->get('json'));
        // dd($json->transaction_id);
        if($request->get('product_type') === 'Module Ebook'){
            $data['data_order'] = DB::table('module_ebook')->where('ebook_id','=',$request->product_id)->first();
            $price = $data['data_order']->price;
            $category = 'Module Ebook';
        }elseif($request->get('product_type') === 'Module Video'){
            $data['data_order'] = DB::table('module_video')->where('video_id','=',$request->product_id)->first();
            $price = $data['data_order']->price;
            $category = 'Module Video';
        }elseif($request->get('product_type') === 'Course'){
            $data['data_order'] = DB::table('course')->where('course_id','=',$request->product_id)->first();
            $data['data_order']->title = $data['data_order']->course_name;
            $price = $data['data_order']->price;
            $category = 'Course';
        }elseif($request->get('product_type') === 'Event'){
            $data['data_order'] = DB::table('events')->where('event_id','=',$request->product_id)->first();
            $data['data_order']->title = $data['data_order']->event_name;
            $price = $data['data_order']->price;
            $category = 'Event';
        }else{
            $data['data_order'] = DB::table('orders')->where('order_id','=',$request->get("trx_id"))->first();
            $price = $data['data_order']->price;
        }


        // dd($request->id_product);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $data['number'] = $request->number;
        if($request->get("trx_id") === null){
            $params = array(
                  'transaction_details' => array(
                    'order_id' => AppHelper::getAuth('user_id').rand(),
                    'gross_amount' => $price,
                  ),
                  'item_details' => array([
                    'id' => $request->get("product_id"),
                    'price' => $price,
                    'quantity' => 1,
                    'name' => $request->get("product_title"),
                    'category' => $category,
                  ]),
                  'customer_details' => array(
                    "first_name" => AppHelper::getAuth('user_name'),
                    "last_name" => AppHelper::getAuth('user_user_id'),
                    "email" => AppHelper::getAuth('user_email'),
                    "phone" => $request->get('number')
                  ),
                // 'transaction_details' => array(
                //     'order_id' => AppHelper::getAuth('user_id').rand(),
                //     'gross_amount' => $data['data_order']->price,
                // ),
                // 'item_details' => array(
                //     [
                //         'id' => $request->get("product_id"),
                //         'price' => $data['data_order']->price,
                //         'quantity' => 1,
                //         'name' => $data['data_order']->title
                //     ]
                // ),
                // 'customer_details' => array(
                //     'first_name' => 'asdasdasdasdasd',
                //     'last_name' => '',
                //     'email' => AppHelper::getAuth('user_email'),
                //     'phone' => $request->get('number'),
                // ),
            );
            $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
            // dd($data['snapToken']);
        }elseif($request->get("trx_id") != null){
            $data['snapToken'] = $data['data_order']->transaction_id;
            $data['number'] = $data['data_order']->number;
        }
        

        return view('payment.confirm', $data);
    }

    public function payment_post(Request $request){
        
        $json = json_decode($request->get('json'));
        // dd($request->input('_token'));
        
        // dd($json);
        $order = new OrdersModuleModel();
        $order->status = $json->transaction_status;
        $order->uid = AppHelper::getAuth('user_id');
        $order->uname = AppHelper::getAuth('user_name');
        $order->email = AppHelper::getAuth('user_email');
        $order->number = $request->get('number');
        $order->transaction_id = $json->transaction_id;
        $order->token = $request->input('_token');
        $order->product_id = $request->get('product_id');
        $order->product_type = $request->get('product_type');
        $order->title = $request->get('product_title');
        $order->order_id = $json->order_id;
        $order->price = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/payment/status/trx_id/'.$json->order_id))->with('success', 'Order berhasil dibuat') : redirect(url('/payment/status/trx_id/'.$json->order_id))->with('failed', 'Terjadi kesalahan');
    }

    public function payment_status($id){
        
        
        $data['data_order'] = OrdersModuleModel::where('order_id','=',$id)->first();
        $data['number'] = $data['data_order']->number;
        
        $getStatus = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic U0ItTWlkLXNlcnZlci14ZzlFQlpET29ZWTVfaXNhZm9nR2RpanU='
        ])->get('https://api.sandbox.midtrans.com/v2/121797190978/status');
        
        // $getStatus = Http::get('https://api.sandbox.midtrans.com/v2/1221507752176/status');
        
        dd($getStatus);


        $data['snapToken'] = $data['data_order']->token;

        return view('payment.confirm', $data);
    }
    
    public function payment_paid($id){
        $getStatus = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic U0ItTWlkLXNlcnZlci14ZzlFQlpET29ZWTVfaXNhZm9nR2RpanU='
        ])->get('https://api.sandbox.midtrans.com/v2/'.$id.'/status');
        
        // $getStatus = Http::get('https://api.sandbox.midtrans.com/v2/'.$id.'/status');

        // dd($getStatus);
        
        $ts = json_decode($getStatus)->transaction_status;
        
        $order_exist = OrdersModuleModel::where('order_id', $id)->first();

        return $order_exist->update(['status'=>$ts]);
    }
}
