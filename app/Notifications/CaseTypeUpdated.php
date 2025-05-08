<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CaseTypeUpdated extends Notification
{
    use Queueable;

    protected $patient;
    protected $oldCaseType;
    protected $newCaseType;

    public function __construct($patient, $oldCaseType, $newCaseType)
    {
        $this->patient = $patient;
        $this->oldCaseType = $oldCaseType;
        $this->newCaseType = $newCaseType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Case Type Has Been Updated')
            ->greeting('Hello ' . $this->patient->name . ',')
            ->line('Your case type has been updated.')
            ->line('Old Case Type: ' . $this->oldCaseType)
            ->line('New Case Type: ' . $this->newCaseType)
            ->line('If you have any questions, please contact us.')
            ->salutation('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}