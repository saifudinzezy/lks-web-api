<?php

namespace Database\Seeders;

use App\Models\Spot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederSpot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spot = new Spot();
        $spot->available_vacines_id = '1';
        $spot->name = 'Purnawati Hospital';
        $spot->serve = '1';
        $spot->capacity = '10';

        $spot->save();
        $this->command->info('created spot successfully');
        // php artisan db:seed --class=SeederSpot
    }
}
