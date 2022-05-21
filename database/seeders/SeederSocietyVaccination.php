<?php

namespace Database\Seeders;

use App\Models\SocietyVaccination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederSocietyVaccination extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $society_vacination = new SocietyVaccination();
        $society_vacination->spot_id = '1';
        $society_vacination->society_id = '1';

        $society_vacination->save();
        $this->command->info('created society vaccination successfully');
    }
}
