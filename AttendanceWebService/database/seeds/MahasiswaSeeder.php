<?php

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('mahasiswas')->delete();
        
        \DB::table('mahasiswas')->insert(array (
            array (
                'nrp' => "05111540000001",
                'nama_mhs' => 'Damai Marisa',
                'angkatan' => 2015
            ),
            array (
                'nrp' => "05111540000051",
                'nama_mhs' => 'Asadul Haq M Shani',
                'angkatan' => 2015
            ),
        ));
    }
}
