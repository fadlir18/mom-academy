<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
// use Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UsersModel;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(UsersModel $model)
    {
        // $model = new Users();
        try {
            
            $user = Socialite::driver('google')->user();
            
            $finduser = $model->db_detail_login('google_id',$user->id);
            
            if($finduser){

                $user_session = array(
                    'user_id' => $finduser->user_id,
                    'user_email' => $finduser->email,                    
                    'user_name' => $finduser->name,
                    'user_login' => true,                    
                );
    
                // ** Create New Session 
                request()->session()->put('user_login', json_encode($user_session));                    
            }else{
                $params = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 3,
                    'google_id'=> $user->id,
                    'password' => Hash::make('secret_password')
                ];
                
                $insertUser = $model->db_insert($params);
                
                if ($insertUser) {
                        
                    $user_session = array(
                        'user_id' => $insertUser,
                        'user_email' => $user->email,                        
                        'user_name' => $user->name,
                        'user_login' => true,                    
                    );
        
                    // ** Create New Session 
                    request()->session()->put('user_login', json_encode($user_session));
                }                
            }
            
            return redirect('/home');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect('/');
        }
    }
}