<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\M_Checkout;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(M_Checkout $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pesanan Anda')
                    ->markdown('emails.order_confirmation');
    }
}
