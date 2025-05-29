<?php

namespace App\Console\Commands;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImportLocationData extends Command
{
    protected $signature = 'import:locations';
    protected $description = 'Import countries, states, and cities from a JSON file';
            // $json = Storage::get('data/countries+states+cities.json');

       public function handle()
    {
        $json = Storage::get('data/countries_states_cities.json');
        $data = json_decode($json, true);

        DB::transaction(function () use ($data) {
            foreach ($data as $countryData) {
                $country = Country::create(['country_name' => $countryData['country_name']]);

                foreach ($countryData['states'] as $stateData) {
                    $state = $country->states()->create(['state_name' => $stateData['state_name']]);

                    $cities = array_map(fn($city) => ['city_name' => $city], $stateData['cities']);
                    $state->cities()->createMany($cities);
                }
            }
        });

        $this->info('Data imported successfully!');
    }


}
