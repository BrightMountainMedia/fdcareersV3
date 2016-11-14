<?php

namespace App\Notifications;

use App\User;
use App\Position;
use App\Department;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PositionPublishedAdmin extends Notification
{
    use Queueable;

    protected $user;
    protected $position;
    protected $department;

    private function getPositionType( $position_type )
    {
        if ( $position_type === 'full-time' ) {
            $position_type = 'Full Time';
        } elseif ( $position_type === 'paid-on-call' ) {
            $position_type = 'Paid On Call';
        } elseif ( $position_type === 'part-time' ) {
            $position_type = 'Part Time';
        } elseif ( $position_type === 'volunteer' ) {
            $position_type = 'Volunteer';
        } else {
            $position_type = 'Contractor';
        }

        return $position_type;
    }

    private function limitDetails( $details )
    {
        $limit = 15;
        $details = explode( ' ', $details, $limit );
        if ( count( $details ) >= $limit ) {
            array_pop( $details );
            $details = implode( ' ', $details ).'...';
        } else {
            $details = implode( ' ', $details );
        }
        $details = preg_replace( '`\[[^\]]*\]`', '', $details );
        return $details;
    }

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Position $position, Department $department)
    {
        $this->user = $user;
        $this->position = $position;
        $this->department = $department;
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
        $url = url('/position/'.$this->position->id);

        return (new MailMessage)
            ->subject('[New FDC Position in ' . $this->position->state . ']: ' . $this->position->title)
            ->greeting('Hello, ' . $this->user->first_name . '!')
            ->line('This Fire Department: ' . $this->department->name . ' has posted a new position.')
            ->line('Position Type: ' . $this->getPositionType( $this->position->position_type ))
            ->line('A few details: ' . $this->limitDetails($this->position->application_details))
            ->action('View Position', $url)
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
