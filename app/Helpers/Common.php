<?php

namespace App\Helpers;

class Common
{
    public static function getAvatar()
    {
        $user = auth()->user();

        if ($user && $user->avatar) {
            return asset('storage/avatars/' . $user->avatar);
        } else {
            return asset('storage/avatars/default.png');
        }
    }
}
