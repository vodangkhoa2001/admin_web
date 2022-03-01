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
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce RTX";
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce MX";
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "GeForce Quadro";
        $CardDH->save();
        $CardDH = new CardDoHoa();
        $CardDH ->TenCardDoHoa = "Radeon RX";
        $CardDH->save();
    }
}
