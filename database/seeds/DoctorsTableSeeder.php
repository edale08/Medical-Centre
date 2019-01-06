<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $doctor = new Doctor();
        $doctor->name = 'Dr. Apple';
        $doctor->postal_address = '7 St Vincents';
        $doctor->phone_number = '0871234567';
        $doctor->email_address = 'drapple@example.com';
        $doctor->date_started = date("Y-m-d");
        $doctor->save();

        $doctor = new Doctor();
        $doctor->name = 'Dr. Sony';
        $doctor->postal_address = '7 St Vincents';
        $doctor->phone_number = '0871234447';
        $doctor->email_address = 'drsony@example.com';
        $doctor->date_started = date("Y-m-d");
        $doctor->save();
    }
}
