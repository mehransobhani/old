<?php

namespace App\Classes\SMS;

class SMSCode
{
    private static $TOKEN="545A5A30322B6B646861622B7249693052326A597873705630322B734F6D417775756A646E56335A554A343D";
    public static function send($token, $template ,$receptor)
    {
        $data = [
            'receptor' => $receptor,
            'token' => $token,
            'template' => $template
        ]; 
        $ch = curl_init("http://api.kavenegar.com/v1/".self::$TOKEN."/verify/lookup.json");
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