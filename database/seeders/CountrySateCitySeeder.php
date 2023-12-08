<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
  
class CountrySateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $country = Country::create(['name' => 'United State']);
  
        $state = State::create(['country_id' => $country->id, 'name' => 'Florida']);
  
        City::create(['state_id' => $state->id, 'name' => 'Miami']);
        City::create(['state_id' => $state->id, 'name' => 'Tampa']);

  

        $country = Country::create(['name' => 'India']);
  
        $state = State::create(['country_id' => $country->id, 'name' => 'Gujarat']);
    
        City::create(['state_id' => $state->id, 'name' => 'Ahmedabad']);
        City::create(['state_id' => $state->id, 'name' => 'Surat']);
        City::create(['state_id' => $state->id, 'name' => 'Rajkot']);
        City::create(['state_id' => $state->id, 'name' => 'Vadodara']);
        City::create(['state_id' => $state->id, 'name' => 'Bhavnagar']);
        City::create(['state_id' => $state->id, 'name' => 'Gandhinagar']);

        $state = State::create(['country_id' => $country->id, 'name' => 'Bihar']);

        City::create(['state_id' => $state->id, 'name' => 'Patna']);
        City::create(['state_id' => $state->id, 'name' => 'Muzaffarpur']);



        $country = Country::create(['name' => 'Japan']);

        $state = State::create(['country_id' => $country->id, 'name' => 'Tokyo']);

        City::create(['state_id' => $state->id, 'name' => 'Ginza']);
        City::create(['state_id' => $state->id, 'name' => 'Shibuya.']);

    }
}