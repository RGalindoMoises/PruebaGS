<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Materia extends BaseController
{
    public function index()
    {
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');

        return view('materia/index',[
            'materias' => $materiaModel->orderBy('mat_id','DESC')->paginate(10),
            'pager' => $materiaModel->pager,
        ]);
    }

    public function addMateria(){

        helper('form');
        
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');
    
        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($materiaModel->save($this->request->getPost())){
    
                return redirect()->to('/materia/index');
            }
        }
        
        return view('materia/add',[
            'validation'=>$materiaModel->getValidation() 
        ]);
    }

    public function editMateria(int $id){

        helper('form');
        
        /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');
        
        $entity = $materiaModel->find($id);

        if(!$entity){
            throw PageNotFound :: forPageNotFound();
        }

        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($materiaModel->update($entity['mat_id'], $this->request->getPost())){

                return redirect()->to('/materia/index');
            }
        }
        return view('materia/edit',[
            'validation'=>$materiaModel->getValidation(),
            'entity' =>$entity 
        ]);
    }

    public function deleteMateria(int $id){

         /** @var \App\Models\Materia\  $materiaModel */
        $materiaModel = model('Materia');
        
         $entity = $materiaModel->find($id);
         if(!$entity){
             throw PageNotFound :: forPageNotFound();
         }
         
         $materiaModel->delete($id);

        return redirect()->to('/materia/index');
    }
}

