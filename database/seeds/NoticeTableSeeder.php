<?php

use Illuminate\Database\Seeder;

class NoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Notice::create([
            'title' => 'Medicine is the science and practice diagnosis',
            'slug' => 'Medicine-is-the-science-and-practice-of-disease',
            'date' => \Illuminate\Support\Carbon::now()->toDate(),
            'description' => "Medicine is the science and practice of establishing the
             diagnosis, prognosis, treatment, and prevention of disease. Medicine encompasses
              a variety of health care practices evolved 
            to maintain and restore health by the prevention and treatment of illness"

        ]);
    }
}
