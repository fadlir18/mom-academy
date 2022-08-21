<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index()
    {
        $data['css'] = 'profile/style.css';
        $data['js'] = 'profile/script.js';
        $data['titlepage'] = 'profile';
        return view('profile/profile',$data);
    }
    
    public function edit()
    {
        $data['css'] = 'profile/edit/style.css';
        $data['js'] = 'profile/edit/script.js';
        $data['titlepage'] = 'profile';
        return view('profile/edit_profile',$data);
    }

}
