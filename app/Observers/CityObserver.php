<?php

namespace App\Observers;

use App\Models\City;
use Illuminate\Support\Facades\Schema;

class CityObserver
{

    public $afterCommit = true;

    /**
     * Handle the City "deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function deleting(City $city)
    {
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Handle the City "force deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function forceDelete(City $city)
    {
        Schema::enableForeignKeyConstraints();
    }
}
