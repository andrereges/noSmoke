<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagens')->insert([
            'nome' => 'Rothmans_'.now(),
            'imageavel_id' => 1,
            'imageavel_type' => 'App\CigarroMarca',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
