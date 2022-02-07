<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MateriaXGrado extends BaseController
{
    public function index()
    {
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');

        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');

        /** @var \App\Models\MateriaXGrado\  $materiaxgradoModel */
        $materiaxgradoModel = model('MateriaXGrado');

        return view('materiaxgrado/index',[
            'materias' => $materiaModel->findAll(),
            'grados' => $gradoModel->findAll(),
            'materiasxgrado' => $materiaxgradoModel->orderBy('mxg_id','DESC')->paginate(10),
            'pager' => $materiaxgradoModel->pager,
        ]);
    }

    public function addMateriaXGRADO(){

        helper('form');
        
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');

        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');

        /** @var \App\Models\MateriaXGrado\  $materiaxgradoModel */
        $materiaxgradoModel = model('MateriaXGrado');

        $materias = $materiaModel->findAll();
        $grados = $gradoModel->findAll();
    

        if(!$materias && !materias){
            throw PageNotFound :: forPageNotFound();
        }
    
        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($materiaxgradoModel->save($this->request->getPost())){
    
                return redirect()->to('/materiaxgrado/index');
            }
        }
        
        return view('materiaxgrado/add',[
            'validation'=>$materiaxgradoModel->getValidation(),
            'materias' =>$materias,
            'grados' =>$grados  
        ]);
    }

    public function editMateriaXGRADO(int $id){

        helper('form');
        
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');

        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');

        /** @var \App\Models\MateriaXGrado\  $materiaxgradoModel */
        $materiaxgradoModel = model('MateriaXGrado');
        
        $entity = $materiaxgradoModel->find($id);

        if(!$entity){
            throw PageNotFound :: forPageNotFound();
        }

        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($materiaxgradoModel->update($entity['mxg_id'], $this->request->getPost())){

                return redirect()->to('/materiaxgrado/index');
            }
        }
        return view('materia/edit',[
            'validation'=>$materiaxgradoModel->getValidation(),
            'entity' =>$entity 
        ]);
    }

    public function deleteMateriaXGRADO(int $id){

        /** @var \App\Models\MateriaXGrado\  $materiaxgradoModel */
        $materiaxgradoModel = model('MateriaXGrado');
        
         $entity = $materiaxgradoModel->find($id);
         if(!$entity){
             throw PageNotFound :: forPageNotFound();
         }
         
         $materiaxgradoModel->delete($id);

        return redirect()->to('/materiaxgrado/index');
    }
}
