<?php

namespace Database\Seeders;

use App\Models\Society;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederSociety extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $society = new Society();
        $society->regional_id = '1';
        $society->id_card_number = '2393029302930291';
        $society->name = 'Siti Puspita';
        $society->born_date = date('Y-m-d');
        $society->gender = 'male';
        $society->address = 'Ki. Raya Setiabudhi No. 790';
        $society->password = \Hash::make('user1234');

        $society->save();
        $this->command->info('created society successfully');
        // php artisan db:seed --class=SeederSociety
    }
}
