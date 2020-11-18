<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContractAdded extends Notification
{
    use Queueable;
    private $contract;
    private $employe;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contract,$employe)
    {
        $this->contract = $contract;
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
            'link' => route('contrat.edit',$this->contract->id),
            'message' => $this->employe->fullName(). ' Added a new Contract "'.$this->contract->client->nom.'"'        ];
    }
}
