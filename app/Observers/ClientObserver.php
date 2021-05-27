<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Facades\Schema;

class ClientObserver
{

    /**
     * Handle the Client "deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function deleting(Client $client)
    {
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        Schema::enableForeignKeyConstraints();
    }
}
