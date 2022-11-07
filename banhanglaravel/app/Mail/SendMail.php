<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sentData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sentData)
    {
        $this->sentData = $sentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //view ở đây là trang chứa các thông tin mình muốn hiển thị
         return $this->from('dat0303346@gmail.com', 'From Rus')->subject('Thông báo đặt hàng thành công')->replyTo('dat0303346@gmail.com', 'Thành Đạt')->view('emails.successe',['sentData' => $this->sentData]);
    }
}
