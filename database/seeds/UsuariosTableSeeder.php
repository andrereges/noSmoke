<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Administrador',
            'email' => 'admin@nosmoke.com.br',
            'senha' => 'admin123',
            'email_verified_at' => new DateTime(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
