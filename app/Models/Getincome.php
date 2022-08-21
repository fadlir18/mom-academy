<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Getincome extends Model
{
    protected $table = 'register_income';    

    public function db_lists($param)
    {
        $query = DB::table($this->table); 
        $result = $query->paginate($param['limit']);     
        return $result;
    }
    public function db_create($param)
    {        
        $query = DB::table($this->table)->insertGetId($param);
        return $query;
    }

    public function db_detail($id)
    {
        $query = DB::table($this->table);                        
        $query->where('event_id',$id);

        $result = $query->first();        
        return $result;
    }
}