<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CigarroFiltrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cigarro_filtros')->insert([
            'id' => 1,
            'nome' => 'Não Informado',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'id' => 2,
            'nome' => 'Azul',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
        
        DB::table('cigarro_filtros')->insert([
            'id' => 3,
            'nome' => 'Vermelho',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'id' => 4,
            'nome' => 'Cinza',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'id' => 5,
            'nome' => 'Verde',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
