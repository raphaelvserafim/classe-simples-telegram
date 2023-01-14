<?php

namespace Cachesistemas\ClasseSimplesTelegram;

class Telegram
{

    public  $bot_id = "YOUR_BOT_ID";
    private $api = "https://api.telegram.org/bot";

    public function __construct()
    {
        $this->api .= $this->bot_id;
    }

    public function sendMessage($chat_id, $text, $keyboard = [])
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'reply_markup' => json_encode([
                'inline_keyboard' => $keyboard
            ])
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        file_get_contents($this->api . "/sendMessage", false, $context);
    }

    public function sendPhoto($chat_id, $photo_url, $caption = "")
    {
        $data = [
            'chat_id' => $chat_id,
            'photo' => $photo_url,
            'caption' => $caption
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        file_get_contents($this->api . "/sendPhoto", false, $context);
    }

    public function sendAudio($chat_id, $audio_url, $caption = "")
    {
        $data = [
            'chat_id' => $chat_id,
            'audio' => $audio_url,
            'caption' => $caption
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context  = stream_context_create($options);
        file_get_contents($this->api . "/sendAudio", false, $context);
    }
}
