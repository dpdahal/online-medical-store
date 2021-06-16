<?php

use Illuminate\Database\Seeder;

class AdminSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Admin::create([
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('admin002')

        ]);


    }
}
