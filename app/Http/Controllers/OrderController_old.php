<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\AppHelper;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function cart()
    {
        $data['css'] = 'order/style.css';
        $data['js'] = 'order/script.js';
        $data['titlepage'] = 'order cart';
        return view('order/cart',$data);
    }

    public function checkout()
    {
        $data['css'] = 'order/checkout/style.css';
        $data['js'] = 'order/checkout/script.js';
        $data['titlepage'] = 'order checkout';
        return view('order/checkout',$data);
    }

    public function tracking()
    {
        $data['css'] = 'order/tracking/style.css';
        $data['js'] = 'order/tracking/script.js';
        $data['titlepage'] = 'order tracking';
        return view('order/tracking',$data);
    }
    public function done()
    {
        $data['css'] = 'order/done/style.css';
        $data['titlepage'] = 'order completed';
        return view('order/done',$data);
    }
    public function cancel()
    {
        $data['css'] = 'order/cancel/style.css';
        $data['titlepage'] = 'order canceled';
        return view('order/cancel',$data);
    }
    public function empty()
    {
        $data['css'] = '404.css';
        $data['titlepage'] = 'order empty';
        return view('order/cart_empty',$data);
    }
    public function empty_tracking()
    {
        $data['css'] = '404.css';
        $data['titlepage'] = 'order empty';
        return view('order/empty_tracking',$data);
    }
}
