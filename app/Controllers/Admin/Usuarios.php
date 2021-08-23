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
            $data['value'] = $usuario->nome;

            $retorno[] = $data;

        }

        return $this->response->setJSON($retorno);

	}

    public function show($id = null)
    {
        $usuario = $this->buscarUsuarioOu404(($id));
	}

    /**
     * @param int|null $id
     * @return objeto usuaario
     */
	private function buscarUsuarioOu404( int $id = null)
    {
        if( !$id || $usuario = $this->usuarioModel->where("id")->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException("Não encontramos usuáio $id" );
        }

        return $usuario;
    }


}
