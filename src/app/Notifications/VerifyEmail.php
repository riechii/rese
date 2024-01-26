<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    /**
     * メール通知のビルド
     *
     * @param string $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('メールアドレスの確認') // メールの件名
            ->line('以下のボタンをクリックしてメールアドレスを確認してください。') // メール本文
            ->action('メールアドレスの確認', $url); // メール本文内のリンク
            
    }
}