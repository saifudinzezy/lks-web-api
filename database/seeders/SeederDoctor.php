<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederDoctor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = new Doctor();
        $doctor->name = 'Dr. Albert';

        $doctor->save();
        $this->command->info('created doctor successfully');
        //php artisan db:seed --class=SeederDoctor
    }
}
