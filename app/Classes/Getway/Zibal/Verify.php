<?php
namespace App\Classes\Getway\Zibal;

class Verify
{
    public function veryfy($trackId)
    {
        $parameters = array(
            "merchant" => ZippalStatics::$merchant,//required
            "trackId" => $trackId,//required
        );
        $postToZibal=new PostToZibal();
        return $postToZibal->postToZibal('verify', $parameters);
    }
}
