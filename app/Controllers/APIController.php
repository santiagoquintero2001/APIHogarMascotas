<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController{
    protected $modelName = 'App\Models\AnimalModelo';
    protected $format    = 'json';

    public function index(){
        
        return $this->respond($this->model->findAll());
    }

    
    public function registrarAnimal(){

        //1.Recibir los datos del conductor desde el cliente
        $idAnimal=$this->request->getPost('idAnimal');
        $nombreAnimal=$this->request->getPost('nombreAnimal');
        $edadAnimal=$this->request->getPost('edadAnimal');
        $tipoAnimal=$this->request->getPost('tipoAnimal');
        $descripcionAnimal=$this->request->getPost('descripcionAnimal');
        $comidaAnimal=$this->request->getPost('comidaAnimal');

        //2. Armar un arreglos asociativo donde las claves
        //seran los nombres de las columnas o atributos de la tabla con los datos que llegan de la peticion

        $datosEnvio=array(
            "idAnimal"=>$idAnimal,
            "nombreAnimal"=>$nombreAnimal,
            "edadAnimal"=>$edadAnimal,
            "tipoAnimal"=>$tipoAnimal,
            "descripcionAnimal"=>$descripcionAnimal,
            "comidaAnimal"=>$comidaAnimal
        );

        //3. Ejecutamos validacion y agregamos el registro
        if($this->validate('animales')){
            
            $this->model->insert($datosEnvio);
            $mensaje=array('estado'=>true,'mensaje'=>"Animal agregado con exito");
            return $this->respond($mensaje);

        }else{
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors(),400);

        }


    }

    public function editarAnimal($id){

        //1. Recibir los datos que llegan de la peticion
        $datosPeticion=$this->request->getRawInput();
        
        //2. Obtener SOLO los datos que deseo editar
        $edadAnimal=$datosPeticion["edadAnimal"];
        $descripcionAnimal=$datosPeticion["descripcionAnimal"];
        $comidaAnimal=$datosPeticion["comidaAnimal"];

        //3. Creamos un arreglo asociativo con los datos para enviar al modelo
        $datosEnvio=array(
            "edadAnimal"=>$edadAnimal,
            "descripcionAnimal"=>$descripcionAnimal,
            "comidaAnimal"=>$comidaAnimal
        );

        //4. Validamos y ejecutamos la operación en BD
        if($this->validate('animalesPUT')){
            
            $this->model->update($id,$datosEnvio);
            $mensaje=array('estado'=>true,'mensaje'=>"Animal editado con exito");
            return $this->respond($mensaje);

        }else{
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors(),400);

        }


        




    }

    public function eliminarAnimal($id){

        //1. Ejecutar la operación de delete en BD
        $consulta=$this->model->where('idAnimal',$id)->delete();
        $filasAfectadas=$consulta->connID->affected_rows;

        //2. Validar si el registro a eliminar existe o no
        if($filasAfectadas==1){

            $mensaje=array('estado'=>true,'mensaje'=>"Animal eliminado con exito");
            return $this->respond($mensaje);

        }else{
            $mensaje=array('estado'=>false,'mensaje'=>"El animal a eliminar no se encontro en la BD");
            return $this->respond($mensaje,400);
        }
        

    }


}
