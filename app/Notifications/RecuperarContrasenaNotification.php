<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecuperarContrasenaNotification extends ResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        $url = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return $this->buildMailMessage($url);
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Reestablecer Contraseña')
            ->action('Reestablecer Contraseña', $url)
            ->line('Este link expirara en '.config('auth.passwords.users.expire').' minutos.')
            ->markdown('mail.correo');
    }
}
