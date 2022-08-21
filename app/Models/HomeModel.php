<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    protected $table = 'course';
    protected $module = 'module_ebook';
    protected $module_video = 'module_video';
    protected $category_module = 'category_module';
    protected $expert = 'expert';
    protected $moms = 'moms';
    protected $events = 'events';
    protected $table_product = 'products';
    protected $job_mom = 'job_mom';

    public function db_course_lists($param)
    {
        $query = DB::table($this->table . ' as prim');        
        $query->select('prim.*','ex.expert_name');
        $query->leftJoin('expert as ex','prim.speaker', '=', 'ex.expert_id');                
        $query->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_module_lists($param)
    {
        $query = DB::table($this->module);                
        $query->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_module_join_lists($param)
    {
        $query = DB::table($this->category_module)
        ->LeftJoin($this->module_video, $this->module_video.'.category_module_id', '=', $this->category_module.'.category_module_id')
        ->LeftJoin($this->module, $this->module.'.category_module_id', '=', $this->module.'.category_module_id')
        ->orderBy($this->module.'.created_at');             
        $query->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_events_lists($param)
    {
        $query = DB::table($this->events);                     
        $query->where('is_publish',1);
        $query->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_expert_lists($param)
    {
        $query = DB::table($this->expert);                
        $query->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_mom_lists($param)
    {
        $query = DB::table($this->moms);                
        $query->join('job_mom', 'job_mom.job_id', '=' , 'moms.job_id')->limit($param['limit']);
        $result = $query->get();        
        return $result;
    }
    public function db_product_lists($param)
    {
        $query = DB::table($this->table_product); 
        $query->limit($param['limit']);
        $result = $query->get();    
        return $result;
    }
}