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
        $ava_vacine->spot_id = '1';
        $ava_vacine->sinovac = 1;
        $ava_vacine->astrazeneca = 0;
        $ava_vacine->moderna = 0;
        $ava_vacine->pfizer = 1;
        $ava_vacine->sinnopharm = 1;

        $ava_vacine->save();
        $this->command->info('created available vacine successfully');
        //php artisan db:seed --class=SeederAvailableVaci
    }
}
