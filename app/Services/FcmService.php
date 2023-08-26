<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FcmService
{
    public function __construct()
    {
        $this->fcmServerKey = env('FCM_SERVER_KEY');
    }

    public function sendPushNotification($targetToken, $title, $body, $data){
        try{
            $fcmEndpoint = 'https://fcm.googleapis.com/fcm/send';

            $headers = [
                'Authorization' => 'key='.$this->fcmServerKey,
                'Content-Type' => 'application/json'
            ];

            $notification = [
                'title' => $title,
                'body' => $body,
                'icon' => null
            ];

            $payload = [
                'to' => $targetToken,
                'notification' => $notification,
                'data' => $data
            ];
            $response = Http::withHeaders($headers)->post($fcmEndpoint, $payload);
            return $response;
        }catch(Exception $error){
            return $error;
        }
    }
}
