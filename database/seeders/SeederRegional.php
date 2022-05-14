<?php

namespace Database\Seeders;

use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederRegional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regional = new Regional();
        $regional->province = 'DKI Jakarta';
        $regional->district = 'Central Jakarta';

        $regional->save();
        $this->command->info('created regional successfully');

        //php artisan db:seed --class=SeederRegional
    }
}
