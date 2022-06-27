<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class BreweriesService
{


    public function getBreweries()
    {
        $responce=Http::get('https://api.openbrewerydb.org/breweries');
        return($responce->json());
    }
}
