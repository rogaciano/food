<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

	protected $table                = 'usuarios';
	protected $returnType           = 'App\Entities\Usuario';
	protected $useSoftDeletes       = true;
	protected $allowedFields        = ['name','email','telefone'];


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

        return $this->select('id, name')
            ->like('name', $term)
            ->get()
            ->getResult();
	}

}
