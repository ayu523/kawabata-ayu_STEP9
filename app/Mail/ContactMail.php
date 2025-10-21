<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // ← 入力データを保持

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('【お問い合わせ】' . $this->data['name'] . '様より')
                    ->view('emails.contact'); // ← 次に作るメールテンプレート
    }
}
