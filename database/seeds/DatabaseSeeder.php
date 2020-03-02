<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ImagensTableSeeder::class);
        $this->call(AcoesTableSeeder::class);
        $this->call(PlanosTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(CigarroFiltrosTableSeeder::class);
        $this->call(CigarroMarcasTableSeeder::class);
        $this->call(CigarroMarcaFiltrosTableSeeder::class);
        $this->call(PerguntasTableSeeder::class);
        $this->call(AcoesTableSeeder::class);
    }
}
