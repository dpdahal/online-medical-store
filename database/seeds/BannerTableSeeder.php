<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'title' => 'Medicine Marble statue of Asclephius on a pedestal',
                'slug' => 'Medicine-Marble-statue-of-Asclephius-on-a-pedestal',
                'image' => 'banner1.jpg',
                'description' => '
Medicine
Marble statue of Asclephius on a pedestal, symbol of medicine in Western medicine
Statue of Asclepius, the Greek god of medicine, holding the symbolic Rod of Asclepius with its coiled serpent
Specialist	Medical specialty
Glossary	Glossary of medicine
Medicine is the science and practice of establishing the diagnosis, prognosis, treatment, and prevention of disease. Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. Contemporary medicine applies biomedical sciences, biomedical research, genetics, and medical technology to diagnose, treat, and prevent injury and disease, typically through pharmaceuticals or surgery, but also through therapies as diverse as psychotherapy, external splints and traction,
 medical devices, biologics, and ionizing radiation, amongst others'
            ],
            [
                'title' => 'Medicine Marble statue of Asclephius on a pedestal status',
                'slug' => 'Medicine-Marble-statue-of-Asclephius-on-a-pedestal-status',
                'image' => 'banner2.jpg',
                'description' => '
Medicine
Marble statue of Asclephius on a pedestal, symbol of medicine in Western medicine
Statue of Asclepius, the Greek god of medicine, holding the symbolic Rod of Asclepius with its coiled serpent
Specialist	Medical specialty
Glossary	Glossary of medicine
Medicine is the science and practice of establishing the diagnosis, prognosis, treatment, and prevention of disease. Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. Contemporary medicine applies biomedical sciences, biomedical research, genetics, and medical technology to diagnose, treat, and prevent injury and disease, typically through pharmaceuticals or surgery, but also through therapies as diverse as psychotherapy, external splints and traction, 
medical devices, biologics, and ionizing radiation, amongst others'
            ]

        ]);
    }
}
