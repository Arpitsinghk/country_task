<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class ExportLocationsToJson extends Command
{
    protected $signature = 'export:locations-json';

    protected $description = 'Export countries, states and cities data to JSON file';

     public function handle()
    {
        $countries = Country::with('states.cities')->get();

        // Build simplified JSON structure
        $data = $countries->map(function ($country) {
            return [
                'country_name' => $country->country_name,
                'states' => $country->states->map(function ($state) {
                    return [
                        'state_name' => $state->state_name,
                        'cities' => $state->cities->pluck('city_name')->toArray()
                    ];
                })->toArray()
            ];
        });

        Storage::put('data/countries_states_cities.json', json_encode($data, JSON_PRETTY_PRINT));

        $this->info('Custom JSON exported successfully to storage/app/data/countries_states_cities.json');
    }
}
