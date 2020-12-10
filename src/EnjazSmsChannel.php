<?php

namespace Hsmfawaz\EnjazSms;

use Illuminate\Notifications\Notification;

class EnjazSmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toEnjazSms($notifiable);
        $enjazSms = new EnjazSms();
        $result = $enjazSms->to($message['phone'])->send($message['body']);
        if (isset($message['debug']) && $message['debug']) {
            info($result);
        }

        return $result;
    }
}