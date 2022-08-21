<?php

namespace App\Helpers;

use Crypt;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AppHelper
{

    public static function getAuth ($param = '')
    {
        $session = request()->session()->get('user_login');
        $results = '';

        if (!empty($session)) {
            $session = (array)json_decode($session);

            if (empty($param)) {
                $results = (object)$session;
            }
            else {
                $key_exists = array_key_exists($param, $session);

                if ($key_exists) {
                    $results = $session[$param];
                }
                else {
                    $results = '';
                }
            }
        }

        return $results;
    }

    // public static function mem_cache()
    // {   
        
    //     $decode = json_decode(Crypt::decrypt(Cookie::get('user_mem_')));
    //     $cache = Cache::get('user_mem_' . $decode->admin_id);

    //     return $cache;
    // }
    public static function guzzle($data)
    {
        $client = new Client();

        try {
            $api_response = $client->request($data['method'], $data['url'], $data['param']);
            $result = $api_response->getBody()->getContents();
        } catch (GuzzleException $e) {
            dd($e->getMessage());
            return abort(404);
        }

        return $result;
    }
}
