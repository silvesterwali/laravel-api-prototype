<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use App\Enum\GiveAndRevokeSubMenu;
use App\Models\UserHasPageSubMenu;

class UserHasPageSubMenuNotification extends Notification
{
    use Queueable;
    private $job;
    private $userHasPageSubMenu;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(UserHasPageSubMenu $userHasPageSubMenu, GiveAndRevokeSubMenu $job)
    {
        $this->job = $job;
        $this->userHasPageSubMenu = $userHasPageSubMenu;
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
        $text = $this->job == GiveAndRevokeSubMenu::Give  ? '`Give sub menu to user`' . PHP_EOL . PHP_EOL  : '`Revoke sub menu from user`' .  PHP_EOL .  PHP_EOL;
        $text .= "username : " . $this->userHasPageSubMenu->user->username .  PHP_EOL;
        $text .= "sub page : " . $this->userHasPageSubMenu->page_sub_menu->title .  PHP_EOL;
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
