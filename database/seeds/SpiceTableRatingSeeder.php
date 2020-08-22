<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('spice_ratings')->insert( [
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
