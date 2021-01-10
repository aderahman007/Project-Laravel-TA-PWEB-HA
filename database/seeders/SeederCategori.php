<?php

namespace Database\Seeders;

use App\Models\Categori;
use Illuminate\Database\Seeder;

class SeederCategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            ['nama' => 'Pantai'],
            ['nama' => 'Gunung'],
            ['nama' => 'Taman Wisata'],
            ['nama' => 'Air Terjun'],
        ];

        foreach($item as $i){
            Categori::create($i);
        } 
    }
}
