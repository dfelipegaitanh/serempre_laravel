<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Password;

class UserObserver
{

    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if (is_null($user->getAttribute('email_verified_at'))) {
            Password::broker()->sendResetLink(
                ['email' => $user->getAttribute('email')]
            );
        }
    }

}
