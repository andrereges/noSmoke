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
            'nome' => 'Não Informado',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'nome' => 'Azul',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
        
        DB::table('cigarro_filtros')->insert([
            'nome' => 'Vermelho',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'nome' => 'Cinza',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        DB::table('cigarro_filtros')->insert([
            'nome' => 'Verde',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
