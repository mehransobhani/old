<?php

namespace App\Classes\SMS;

class ResetPasswordMessage
{
    public static function message($code)
    {
        return "تجهیزلند . کد بازیابی رمز عبور شما : ".$code;
    }
}
