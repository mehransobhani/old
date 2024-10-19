<?php

namespace App\Classes\SMS;

class SMS
{
    private static $NUMBER="1000000020022";
    private static $TOKEN="545A5A30322B6B646861622B7249693052326A597873705630322B734F6D417775756A646E56335A554A343D";
    public static function send($message ,$receptor)
    {
        $data = [
            'receptor' => $receptor,
            'sender' => self::$NUMBER,
            'message' => $message
        ];

        $ch = curl_init("http://api.kavenegar.com/v1/".self::$TOKEN."/sms/send.json");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: multipart/form-data')
        );

       $result= curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
     }

}
