<?php

namespace App\Helpers;

class Common
{
    public static function getAvatar()
    {
        $user = auth()->user();

        if ($user && $user->avatar) {
            return asset('assets/images/avatars/users/' . $user->avatar);
        } else {
            $rand = rand(1, 100);
            return asset("assets/images/avatars/default/$rand.png");
        }
    }

    public static function errorAvatar()
    {
        $rand = rand(1, 100);
        return asset("assets/images/avatars/default/$rand.png");
    }
}
