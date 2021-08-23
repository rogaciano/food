<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
	public function run()
	{
		//
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
          'name' => 'Lucio Antonio de Souza',
          'email' => 'admin@admin.com',
          'telefone' => '41 - 999-999',
          'cpf'  => '010-687-834-43',

        ];

        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'name' => 'Rogaciano Paz',
            'email' => 'rogaciano@gmail.com',
            'telefone' => '81 9 9921-6560',
            'cpf'  => '656.703.704-06',
        ];

        $usuarioModel->protect(false)->insert($usuario);

        // dd($usuarioModel);
	}
}
