<?php



class Entrenador{



    public function __construct()
    {
        $this->db = new Base();
    }


    //Mostrar info en la tabla
    public function ObtenerEntrenadores(){
        $this->db->query("
        SELECT empleado.id as idEmpleado,entrenador.id,Nombre as Entrenador,Descripcion,Telefono FROM entrenador 
        INNER JOIN empleado 
        ON entrenador.IdEmpleado = empleado.id");
        $entrenadores = $this->db->getAll();
        return $entrenadores;
    }

    //Para mostrar la información por entrenador
    public function GetById($id){
        $this->db->query("
        SELECT entrenador.id,Descripcion FROM entrenador 
        WHERE entrenador.id = :entrenadorId");
        $this->db->bind(":entrenadorId",$id);
        $entrenadores = $this->db->getOne();
        return $entrenadores;
    }

    //Get Grupo al que entrena
    public function getGrupo($idEntrenador){
        $sql = "SELECT DISTINCT nombregrupo FROM grupos
        INNER JOIN entrenador ON grupos.identrenador = :id";

        $this->db->query($sql);
        $this->db->bind(":id",$idEntrenador);
        $Grupo = $this->db->getOne();

        return $Grupo;
    }

    public function CreateEntrenador($data){
        
   
        $this->db->query("INSERT INTO entrenador (idEmpleado,Descripcion) VALUES(:emp,:desc)");
        $this->db->bind(":emp",$data["emp"]);
        $this->db->bind(":desc",$data["desc"]);
        

        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    
    }

    public function UpdateEntrenador($id,$data){
        $this->db->query("UPDATE entrenador SET idEmpleado=:idEmp,Descripcion=:Desc WHERE id=:id");
        $this->db->bind(":id",$id);
        $this->db->bind(":idEmp",$data["emp"]);
        $this->db->bind(":Desc",$data["desc"]);

        
         
        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }


    

 


}


?>