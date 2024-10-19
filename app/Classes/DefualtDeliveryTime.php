<?php

namespace App\Classes;

class DefualtDeliveryTime
{
    private  static $Time=2;
    public static function Get()
    {
        return self::$Time;
    }
}
