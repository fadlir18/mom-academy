<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';    
    protected $primaryKey = 'user_id';

    public function db_lists($param)
    {
        $query = DB::table($this->table)->paginate($param['limit']);               
        // $query->limit($param['limit']);
        // $result = $query->get();        
        return $query;
    }
    public function db_insert($params)
    {
        $query = DB::table($this->table)->insertGetId($params);
        return $query;
    }
    public function db_detail_login($loginWith,$google_id)
    {
        $query = DB::table($this->table)->where($loginWith,$google_id)->first();
        return $query;
    }
    public function db_get_email($email)
    {
        $query = DB::table($this->table)->where('email',$email)->first();
        return $query;
    }    
}