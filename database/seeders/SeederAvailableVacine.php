<?php

namespace Database\Seeders;

use App\Models\Available_vacine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederAvailableVacine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ava_vacine = new Available_vacine();
        $ava_vacine->name = 'Sinovac';
        $ava_vacine->available = 1;

        $ava_vacine->save();
        $this->command->info('created available vacine successfully');
        //php artisan db:seed --class=SeederAvailableVaci
    }
}
