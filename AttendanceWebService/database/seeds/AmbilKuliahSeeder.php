<?php

use Illuminate\Database\Seeder;

class AmbilKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ambil_kuliahs')->delete();
        
        \DB::table('ambil_kuliahs')->insert(array (
            array (
                'nrp' => "197205281997021001",
                'jadwal_id' => 1,
                
            ),
            array (
                'nrp' => "05111540000051",
                'jadwal_id' => 1,
                
            ),
        ));
    }
}
