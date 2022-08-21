<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $category = 'category_article';

    public function db_lists($param)
    {
        $query = DB::table($this->table)->orderBy('created_at', 'desc')->paginate($param['limit']);               
        // $query->limit($param['limit']);
        // $result = $query->get();        
        return $query;
    }

    public function db_detail($article_id)
    {
        $query = DB::table($this->table)->where('article_id',$article_id)->first();
        return $query;
    }
}