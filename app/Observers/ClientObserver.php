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
        $client->api_token = Str::random(60);
    }
}
