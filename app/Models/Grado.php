<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class Grado extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'grd_grado';
    protected $primaryKey       = 'grd_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['grd_nombre'];

    // Validation
    protected $validationRules      = [
        'grd_nombre'=>[
            'rules'=>'required|min_length[5]',
            'errors' =>[
                'required' => 'El nombre del grado es requerido',
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
