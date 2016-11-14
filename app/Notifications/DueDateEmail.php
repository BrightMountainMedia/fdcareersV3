<?php

namespace App\Notifications;

use App\User;
use App\Position;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DueDateEmail extends Notification
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
        return (new MailMessage)
                    ->subject('FD Careers DueDate Reminder!')
                    ->view('emails.duedate-reminder', ['user' => $this->user, 'positions' => $this->positions]);
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
