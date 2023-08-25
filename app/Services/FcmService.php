<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FcmService
{
    private $fcmServerKey = 'AAAA6KbL1zc:APA91bFuwEHG67By0uRWo965q1NcLwQovmh_9entqsmNbe6PUVuup1QMeLWWNVCUlo5EhrWMrvx7H0p4wdI5KIVNdcmGTY7xgwpyl59W4gxngulILW2WeenYQafTIs81_ktUbR-apzxk';

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
