<?php

namespace App\Observers;

use App\Models\client;
use Illuminate\Support\Str;

class ClientObserver
{
    /**
     * Handle the client "creating" event.
     */

    public function creating(client $client): void
    {
        $client->password = bcrypt($client->password);
        $client->api_token = Str::random(60);}
    public function created(client $client): void
    {
    }

    /**
     * Handle the client "deleted" event.
     */
    public function deleted(client $client): void
    {
        //
    }

    /**
     * Handle the client "restored" event.
     */
    public function restored(client $client): void
    {
        //
    }

    /**
     * Handle the client "force deleted" event.
     */
    public function forceDeleted(client $client): void
    {
        //
    }
}
