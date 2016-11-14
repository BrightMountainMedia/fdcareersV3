<?php

namespace App\Notifications;

use App\User;
use App\Position;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReminderEmail extends Notification
{
    use Queueable;

    protected $user;
    protected $positions;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $positions)
    {
        $this->user = $user;
        $this->positions = $positions;
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
        $reset_url = url('/password/reset');

        return (new MailMessage)
                    ->subject('FD Careers Monthly Continuous Recruitment/Until Filled Reminder!')
                    ->view('emails.reminder', ['user' => $this->user, 'positions' => $this->positions]);
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
