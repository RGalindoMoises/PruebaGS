<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Grado extends BaseController
{
    public function index()
    {
        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');

        return view('grado/index',[
            'grados' => $gradoModel->orderBy('grd_id','DESC')->paginate(10),
            'pager' => $gradoModel->pager,
        ]);
    }

    public function addGrado(){

        helper('form');
        
        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');
    
        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($gradoModel->save($this->request->getPost())){
    
                return redirect()->to('/grado/index');
            }
        }
        
        return view('grado/add',[
            'validation'=>$gradoModel->getValidation() 
        ]);
    }

    public function editGrado(int $id){

        helper('form');
        
        /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');
        
        $entity = $gradoModel->find($id);

        if(!$entity){
            throw PageNotFound :: forPageNotFound();
        }

        if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'POST') {
            if ($gradoModel->update($entity['grd_id'], $this->request->getPost())){

                return redirect()->to('/grado/index');
            }
        }
        return view('grado/edit',[
            'validation'=>$gradoModel->getValidation(),
            'entity' =>$entity 
        ]);
    }

    public function deleteGrado(int $id){

         /** @var \App\Models\Grado\  $gradoModel */
        $gradoModel = model('Grado');
        
         $entity = $gradoModel->find($id);
         if(!$entity){
             throw PageNotFound :: forPageNotFound();
         }
         
         $gradoModel->delete($id);

        return redirect()->to('/grado/index');
    }
}
