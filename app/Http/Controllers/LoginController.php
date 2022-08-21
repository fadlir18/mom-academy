<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(UsersModel $model, Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $checker = true;

        $status = true;
        $code = '200';        
        $message = [];        

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:8',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $checker = false;
            $status = false;
            $code = 422;            
            $message = $validator->errors()->all();
        }

        if ($checker) {            
            $checkUser = $model->db_get_email($email);            
            if (!$checkUser) {
                $checker = false;
                $status = false;
                $message[] = 'invalid email';                
                $code = 401;
            }
        }
        if ($checker) {                
            $checkPassword = Hash::check($password, $checkUser->password);               
            if (!$checkPassword) {                        
                $status = false;
                $message[] = 'invalid password';                
                $code = 401;
            } else {                
                $user_session = array(
                    'user_id' => $checkUser->user_id,
                    'user_email' => $checkUser->email,                    
                    'user_name' => $checkUser->name,
                    'user_login' => true,                    
                );
    
                // ** Create New Session 
                request()->session()->put('user_login', json_encode($user_session));

                $status = true;
                $message[] = 'login success';                
            }
        } 

        $response['status'] = $status;
        $response['code'] = $code;        
        $response['message'] = $message;        
        return response()->json($response);
    }
    public function register(UsersModel $model, Request $request)
    {
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');        
        $password = $request->input('password');
        $repassword = $request->input('password_confirmation');        

        $status = true;
        $code = '200';        
        $message = [];        

        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'optional|min:10|max:13',            
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required'
        ];
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'nullable|min:10|max:13',            
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required'
        ]);
        if ($validator->fails()) {            
            $status = false;
            $code = 422;            
            $message = $validator->errors()->all();
        }

        if ($status) {
            if ($repassword != $password) {                
                $status = false;
                $message[] = 'password confirmation does not match';                
                $code = 401;
            }
        }
        if ($status) {
            $checkMail = $model->db_get_email($email);
            if ($checkMail) {                
                $status = false;
                $message[] = 'email already registered';                
                $code = 401;
            }
        }    
        if ($status) {                
            $fullname = $name .' '.$lastname;            
            $params = [
                'name' => $fullname,           
                'phone' => $phone,            
                'email' => $email,
                'role_id' => 3,    
                'password' => Hash::make($password)              
            ];            
            $insertUser = $model->db_insert($params);

            $user_session = array(
                'user_id' => $insertUser,
                'user_email' => $email,                    
                'user_name' => $name,
                'user_login' => true,                    
            );

            // ** Create New Session 
            request()->session()->put('user_login', json_encode($user_session));

            $status = true;
            $message[] = 'login success';   

        } 

        $response['status'] = $status;
        $response['code'] = $code;        
        $response['message'] = $message;        
        return response()->json($response);
    }
    public function logout(Request $request)
    {
        request()->session()->forget('user_login');

        return redirect('/home');
    }
}
