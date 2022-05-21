<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederRegional::class);
        $this->call(SeederSociety::class);
        $this->call(SeederDoctor::class);
        $this->call(SeederConsultation::class);
        $this->call(SeederSpot::class);
        $this->call(SeederAvailableVacine::class);
    }
}
