<?php

use Illuminate\Database\Seeder;

class ProductTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name' => 'cetamol',
            'brand_name' => 'cetamol',
            'price' => '10',
            'mg' => '10',
            'image' => 'cetamol',
            'description' => 'Cetamol 650 MG Tablet is used to temporarily 
            relieve fever and mild to moderate pain such as muscle ache,
             headache, toothache, arthritis, and backache. This medicine
              should be used with caution in patients with liver diseases
             due to the increased risk of severe adverse effects',
            'cat_id' => 1,
            'man_date' =>'2019-04-12',
            'exp_date' =>'2020-04-15'


        ]);
    }
}
