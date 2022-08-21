<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\AppHelper;

class Api extends Model
{
    public static function login($param)
    {
        $data['method'] = 'POST';
        $data['url'] = 'https://zonderstudio.com/api/auth/login';
        $data['param'] = [
            // 'headers' => [
                // 'Content-Type' => 'application/json',
                // 'Content-Length' => '<calculated when request is sent>',
                // 'Host' => '<calculated when request is sent>',
                // 'Accept' => '*/*'
            // ],
            // ('Authorization' => config('custom.api_auth')),
            'form_params' => $param
        ];

        return json_decode(AppHelper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    }
    public static function event_with_limit($param)
    {
        $data['method'] = 'POST';
        $data['url'] = 'https://zonderstudio.com/api/v1/eventByLimit?limit='.$param['limit'];
        $data['param'] = [
            'headers' => ['Authorization' => 'Bearer '.$param['token']],
            // 'form_params' => $param
        ];

        return json_decode(AppHelper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    }
    public static function course_with_limit($param)
    {
        $data['method'] = 'POST';
        $data['url'] = 'https://zonderstudio.com/api/v1/courseByLimit?limit='.$param['limit'];
        $data['param'] = [
            'headers' => ['Authorization' => 'Bearer '.$param['token']],
            // 'form_params' => $param
        ];

        return json_decode(AppHelper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    }
    public static function course_with_id($param)
    {
        $data['method'] = 'GET';
        $data['url'] = 'https://zonderstudio.com/api/v1/course/'.$param['id'];
        $data['param'] = [
            'headers' => ['Authorization' => 'Bearer '.$param['token']],
            // 'form_params' => $param
        ];

        return json_decode(AppHelper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    }

    // public static function postAdsenseDelete($param)
    // {
    //     $data['method'] = 'POST';
    //     $data['url'] = config('custom.api_url') . '/adsense_host/delete';
    //     $data['param'] = array(
    //         'headers' => array('Authorization' => config('custom.api_auth')),
    //         'form_params' => $param
    //     );

    //     return json_decode(Helper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    // }

    // public static function upload_file($param)
    // {
    //     $data['method'] = 'POST';
    //     $data['url'] = config('custom.api_url') . '/upload_host/image';
    //     $data['param'] = array(
    //         'headers' => array('Authorization' => config('custom.api_auth')),
    //         'multipart' => [
    //             [
    //                 'name'     => $param['name'],
    //                 'contents' => $param['contents']
    //             ],
    //             [
    //                 'name' => 'path',
    //                 'contents' => $param['path']
    //             ]
    //         ]
    //     );

    //     return json_decode(Helper::guzzle($data), false, 512, JSON_BIGINT_AS_STRING);
    // }

}