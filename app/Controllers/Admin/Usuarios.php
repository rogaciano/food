<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

	public function index()
	{

	    $data = [
	        'titulo' => 'Listando os usuários',
            'usuarios' => $this->usuarioModel->findAll(),
        ];

	    return view('Admin/Usuarios/index', $data);


	}

    public function procurar()
    {

/*
        echo "<pre>";
        print_r( $this->request->getGet());
        exit;
*/


        if ( !$this->request->isAJAX()) {
            exit('Página não encontrada');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($usuarios as $usuario) {

            $data['id'] = $usuario->id;
            $data['value'] = $usuario->name;

            $retorno[] = $data;

        }

        return $this->response->setJSON($retorno);

	}

    public function show($id = null)
    {

        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => "Detalhando o Usuário $usuario->name",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/show', $data);

	}

    /**
     * @param int|null $id
     * @return object usuario
     */
	private function buscaUsuarioOu404(int $id = null)
    {
        if( !$id || !$usuario = $this->usuarioModel->where("id", $id)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos usuáio $id" );
        }

        return $usuario;
    }


}
