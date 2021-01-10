<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            ['komentar' => 'Tempor exercitation quis quis labore anim dolor proident ad. Mollit excepteur et consequat velit Lorem irure cillum est qui quis consectetur do. Consequat adipisicing do laboris commodo enim velit deserunt. Nisi ullamco laboris labore eu sint anim qui enim commodo nostrud commodo proident. Consequat incididunt eiusmod velit tempor voluptate in laborum nisi pariatur ut nisi mollit officia enim. Et consectetur reprehenderit cillum occaecat nostrud laborum laborum eiusmod quis exercitation commodo ut esse. Est commodo do aute eiusmod ea.'],
            ['komentar' => 'Qui ut est eiusmod commodo id laborum aliquip ut non ex est. Aliqua exercitation proident ipsum fugiat esse in ipsum labore. Ad amet in aute ut ut in id proident et laboris eu officia amet minim. Eu incididunt reprehenderit quis aliquip fugiat occaecat amet aute cillum et amet ut. Duis proident culpa quis duis magna consequat veniam sit ex excepteur anim proident nostrud. Minim aliqua qui id et ex aute proident et velit Lorem laborum eu qui.'],
            ['komentar' => 'Commodo id nulla Lorem et. Aute culpa elit velit ad anim eiusmod. Anim aliquip in fugiat qui magna ex sint aute tempor non. Qui esse deserunt minim est officia minim.'],
            ['komentar' => 'Labore cupidatat eiusmod deserunt minim velit cillum nostrud minim elit consequat proident. Adipisicing cillum sit ad Lorem ea aliqua. Pariatur tempor quis labore laboris aliqua officia incididunt amet sit proident elit nisi voluptate. Anim ex ut nisi adipisicing cupidatat occaecat sunt veniam adipisicing. Commodo do occaecat ut qui irure ullamco commodo sint voluptate tempor nostrud in adipisicing. Consectetur velit incididunt consectetur dolore ex et cupidatat nulla in. Sunt cillum consectetur mollit anim nulla dolor.'],
        ];

        foreach ($item as $i) {
            Komentar::create($i);
        } 
    }
}
