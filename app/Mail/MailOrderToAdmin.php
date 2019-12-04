<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Collection;

class MailOrderToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.mail_order_to_admin')
            ->with([
                'countOrder' => $this->data->count(),
            ]);
    }
}
