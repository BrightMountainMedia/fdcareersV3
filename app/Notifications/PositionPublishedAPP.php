<?php

namespace App\Notifications;

use App\Position;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Spark\Notifications\SparkChannel;
use Laravel\Spark\Notifications\SparkNotification;

class PositionPublishedAPP extends Notification
{
    use Queueable;

    protected $position;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SparkChannel::class];
    }

    /**
     * Get the spark representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Laravel\Spark\Notifications\SparkNotification
     */
    public function toSpark($notifiable)
    {
        return (new SparkNotification)
            ->action('View Position', url('/position/' . $this->position->id))
            ->icon('fa-fire-extinguisher')
            ->body('A new position: ' . $this->position->title . ' has been added in the state of ' . $this->position->state . '!');
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
