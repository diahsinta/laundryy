<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')->insert([
            'nama_member' => 'silvi',
            'alamat_member' => 'tambingan',
            'jenis_kelamin' => 'P',
            'no_telp' => '231123',
        ]);
    }
}
