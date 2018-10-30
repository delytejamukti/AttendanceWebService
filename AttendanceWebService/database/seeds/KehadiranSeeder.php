<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kehadirans')->delete();
        
        \DB::table('kehadirans')->insert(array (
            array (
                'ambil_mk_id' => 1,
                'tanggal' => Carbon::create('2018', '10', '30'),
                'hadir' => 1,
                'default' => 1,
                'catatan' => 'Lancar',
                'pertemuan_ke' => 2
            ),
            array (
                'ambil_mk_id' => 1,
                'tanggal' => Carbon::create('2018', '10', '30'),
                'hadir' => 1,
                'default' => 1,
                'catatan' => 'Lancar',
                'pertemuan_ke' => 2
            ),
        ));
    }
}
