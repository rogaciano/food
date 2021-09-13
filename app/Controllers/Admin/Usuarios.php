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

	    session()->remove('sucesso');

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

        $usuario = $this->buscaUsuarioOu404($id);

        // dd($usuario);

        $data = [
            'titulo' => "Detalhando o Usuário $usuario->nome",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/show', $data);

	}

    public function editar($id = null)
    {

        $usuario = $this->buscaUsuarioOu404($id);

        // dd($usuario);

        $data = [
            'titulo' => "Editando o Usuário $usuario->nome",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/editar', $data);

    }

    public function atualizar($id = null)
    {

        if ( $this->request->getMethod() === 'post')
        {
            $usuario = $this->buscaUsuarioOu404($id);

            $post = $this->request->getPost();

            if (empty($post['password']) ) {
                $this->usuarioModel->desabilitaValidacaoSenha();
                unset($post['password']);
                unset($post['password_confirmation']);

            }

            $usuario->fill( $post );

            if (!$usuario->hasChanged() ) {
                return redirect()->back()->with('infor', "Não há dados para atualizar");
            }

            if ( $this->usuarioModel->protect(false)->save( $usuario ) ) {

                return redirect()->to(site_url("admin/usuarios/show/$usuario->id"))->with("sucesso", "Usuário $usuario->nome atualizado com sucesso!");

            } else {
                return redirect()->back()
                    ->with('errors_model', $this->usuarioModel->errors())
                    ->with('atencao', 'Por favor corrija os erros abaixo')
                    ->withInput();
            }

        } else {

            /* não é post */

            return redirect()->back();

        }

    }

    /**
     * @param int|null $id
     * @return object usuario
     */
	private function buscaUsuarioOu404(int $id = null)
    {
        if( !$id || !$usuario = $this->usuarioModel->where("id", $id)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos usuário $id" );
        }

        return $usuario;
    }



}
