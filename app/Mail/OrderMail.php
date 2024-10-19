<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function build(): self
    {
        return $this->subject(' پیغام جدید از تجهیزلند (ثبت سفارش)')
       ->view('email.order');
    }
}
