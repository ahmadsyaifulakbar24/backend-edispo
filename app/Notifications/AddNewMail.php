<?php

namespace App\Notifications;

use App\Http\Resources\Mail\MailResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddNewMail extends Notification implements ShouldQueue
{
    use Queueable;
    
    public $mail, $from, $to;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mail, $from, $to)
    {
        $this->afterCommit();
        
        $this->mail = $mail;
        $this->from = $from;
        $this->to = $to;
    }

    public function broadcastType()
    {
        return 'AddNewMail';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database', 'broadcast'];
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
            'from' => [
                'id' => $this->from->id,
                'name' => $this->from->name
            ],
            'to' => [
                'id' => $this->to->id,
                'name' => $this->to->name
            ],
            'mail' => new MailResource($this->mail)
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'from' => [
                'id' => $this->from->id,
                'name' => $this->from->name
            ],
            'to' => [
                'id' => $this->to->id,
                'name' => $this->to->name
            ],
            'mail' => new MailResource($this->mail)
        ]);
    }
}
