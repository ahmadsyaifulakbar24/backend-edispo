<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Constant;
use Illuminate\Support\Facades\{Log};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function fcmNotif($object, $to, $title, $body){
        $json = json_encode($object);
        $postField = [
            'to' => $to,
            'priority' => 'high',
            'soundName' => 'default',
            'data' => [
                'message' => $json,
            ],
            'notification' => [
                'title' => $title,
                'body' => $body,
            ]
        ];
        Log::info($postField);
        Log::info('---------------------------------------------');

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => Constant::$fmcEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => Constant::$methodPost,
        CURLOPT_POSTFIELDS => json_encode($postField),
        CURLOPT_HTTPHEADER => array(
            'Authorization: key='.Constant::$fmcKeyServer,
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        Log::info("response fcm:");
        curl_close($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            Log::error($error_msg);
        } else {
            Log::info($response);
        }
        Log::info('=============================================');
        return $response;
    }

    function notifTitle($category){
        $result = "Pemberitahuan";
        switch ($category) {
            case "A":
            case "W":
            case "S":
                $result = "Surat";
                break;
            
            case "ND":
                $result = "Nota Dinas";
                break;
            
            case "U":
                $result = "Undangan";
                break;
            
            case "D":
                $result = "Disposisi Masuk";
                break;

            case "STM":
                $result = "Surat Turunan Menteri";
                break;
            
            case "T":
                $result = "Tembusan";
                break;
        }
        return $result;
    }

    function notifBody($from, $regarding){
        return "Dari {$from}, perihal {$regarding}";
    }
}
