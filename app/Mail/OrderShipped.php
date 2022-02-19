<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    private $pageMenus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pageMenus)
    {
        $this->pageMenus = $pageMenus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from("silvester@gmail")
            ->subject('Hura Hura')
            ->markdown('order', ['url' => "www.silvester.com", 'pageMenus' => $this->pageMenus]);
    }
}
