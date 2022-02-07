<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class Materia extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mat_materia';
    protected $primaryKey       = 'mat_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['mat_nombre'];

    // Validation
    protected $validationRules      = [
        'mat_nombre'=>[
            'rules'=>'required|min_length[5]',
            'errors' =>[
                'required' => 'El nombre de la materia es requerido',
                'min_length' => 'El nombre debe contener almenos 10 caracteres'
            ]
        ]
    ];

    /** 
     * @return ValidationInterface 
     */

    public function getValidation():ValidationInterface{
        return $this->validation;
    }
}
