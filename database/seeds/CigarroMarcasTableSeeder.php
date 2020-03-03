<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CigarroMarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cigarro_marcas')->insert([
            'nome' => 'Rothmans',
            'preco' => 6.00,
            'quantidade' => 20,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
