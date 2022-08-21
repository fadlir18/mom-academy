<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
// use Socialite;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;

use Socialite;
use App\Services\SocialFacebookAccountService;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {        
        return Socialite::driver('facebook')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback(UsersModel $model)
    {
        // $model = new Users();
        try {
            
            $user = Socialite::driver('facebook')->user();
            // dd($user);
            $finduser = $model->db_detail_login('facebook_id',$user->id);
            
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
                    'facebook_id'=> $user->id,
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
            dd($e->getMessage());
        }
    }
}