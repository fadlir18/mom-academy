<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\OrdersModuleModel;
use App\Models\ClassModel;
use Illuminate\Support\Facades\DB;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon;
use Auth;

class PaymentEbookModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['detailmodule'] = DB::table('module_ebook')->where('ebook_id','=',$id)->first();
        // dd($data['detailmodule']);
        
        // dd($module_data);

        $table_no = $data['detailmodule']->ebook_id; // nantinya menggunakan database dan table sungguhan
        $tgl = substr(str_replace( '-', '', Carbon\carbon::now()), 0,8);
        
        $no=$tgl.$table_no;
        $auto=substr($no,8);
        $auto=intval($auto);
        $auto_number=substr($no,0,8).str_repeat(0,(4-strlen($auto))).AppHelper::getAuth('user_id').$auto;

        $module_data_count = DB::table('orders_module')->count();
        // dd($module_data_count);
        $table_id = $module_data_count; // nantinya menggunakan database dan table sungguhan
        $tgl_id = substr(str_replace( '-', '', Carbon\carbon::now()), 0,8);
        
        $no_id= $tgl_id.$table_id;
        $auto_id=substr($no_id,8);
        $auto_id=intval($auto_id);
        $auto_id_number=$id.substr($no_id,0,8).str_repeat(0,(3-strlen($auto_id))).$auto_id;
        // dd($auto_id_number);
        $module_data = DB::table('orders_module')->where('users_id','=',AppHelper::getAuth('user_id'))->where('ebook_id','=',$id)->first();
        // dd($module_data);
        // dd($data['order']);
        $insertorder = new OrdersModuleModel;
        if ($module_data === null) {
        
            $insertorder->id = $auto_id_number;
            $insertorder->id_trx = $auto_number;
            $insertorder->users_id = AppHelper::getAuth('user_id');
            $insertorder->ebook_id = $data['detailmodule']->ebook_id;
            $insertorder->ebook_title = $data['detailmodule']->title;
            $insertorder->total_price = $data['detailmodule']->price;
            $insertorder->payment_status = 1;
    
            $insertorder->save();

            // dd($insertorder->save());
            
            // dd($data['order']);
        }

        
        // $getidTrx = $auto_id_number - 1;
        $data['order'] = $insertorder->where('users_id','=',AppHelper::getAuth('user_id'))->where('ebook_id','=',$id)->first();;

        // dd($data['order']);
        // $data['snapToken'] = $data['order']->snap_token;
        if ($data['order']->snap_token === null) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $order = $data['order'];

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $data['order']->snap_token = $snapToken;
            $data['order']->save();
        }


        return view('payment.index', $data);
    }
}