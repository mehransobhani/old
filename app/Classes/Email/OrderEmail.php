<?php

namespace App\Classes\Email;

class OrderEmail
{
    public static function send($mail , $orderId)
    {
        \Illuminate\Support\Facades\Mail::to($mail)->send(new \App\Mail\OrderMail($orderId));

    }
}
