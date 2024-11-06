



<?php

use App\Models\Chat;

if (!function_exists('get_model_unread_chats')) {
    function get_model_unread_chats($modelId)
    {
        return Chat::where('userid', $modelId)->where('model_status','=', 'pending')->count();
    }
}
if (!function_exists('get_user_unread_chats')) {
    function get_user_unread_chats($modelId)
    {
        return Chat::where('userid', $modelId)->where('user_status','=', 'pending')->count();
    }
}

if (!function_exists('get_last_message_user')) {
    function get_last_message_user($modelId)
    {
        $chat =  Chat::where('userid', $modelId)->latest()->first();
        if (!is_null($chat)){
            return $chat->message;
        }else{
            return  "............";
        }

    }
}

if (!function_exists('get_last_message_user')) {
    function get_last_message_user($modelId)
    {
        $chat =  Chat::where('userid', $modelId)->latest()->first();
        if (!is_null($chat)){
            return $chat->message;
        }else{
            return  "............";
        }

    }
}

if (!function_exists('get_user_wallet')) {
    function get_user_wallet($userid): string
    {
        $user_info =  \App\Models\User::where('id', $userid)->first();
        if (is_null($user_info)){
            return "";
        }else{
            return  $user_info->coin_balance;
        }

    }
}


if (!function_exists('get_last_message_model')) {
    function get_last_message_model($modelId)
    {
        $chat =  Chat::where('modelId', $modelId)->latest()->first();
        if (!is_null($chat)){
            return $chat->message;
        }else{
            return  "............";
        }

    }
}
