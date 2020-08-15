<?php

use Illuminate\Database\Seeder;

class SpiceTableRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('spice_rating')->insert( [
            [
                'spice'    => 'No spice',
            ],
            [
                'spice'    => 'Mild',
            ],
            [
                'spice'    => 'Hot',
            ],
            [
                'spice'    => 'Extreme',
            ],  
        ] );
    }
}
