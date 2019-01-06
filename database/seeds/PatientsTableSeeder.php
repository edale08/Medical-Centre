<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $patient = new Patient();
        $patient->name = 'Anne';
        $patient->phone_number = '0871234567';
        $patient->postal_address = '10 Dublin Street';
        $patient->email_address = 'anne@example.com';
        $patient->insurance = true;
        $patient->insurance_company = 'VHI';
        $patient->policy_number = 'ABC123';
        $patient->save();

        $patient = new Patient();
        $patient->name = 'Billy';
        $patient->phone_number = '0871212167';
        $patient->postal_address = '10 Wexford Street';
        $patient->email_address = 'billy@example.com';
        $patient->insurance = true;
        $patient->insurance_company = 'VHI';
        $patient->policy_number = 'ABC123';
        $patient->save();

        $patient = new Patient();
        $patient->name = 'Cristo';
        $patient->phone_number = '0872134567';
        $patient->postal_address = '21 Dublin Street';
        $patient->email_address = 'cristo@example.com';
        $patient->insurance = false;
        $patient->save();

        $patient = new Patient();
        $patient->name = 'David';
        $patient->phone_number = '0873334567';
        $patient->postal_address = '56 Dublin Street';
        $patient->email_address = 'david@example.com';
        $patient->insurance = true;
        $patient->insurance_company = 'VHI';
        $patient->policy_number = 'ABC123';
        $patient->save();

        $patient = new Patient();
        $patient->name = 'Eric';
        $patient->phone_number = '0852234567';
        $patient->postal_address = '33 Dublin Street';
        $patient->email_address = 'eric@example.com';
        $patient->insurance = false;
        $patient->save();
    }
}
