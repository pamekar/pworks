<?php

namespace App\Services;

use App\Models\User;

trait CommentsManager
{
    public function storeComment($id, $comment)
    {
        $user = User::findorFail($id);
        $user->comments()->create(['value' => $comment]);

        return $user;
    }
}
