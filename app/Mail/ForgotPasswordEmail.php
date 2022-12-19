<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Tools\RestoreToken;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $user->remember_token = "";
        $user->save();
        $user->remember_token = RestoreToken::make($user);
        $user->save();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_NAME'))->subject("Recuperar contraseña")->view('mail.forgotPassword',["user"=>$this->user]);
    }
}
