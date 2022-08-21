<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppHelper;

class EventsModel extends Model
{
    protected $table = 'events';
    // protected $category = 'category_article';

    public function db_lists($param)
    {
        $query = DB::table($this->table); 
        $result = $query->select('events.*', 'orders.status', 'orders.product_id')->leftJoin('orders', function ($join) {
            $join->on('events.event_id', '=', 'orders.product_id')->where("orders.product_type", "=", "Course")->where("orders.uid", "=", AppHelper::getAuth('user_id'))->where("status", "=", "settlement");
        })->orderBy('created_at', 'desc')->paginate($param['limit']);     
        return $result;
    }

    public function db_detail($id)
    {
        $query = DB::table($this->table);                        
        $query->where('event_id',$id);

        $result = $query->first();        
        return $result;
    }
}