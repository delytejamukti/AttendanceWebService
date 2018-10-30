<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DosenSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(MKSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(AmbilKuliahSeeder::class);
        $this->call(KehadiranSeeder::class);
    }
}
