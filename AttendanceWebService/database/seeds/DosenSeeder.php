<?php

use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dosens')->delete();
        
        \DB::table('dosens')->insert(array (
            array (
                'nip' => "197205281997021001",
                'nama_dosen' => 'Dwi Sunaryono, S.Kom.,M.Kom',
            ),
            array (
                'nip' => "196505181992031003",
                'nama_dosen' => 'Dr.Tech,Ir. R.V. Hari Ginardi, M.Sc.',
            ),
        ));
    }
}
