<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{    
    protected $moms = 'moms';
   
    public function db_lists($param)
    {
        $query = DB::table($this->moms);                
        $query->join('job_mom', 'job_mom.job_id', '=' , 'moms.job_id')->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
}