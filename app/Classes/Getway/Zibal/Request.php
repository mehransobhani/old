<?php

namespace App\Classes\Getway\Zibal;

class Request
{
    public function request($amount, $orderId)
    {
        $parameters = array(
            "merchant" => ZippalStatics::$merchant,//required
            "callbackUrl" => ZippalStatics::$callbackUrl,//required
            "amount" => $amount*10,//required
            "orderId" => $orderId,//optional
        );
        $post = new PostToZibal();
        return $post->postToZibal('request', $parameters);


    }
}
