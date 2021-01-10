<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['nama' => 'Pantai Ringgung', 'lokasi' => 'Pesawaran', 'foto' => 'defsul.jpg', 'descripsi' => 'Pantai yang bagus', 'id_categori' => '3', 'id_user' => '4'],
            ['nama' => 'Pantai Ringgung1', 'lokasi' => 'Pesawaran1', 'foto' => 'defsul.jpg', 'descripsi' => 'Pantai yang bagus1', 'id_categori' => '5', 'id_user' => '3'],
            ['nama' => 'Pantai Ringgung2', 'lokasi' => 'Pesawaran2', 'foto' => 'defsul.jpg', 'descripsi' => 'Pantai yang bagus2', 'id_categori' => '4', 'id_user' => '4'],
            ['nama' => 'Pantai Ringgung3', 'lokasi' => 'Pesawaran3', 'foto' => 'defsul.jpg', 'descripsi' => 'Pantai yang bagus3', 'id_categori' => '12', 'id_user' => '6'],
            ['nama' => 'Pantai Ringgung4', 'lokasi' => 'Pesawaran4', 'foto' => 'defsul.jpg', 'descripsi' => 'Pantai yang bagus4', 'id_categori' => '6', 'id_user' => '9'],
        ];
        foreach ($items as $item) {
            # code...
            Wisata::create($item);
        } 
    }
}
