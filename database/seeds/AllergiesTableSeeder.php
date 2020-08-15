<?php

use Illuminate\Database\Seeder;

class AllergiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergies')->insert( [
            [
                'slug'    => 'corn',
                'allergy' => 'Corn'
            ],
            [
                'slug'    => 'eggs',
                'allergy' => 'Eggs'
            ],
            [
                'slug'    => 'fish',
                'allergy' => 'Fish'
            ],
            [
                'slug'    => 'meat',
                'allergy' => 'Meat'
            ],
            [
                'slug'    => 'milk',
                'allergy' => 'Milk'
            ],
            [
                'slug'    => 'peanut',
                'allergy' => 'Peanut'
            ],
            [
                'slug'    => 'shellfish',
                'allergy' => 'Shellfish'
            ],
            [
                'slug'    => 'soy',
                'allergy' => 'Soy'
            ],
            [
                'slug'    => 'free_nut',
                'allergy' => 'Free nut'
            ],
            [
                'slug'    => 'wheat',
                'allergy' => 'Wheat'
            ],
            [
                'slug'    => 'fpies',
                'allergy' => 'FPIES'
            ],
            [
                'slug'    => 'no_allergies',
                'allergy' => 'No allergies'
            ],
        ] );

    }
}
