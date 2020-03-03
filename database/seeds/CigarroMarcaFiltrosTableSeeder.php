<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CigarroMarcaFiltrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cigarro_marca_filtros')->insert([
            'cigarro_marca_id' => 1,
            'cigarro_filtro_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
