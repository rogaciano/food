<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

	protected $table                = 'usuarios';
	protected $returnType           = 'App\Entities\Usuario';
    protected $allowedFields        = ['nome','email','telefone'];
    protected $useSoftDeletes       = true;
    protected $useTimestamps        = true;
    protected $createdField         = 'criado_em';
    protected $updatedField         = 'atualizado_em';
    protected $deletedField         = 'deleted_at';
    protected $validationRules    = [
        'nome'                  => 'required|min_length[4]|max_length[120]',
        'email'                 => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'                   => 'required|is_unique[usuarios.cpf]|exact_length[14]',
        'password'              => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'nome'        => [
            'required'  => 'Nome obrigatório.'
        ],
        'email'        => [
            'is_unique' => 'Desculpe. Esse E-Mail já Existe.',
            'required'  => 'E-Mail obrigatório.'
        ],
        'cpf'        => [
            'is_unique' => 'Desculpe. Esse CPF já Existe.',
            'required'  => 'CPF obrigatório.'
        ],


    ];

    /**
     * @uso Controller usuarios no metodo procurar com o autocomplete
     * @param string $term
     * @return array usuarios
     */

    public function procurar($term)
    {
        if ($term === null) {
            return [];
        }

        return $this->select('id, nome')
            ->like('nome', $term)
            ->get()
            ->getResult();
	}

    public function desabilitaValidacaoSenha() {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

}
