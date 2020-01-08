<?php

namespace App\Notifications;

use App\Mail\EventRegistredMail as Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventParticipationRegistredEvent extends Notification
{
    use Queueable;
    private $event;

    /**
     * Create a new notification instance.
     *
     * @param $event
     */
    public function __construct($event)
    {
        //
        $this->event = $event;
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
//            return (new MailMessage)
//                        ->subject('Pré-inscription au Congrès Annuel de l\'ANDEL')
//                        ->from('contact@andel-dz.com')
//                        ->line('Merci pour votre inscription à ' . config('app.name'))
//    //                    ->action('Notification Action', url('/'))
//                        ->line('Vous avez également été pré-inscrit à l\'évènement : ' . $this->event->nom);
        return (new MailMessage)->view(
            'emails.template', ['event' => $this->event]
        );
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
