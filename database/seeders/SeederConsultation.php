<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederConsultation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultation = new Consultation();
        $consultation->doctor_id = '1';
        $consultation->society_id = '1';
        $consultation->status = 'pending';
        $consultation->disease_history = 'tidak ada';
        $consultation->current_symptoms = 'tidak ada';
        $consultation->doctor_notes = '';

        $consultation->save();
        $this->command->info('created consultation successfully');
        // php artisan db:seed --class=SeederConsultation
    }
}
