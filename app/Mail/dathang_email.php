<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\dathang;

class dathang_email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $dathang;
    public function __construct(dathang $dh)
    {
        //
        $this->dathang=$dh;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('dathang_chitiet')
        ->subject('Đặt hàng thành công tại ' . config('app.name', 'ShopMobile'));
    }
}
