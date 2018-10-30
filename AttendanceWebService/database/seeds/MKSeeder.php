<?php

use Illuminate\Database\Seeder;

class MKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('mata_kuliahs')->delete();
        
        \DB::table('mata_kuliahs')->insert(array (
            array (
                'kode_mk' => 'IF184802',
                'nama_mk' => 'Tugas Akhir',
            ),
            array (
                'kode_mk' => 'IF184914',
                'nama_mk' => 'Teknologi IoT',
            ),
        ));
    }
}
