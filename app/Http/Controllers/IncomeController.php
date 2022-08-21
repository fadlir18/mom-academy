<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Validator;
use Illuminate\Http\Request;
use App\Models\Getincome;

class IncomeController extends Controller
{    
    public function index()
    {                
        $data['titlepage'] = 'Get Income';
        return view('income.index',$data);
    }
    public function register(Getincome $model, Request $request)
    {        
        $data_session = AppHelper::getAuth();        
        $name = $request->input('name');        
        $email = $request->input('email');
        $phone = $request->input('phone');        
        $birthdate = $request->input('birthdate');
        $address = $request->input('address');        
        $city = $request->input('city');
        $province = $request->input('province');        
        $apply_as = $request->input('apply_as');
        $link_ig = $request->input('link_ig');        
        $link_fb = $request->input('link_fb');        
        $link_tiktok = $request->input('link_tiktok');        
        $link_twitter = $request->input('link_twitter');        
        $link_youtube = $request->input('link_youtube');  
        $category = $request->input('category');   
        $category2 = $request->input('category2');           
        $current_job = $request->input('current_job');                     
        
        $status = true;
        $code = '200';        
        $message = [];        

        $rules = array(
            'name' => 'required',
            'apply_as' => 'required',
            'phone' => 'required|min:10|max:13',            
            'email' => 'required|email|unique:register_income',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'apply_as' => 'required',
            'category' => 'required',
            'current_job' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {            
            $status = false;
            $code = 422;            
            $message = $validator->errors()->all();
        }
    
        // if ($status) {
        //     $checkMail = $model->db_get_email($email);
        //     if ($checkMail) {                
        //         $status = false;
        //         $message[] = 'email already registered';                
        //         $code = 401;
        //     }
        // }    
        if ($status) {         
            
            $dob = date('Y-m-d', strtotime($birthdate));   
            
            if ($request->has('category2') && !empty($category2)) {
                $category = $category2;
            }
            $params = [
                'user_id' => $data_session->user_id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'birthdate' => $dob,
                'address' => $address,
                'city' => $city,
                'province' => $province,
                'apply_as' => $apply_as,
                'link_ig' => $link_ig,
                'link_fb' => $link_fb,
                'link_tiktok' => $link_tiktok,
                'link_twitter' => $link_twitter,
                'link_youtube' => $link_youtube,
                'category' => $category,
                'current_job' => $current_job,                     
            ];            
            
            $model->db_create($params);            
            $status = true;
            $message[] = 'register success';   

        } 

        $response['status'] = $status;
        $response['code'] = $code;        
        $response['message'] = $message;        
        return response()->json($response);
    }
}
