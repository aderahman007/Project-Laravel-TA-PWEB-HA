<?php

namespace Database\Seeders;

use App\Models\ChildKomentar;
use Illuminate\Database\Seeder;

class ChildKomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            ['id_komentar' => '2', 'child_komentar' => 'Sunt minim sint amet ex voluptate laboris sint esse tempor. Duis magna nulla in sint enim culpa ipsum ipsum ea. Nulla est reprehenderit magna elit excepteur dolore commodo est. Ea adipisicing tempor Lorem fugiat occaecat culpa sunt irure minim elit sit deserunt pariatur esse. Laboris anim nulla sunt magna ad in labore velit ullamco veniam. Cupidatat in dolor commodo dolor velit nulla. Ut consectetur pariatur incididunt ullamco exercitation magna dolore irure dolore quis excepteur Lorem.'],
            ['id_komentar' => '1', 'child_komentar' => 'Sunt dolore tempor quis ad nostrud pariatur irure Lorem amet irure dolore est laboris. Quis eu mollit Lorem esse exercitation non consequat laborum deserunt labore magna id veniam. Minim voluptate voluptate ipsum id ipsum voluptate labore dolor in in elit exercitation aute nisi. Non nostrud do et est sint cillum consectetur aute officia mollit esse commodo sunt laboris.'],
            ['id_komentar' => '3', 'child_komentar' => 'Deserunt elit qui qui ad consectetur occaecat proident reprehenderit labore nisi ad cillum ad officia. Enim voluptate consectetur aute mollit. Voluptate nulla amet excepteur reprehenderit et laborum velit non veniam voluptate nisi est quis. Excepteur qui sit quis reprehenderit aute ea Lorem non dolor. Nostrud ut exercitation in officia commodo tempor quis anim duis.'],
            ['id_komentar' => '1', 'child_komentar' => 'Sit excepteur magna proident quis officia ut. Duis culpa id ipsum ipsum nostrud in incididunt. Laboris consectetur amet do et labore nisi ipsum. Laborum dolor eiusmod consequat eiusmod ipsum laboris culpa nostrud elit proident ullamco. Id enim incididunt irure anim proident ipsum laborum. Ad sit culpa aute proident qui. Anim magna sit pariatur enim voluptate id veniam est dolor Lorem.'],
        ];

        foreach ($item as $i) {
            ChildKomentar::create($i);
        }
    }
}
