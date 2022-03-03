<?php

namespace Database\Seeders;

use App\Models\CardDoHoa;
use Illuminate\Database\Seeder;

class CardDoHoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce GTX";
        $CardDH ->TrangThai = 1;
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce RTX";
        $CardDH ->TrangThai = 1;
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce MX";
        $CardDH ->TrangThai = 1;
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce Quadro";
        $CardDH ->TrangThai = 1;
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "Radeon RX";
        $CardDH ->TrangThai = 1;
        $CardDH->save();
    }
}
