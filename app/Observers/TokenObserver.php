<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

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

        try {
            ///
            $response = Http::withToken(env('ADMIN_TOKEN','bad-token'))->post(env('SERVICE_ONE','http://192.168.0.135:3001/secret/whitelist'), array($token));
            //
            Log::debug('\CREATE the token' . $token. "  STATUS = ".$response->status());
        } catch (\Throwable $th) {

            Log::debug('Error ==> ' . $th);
        }
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
        Log::debug('Updating the token' . $token);
    }

    /**
     * Handle the Token "deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function deleted(Token $token)
    {
        try {
            ///
            $response = Http::withToken(env('ADMIN_TOKEN','bad-token'))->delete(env('SERVICE_ONE','http://192.168.0.135:3001/secret/whitelist'), array($token));

            Log::debug('\DELETE the token' . $token . "  STATUS = ".$response->status());
        } catch (\Throwable $th) {

            Log::debug('Error ==> ' . $th);
        }
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
        try {
            //
            ///
            $response = Http::withToken('token')->delete(env('SERVICE_ONE','http://192.168.0.135:3001/secret/whitelist'), array($token));

            Log::debug('\DELETE the token -F' . $token . "  STATUS = ".$response->status());
        } catch (\Throwable $th) {

            Log::debug('Error ==> ' . $th);
        }
    }
}
