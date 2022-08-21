<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\MarketModel;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    protected $table = 'products';
    public function index(MarketModel $model, Request $request)
    {
        $limit = 9;
        $param['limit'] = $limit;
        $page = $request->input('page') ?: 1;


        if ($request->filter == null) {
            $product = $model->db_lists($param);
            $custompath = '/market-day';
        } else {
            $custompath = '/market-day?filter='.$request->filter;
            $product = $model->filter($request);
        }

        $data['results'] = $product;
        $data['titlepage'] = 'Market Day';
        // dd($data['results']);
        $path = url('/') . $custompath;
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($data['results'], $limit, $page);
        $paginator = $paginator->withPath($path);
        // dd($request->filter);
        $data['paginator'] = $paginator;
        return view('market.index', $data);
    }
    public function detail(MarketModel $model, Request $request, $id)
    {
        $product = $model->db_detail($id);
        $product_image = $model->db_get_image($id);
        $product_other = $model->db_list_other(['limit' => 6, 'id' => $id]);

        // dd($product);
        $data['results'] = $product;
        $data['other'] = $product_other;
        $data['images'] = $product_image;
        $data['titlepage'] = 'Market Day';
        return view('market.detail', $data);
    }
}
