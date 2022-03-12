<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use Spatie\Permission\Models\Permission;
use App\Enum\GiveAndRevokePermission;

/**
 * Send telegram notification for group
 *
 */
class NotifyToGroupApi extends Notification
{
    use Queueable;

    private $job;
    private $user;
    private $permission;


    /**
     * Create a new notification instance.
     *
     * @return void
     *
     */
    public function __construct(User $user, Permission $permission, GiveAndRevokePermission $job)
    {

        $this->user = $user;
        $this->permission = $permission;
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {

        $text = $this->job == GiveAndRevokePermission::Give  ? '`Give Permission to user`' . PHP_EOL . PHP_EOL  : '`Revoke Permission from user`' .  PHP_EOL .  PHP_EOL;
        $text .= "username : " . $this->user->username .  PHP_EOL;
        $text .= "permission : " . $this->permission->name .  PHP_EOL;
        $text .=  PHP_EOL . PHP_EOL . PHP_EOL;

        return TelegramMessage::create()
            ->to('-724710629')
            ->content($text);
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
            //
        ];
    }
}
