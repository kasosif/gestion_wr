<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientAdded extends Notification
{
    use Queueable;

    private $client;
    private $employe;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($client,$employe)
    {
        $this->client = $client;
        $this->employe = $employe;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'employe' => $this->employe,
            'link' => route('clients.edit',$this->client->id),
            'message' => $this->employe->fullName(). ' Added a new Client "'.$this->client->nom.'"'
        ];
    }
}
