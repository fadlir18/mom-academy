<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\ArticleModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{    
    protected $currentTime;
    protected $table = 'articles';

    public function __construct()
    {        
        $this->currentTime = Carbon::now()->toDateTimeString();
    }
    
    public function index(ArticleModel $model, Request $request)
    {                
        $param =  [
            'limit' => 9
        ];

        $search = $request->search;
        if($request->has('search')){
            $articles = DB::table($this->table)->where(function($articles) use($search) {
                $articles->where('title', 'LIKE', "%{$search}%" )
                    ->orWhere ( 'content', 'LIKE', "%{$search}%" );
            })->paginate($param['limit']);
        }else{
            $articles = $model->db_lists($param); 
        }

        // dd($articles);
        // $dt = date('d F Y', strtotime($articles[0]->created_at));
        // dd($dt);
        $data['results'] = $articles;
        $data['titlepage'] = 'Article';
        return view('article.index',$data);
    }
    public function detail(ArticleModel $model, Request $request, $article_id)
    {                        
        $articles = $model->db_detail($article_id);
        // dd($articles);
        $data['results'] = $articles;
        $data['titlepage'] = 'Article';
        return view('article.detail',$data);
    }
}
