<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ram;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ram = new Ram();
        $Ram->TenRam="4 GB";
        $Ram->save();
        $Ram = new Ram();
        $Ram->TenRam="8 GB";
        $Ram->save();
        $Ram = new Ram();
        $Ram->TenRam="16 GB";
        $Ram->save();
        $Ram = new Ram();
        $Ram->TenRam="32 GB";
        $Ram->save();
    }
}
