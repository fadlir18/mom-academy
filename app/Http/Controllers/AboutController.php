<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\AboutModel;

class AboutController extends Controller
{    
    public function index(AboutModel $model)
    {                
        $moms   = $model->db_lists(['limit' => 6]);        
        $data['results'] = $moms;
        $data['titlepage'] = 'About Us';
        return view('about.index',$data);
    }
}
