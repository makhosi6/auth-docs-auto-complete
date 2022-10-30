<?php

namespace App\Observers;
use Illuminate\Support\Facades\Log;

use App\Models\Tokens as Token;

class TokenObserver
{
    /**
     * Handle the Token "created" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function created(Token $token)
    {
        //
        Log::debug('Create the token'.$token);
    }

    /**
     * Handle the Token "updated" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function updated(Token $token)
    {
        //
        Log::debug('Updating the token'.$token);
    }

    /**
     * Handle the Token "deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function deleted(Token $token)
    {
        //
        Log::debug('Delete the token'.$token);
    }

    /**
     * Handle the Token "restored" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function restored(Token $token)
    {
        //
    }

    /**
     * Handle the Token "force deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function forceDeleted(Token $token)
    {
        //
        Log::debug('Delete the token -F '.$token);
    }
}
