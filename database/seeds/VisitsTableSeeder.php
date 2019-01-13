<?php

use Illuminate\Database\Seeder;
use App\Visit;
use App\Doctor;
use App\Patient;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // in this function, we create visit samples
    public function run()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        foreach ($patients as $patient) {
            $visit = new Visit();
            $visit->date_visit = $this->randomDate();
            $visit->time_visit = '12:12';
            $visit->patient_id = $patient->id;
            $visit->doctor_id = 1;
            $visit->duration = 30;
            $visit->cost = 49.99;
            $visit->save();
        }
        foreach ($patients as $patient) {
            $visit = new Visit();
            $visit->date_visit = $this->randomDate();
            $visit->time_visit = '12:12';
            $visit->patient_id = $patient->id;
            $visit->doctor_id = 2;
            $visit->duration = 30;
            $visit->cost = 49.99;
            $visit->save();
        }
    }

    private function randomDate() {
        $start = new DateTime('2017-01-01');
        $end = new DateTime('2017-12-31');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate->format('Y-m-d');
    }
}
