<?php

namespace App\Notifications;

use App\Http\Resources\Agenda\AgendaResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;
use App\Helpers\NotificationHelper;

class AddNewAgenda extends Notification implements ShouldQueue
{
    use Queueable;

    public $agenda, $from, $to;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($agenda, $from, $to)
    {
        $this->afterCommit();
        
        $this->agenda = $agenda;
        $this->from = $from;
        $this->to = $to;
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
        return ['database', 'broadcast', FcmChannel::class];
    }

    public function toFcm($notifiable)
    {
        $data = $this->toArray($notifiable);
        $data['id'] = $this->id;
        return FcmMessage::create()
            ->setData(["message" => json_encode($data)])
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle(NotificationHelper::notifTitle("U"))
                ->setBody(NotificationHelper::notifBody($this->from->name, $this->agenda->regarding))
            );
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
            'agenda' => new AgendaResource($this->agenda),
            'category' => 'AddNewAgenda'
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
            'agenda' => new AgendaResource($this->agenda),
            'category' => 'AddNewAgenda'
        ]);
    }
}
