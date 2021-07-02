<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $temporary_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $temporary_password)
    {
        $this->user = $user;
        $this->temporary_password = $temporary_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset')->with(['user'=>$this->user, 'tmp_password'=>$this->temporary_password]);
    }
}
