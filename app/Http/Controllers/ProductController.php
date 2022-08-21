<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function lists()
    {
        $data['css'] = 'product/list/style.css';
        $data['js'] = 'product/list/script.js';
        $data['titlepage'] = 'product list';
        return view('product/lists',$data);
    }

    public function category()
    {
        $data['css'] = 'product/category/style.css';
        $data['titlepage'] = 'product category';
        return view('product/category',$data);
    }

    public function detail()
    {
        $data['css'] = 'product/detail/style.css';
        $data['js'] = 'product/detail/script.js';
        $data['titlepage'] = 'product detail';
        return view('product/detail',$data);
    }
}
