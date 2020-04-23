<?php



class Entrenadores extends Controller{


    public function __construct()
    {
        $this->Entrenador = $this->Model("Entrenador");        
        $this->Inscritos = $this->Model("Inscripcion");
        $this->Empleado = $this->Model("Empleado");
        $this->Grupos = $this->Model("Grupos");
    }


    public function Index(){
        $Entrenadores = $this->Entrenador->ObtenerEntrenadores();
        /*$GrupoEntrenador = $this->Entrenador->getGrupo(1); 

        //echo json_encode($data["Grupo"]->nombregrupo);
        //echo json_encode($data["ParticipantesGrupo"]);*/

        $data = [
           "Entrenadores" => $Entrenadores 
        ];

        $this->View("Entrenadores/index",$data);
      
    }


    public function Create(){

        $letras = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N"];
        $Empleados = $this->Empleado->ObtenerEmpleados();
        $GruposN = $this->Grupos->ObtenerGrupos();

        $data = [
            "Empleados" => $Empleados,
            "GruposNo" => $GruposN,
            "GruposAll" => $letras
        ];

        $this->View("Entrenadores/create",$data);
    }

    public function Save(){


        if($_SERVER["REQUEST_METHOD"] == "POST"){

            

                $data = [
                    "emp" => trim($_POST["empleadoid"]),
                    "desc" => trim($_POST["Descripcion"]),
                 
                ];

              
               
    
                if($this->Entrenador->CreateEntrenador($data)){

        
              
                    $this->Redirect("Entrenadores/");
                    
                    

                }else{
                    die("Error en la sentencia");
                }
                
            
           


        }else{
            $data = [
                "emp" => "",
                "desc" => "",
               
            ];

            $this->View("Entrenadores/create");
        }

    }

    public function Edit($idEntrenador,$idEmpleado){
     

        $InfoEntrenador = $this->Entrenador->GetById($idEntrenador);
        $Entrenadores = $this->Entrenador->ObtenerEntrenadores();
        
     
        $EmpleadoInfo = $this->Empleado->GetById($idEmpleado);

        $data = [

            "Entrenador" => $InfoEntrenador,
            "Empleado" => $EmpleadoInfo,
            "Entrenadores" => $Entrenadores,
          
        ];


     
        //echo $data["Entrenador"][0]->Descripcion;
        //echo json_encode($data["GrupoEntrenador"]);

    
        
        $this->View("Entrenadores/edit",$data);
       

    }

    //id del entrenador
    public function Update($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            

            $data = [
               
                "emp" => trim($_POST["empleadoid"]),
                "desc" => trim($_POST["Descripcion"]),
               
                
            ];

            $this->Entrenador->UpdateEntrenador($id,$data);
            $this->Redirect("Entrenadores/");

    }else{
        $data = [
            "emp" => "",
            "desc" => "",
            "grupo" => ""
        ];

        $this->View("Entrenadores/create");
    }

    }

    public function Show($id){
        $GrupoEntrenador = $this->Entrenador->getGrupo($id); //Retorna el grupo no lo registros por el id del etrenador
        $Participantes = $this->Inscritos->getIntegrantesGrupo($GrupoEntrenador->nombregrupo);//Retorna los participantes por grupo
 
        $data = [
            
            "Grupo" => $GrupoEntrenador,
            "Participantes" => $Participantes
        ];

        $this->View("Entrenadores/show",$data);
       
        
    
    }



}
