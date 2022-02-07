<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class MateriaXGrado extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mxg_materiasxgrado';
    protected $primaryKey       = 'mxg_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['mxg_id_mat','mxg_id_grd'];

   // Validation
   protected $validationRules      = [
    'mxg_id_grd'=>[
        'rules'=>'required',
        'errors' =>[
            'required' => 'El grado es requerido'
        ]
    ],
    'mxg_id_mat'=>[
        'rules'=>'required',
        'errors' =>[
            'required' => 'La materia es requerida'
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
