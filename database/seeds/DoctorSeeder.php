<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Doctor::create([
            'name' => 'doctor',
            'username' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('doctor002')

        ]);
    }
}
