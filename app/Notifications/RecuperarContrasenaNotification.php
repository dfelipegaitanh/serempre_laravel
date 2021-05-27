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

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Reestablecer Contraseña')
            ->action('Reestablecer Contraseña', $url)
            ->line('Este link expirara en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')])
            ->markdown('mail.correo');
    }
}
