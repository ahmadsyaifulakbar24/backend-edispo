<?php

namespace App\Helpers;

/**
 * Format response.
 */
class FindSuperior
{

    public static function superior($user)
    {
        if($user->role == 'assistant') {
            $user_id = $user->user_group()->where('superior', 1)->parent_id;
        } else {
            $user_id = $user->id;
        }

        return $user_id;
    }
}