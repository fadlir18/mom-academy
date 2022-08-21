<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MarketModel extends Model
{
    protected $table = 'products';
    protected $subtable = 'product_image';

    public function db_lists($param)
    {
        $query = DB::table($this->table); 
        $result = $query->orderBy('created_at', 'desc')->paginate($param['limit']);  
        return $result;
    }

    public function db_detail($id)
    {
        $query = DB::table($this->table .' as p')
        ->leftJoin('brand as b','b.brand_id', '=', 'p.brand_id')
        ->leftJoin('category_market as c','c.category_market_id', '=', 'p.category_market_id');         
        $query->where('product_id',$id);

        $result = $query->first();        
        return $result;
    }
    public function db_get_image($id)
    {
        $query = DB::table($this->subtable);                        
        $query->where('product_id',$id);

        $result = $query->get();        
        return $result;
    }
    public function db_list_other($param)
    {
        $query = DB::table($this->table); 
        $query->where('product_id','!=',$param['id']);
        $result = $query->paginate($param['limit']);     
        return $result;
    } 
    
    public function filter($request)
    {
        $limit = 9;
        $param['limit'] = $limit;
        $search = $request->search;
        $productFilter = DB::table($this->table);

        if($request->has('search')){
            if($request->has('populer')) {
                $product = DB::table($this->table)->where(function($product) use($search) {
                $product->where('name', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'description', 'LIKE', "%{$search}%" );
            })->orderBy('discount_price', 'desc')->paginate($param['limit']);
            }
            else if($request->filter == "termahal") {
                $product = DB::table($this->table)->where(function($product) use($search) {
                $product->where('name', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'description', 'LIKE', "%{$search}%" );
            })->orderBy('price', 'desc')->paginate($param['limit']);
            }
            else if($request->filter == "termurah") {
                $product = DB::table($this->table)->where(function($product) use($search) {
                $product->where('name', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'description', 'LIKE', "%{$search}%" );
            })->orderBy('price', 'asc')->paginate($param['limit']);
            }
            else if($request->filter == "terbaru") {
                $product = DB::table($this->table)->where(function($product) use($search) {
                $product->where('name', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'description', 'LIKE', "%{$search}%" );
            })->orderBy('created_at', 'desc')->paginate($param['limit']);
            }
            else if($request->filter == "terlaris") {
                $product = DB::table($this->table)->where(function($product) use($search) {
                $product->where('name', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'description', 'LIKE', "%{$search}%" );
            })->orderBy('stock', 'asc')->paginate($param['limit']);
            }else{
                $product = DB::table($this->table)->where(function($product) use($search) {
                    $product->where('name', 'LIKE', "%{$search}%" )
                        ->orWhere ( 'description', 'LIKE', "%{$search}%" );
                })->paginate($param['limit']);
            };

        }else if($request->filter == "populer") {
            $product = $productFilter->orderBy('discount_price', 'desc')->paginate($param['limit']);
        }else if($request->filter == "termahal") {
            $product = $productFilter->orderBy('price', 'desc')->paginate($param['limit']);
        }else if($request->filter == "termurah") {
            $product = $productFilter->orderBy('price', 'asc')->paginate($param['limit']);
        }else if($request->filter == "terbaru") {
            $product = $productFilter->orderBy('created_at', 'desc')->paginate($param['limit']);
        }else if($request->filter == "terlaris") {
            $product = $productFilter->orderBy('stock', 'asc')->paginate($param['limit']);
        }else{
            $product = $productFilter->orderBy('created_at', 'desc')->paginate($param['limit']);
        };
        return $product;
    }
}