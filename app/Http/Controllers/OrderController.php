<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\OrdersModuleModel;
use App\Models\ClassModel;
use Illuminate\Support\Facades\DB;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Carbon;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClassModel $model, Request $request)
    {
        $academyType = $request->input('category');
        $moduleType = $request->input('filter');

        // dd($moduleType);
         
        //paging
        $limit = 9;        
        $page = $request->input('page') ?: 1;        
        $offset = $limit * ($page - 1);
        $custompath = '/class';
        $param['offset'] = $offset;
        $param['limit'] = $limit;
                

        $data['type'] = 'video';
        $data['title'] = 'Module Video';
        $result = $model->db_lists_module($param);
        $custompath = '/class?category=module&filter=video';

        // dd($result);
        $path = url('/') . $custompath;
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($result['data'], $result['count'], $limit, $page);
        $paginator = $paginator->withPath($path);
        // dd($paginator);
        // dd($moms);
        // $data['module'] = $module;
        $data['results'] = $result['data'];     
        // dd($data['results']);
        $data['paginator'] = $paginator;   
        $data['titlepage'] = 'Class';

        // dd($data['listmodule']);

        return view('orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module_data = DB::table('module_ebook')->where('ebook_id',$id)->first();
        // dd($module_data);
        $table_no = '0001'; // nantinya menggunakan database dan table sungguhan
        $tgl = substr(str_replace( '-', '', Carbon\carbon::now()), 0,8);
        
        $no= $tgl.$table_no;
        $auto=substr($no,8);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,8).str_repeat(0,(4-strlen($auto))).$auto;

        $table_id = '0001'; // nantinya menggunakan database dan table sungguhan
        $tgl_id = substr(str_replace( '-', '', Carbon\carbon::now()), 0,8);
        
        $no_id= $tgl_id.$table_id;
        $auto_id=substr($no_id,8);
        $auto_id=intval($auto_id)+1;
        $auto_id_number=substr($no_id,0,8).str_repeat(0,(4-strlen($auto_id))).$auto_id;
        
        $insertorder = new OrdersModuleModel;
    
        $insertorder->id = $auto_number;
        $insertorder->users_id = AppHelper::getAuth('user_id');
        $insertorder->ebook_id = $module_data->ebook_id;
        $insertorder->ebook_title = $module_data->title;
        $insertorder->total_price = $module_data->price;
        $insertorder->payment_status = 1;

        $insertorder->save();
        

        return view('orders.show', compact('order', 'snapToken'));
    }

    public function payment (OrdersModuleModel $order){
        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdersModuleModel $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdersModuleModel $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdersModuleModel $order)
    {
        //
    }
}