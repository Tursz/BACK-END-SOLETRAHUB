<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Gerando o token de esqueci a senha.
     */
    protected $token;
    public function __construct(User $user)
    {
        $this->token = random_int(0, 999999);

        if(DB::select('select * from password_reset_tokens where email  = ?', [$user->email])){
            DB::update("update password_reset_tokens set token = ? WHERE email = ?", [$this->token, $user->email]);
        }else{
            DB::insert('insert into password_reset_tokens (email, token) values (?, ?)', [$user->email, $this->token]);
        }
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.forgot-password',
            with: [
                'token' => $this->token
            ]
        );
    }
}