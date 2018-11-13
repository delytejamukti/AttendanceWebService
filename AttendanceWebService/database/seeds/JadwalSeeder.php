<?php

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jadwals')->delete();
        
        \DB::table('jadwals')->insert(array (
            array (
                'dosen_nip' => "197205281997021001",
                'mk_kode' => 'IF184914',
                'kelas' => 'A',
                'hari' => 'Senin',
                'tahun_ajaran' => 2018
            ),
            array (
                'dosen_nip' => "197205281997021001",
                'mk_kode' => 'IF184802',
                'kelas' => 'B',
                'hari' => 'Selasa',
                'tahun_ajaran' => 2018
            ),
        ));
    }
}
