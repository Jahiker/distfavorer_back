<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    use Queueable;

     /**
     * The password reset token.
     *
     * @var string
     */
    public $message;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->subject('Nuevo Mensaje de Cliente')
                    ->line('Has recibido un nuevo mensaje de un cliente con los siguientes datos.')
                    ->line('Nombre: ' . $this->message->name)
                    ->line('Teléfono: ' . $this->message->phone)
                    ->line('Email: ' . $this->message->email)
                    ->line('Mensaje: ')
                    ->line($this->message->content)
                    ->salutation('Recuerda responder de forma oportuna cada solicitud del cliente');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
