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
         $this->call(UsuariosSeeder::class);
    }
}


class UsuariosSeeder extends Seeder
{
	public function run()
	{
		DB::insert('INSERT INTO usuarios
					(nome, email, votos) VALUES(?, ?, ?)',
				   array('Eldon','eldoncosta1@gmail.com', '10'));

		DB::insert('INSERT INTO usuarios
					(nome, email, votos) VALUES(?, ?, ?)',
				   array('Bruna','bruna@gmail.com', '20'));

		
	}
}