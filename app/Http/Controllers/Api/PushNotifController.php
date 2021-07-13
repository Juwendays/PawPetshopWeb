<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushNotifController extends Controller {
    public function pushNotif(Request $requset) {

        $mData = [
            'title' => "Coba notif",
            'body' => "body message"
        ];

        $fcm[] = "efgVsi14TOG0r5L3ESaNKQ:APA91bGNNJuGC4IZVj8tzPU1BY_sTD8ssw-Cc2uhjrSE62Fg4utTLABPQ2s3xWN7ZLIZrKW-vO2FUAC-9CMWhcGsNZHacHn3JZa2SVzdHCE945sDg9xQ6yN3upjOpSwuVCY4ipZmgBuZ";

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAAbRjDTVg:APA91bEvwnFOg9sIUm4oIGp7Y4O3u1BZuWTrabSz5_u5_IKlGydlfqoO11rtGHoTQ7yN00fhIA0nydwI7USsAnYgsRzHTHf4Dm-NXyySraPp2VRK2szsuVftDSZcfM2VwoW-gndUgRdo"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }
}
