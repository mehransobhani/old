<?php

namespace App\Classes\SMS;

class OrderMessage
{
    public static function message($orderId)
    {
        return "پرداخت شما با کد رهگیری :  ". $orderId ." با موفقیت انجام شد به زودی کارشناسان تجهیزلند با شما تماس میگیرند";
    }
}
