<?php




class Grupos{


    public function __construct()
    {
        $this->db = new Base();
    }


    public function ObtenerGrupos(){

        $this->db->query("SELECT * FROM grupos");
        $Grupos = $this->db->getAll();

        return $Grupos;
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM grupos WHERE id=:id");
        $this->db->bind(":id",$id);
        $Grupo = $this->db->getOne();
        return $Grupo;
    }

    public function CreateGrupo($data){
      
            $this->db->query("INSERT INTO grupos (nombregrupo,identrenador) VALUES(:grupo,:identrenador)");
            $this->db->bind(":grupo",$data["grupo"]);
            $this->db->bind(":identrenador",$data["emp"]);
            
    
            if($this->db->execQuery()){
                return true;
            }else{
                return false;
            }
        
        
    }

    public function UpdateGrupo($idEntrenador,$data){
            $this->db->query("UPDATE grupos SET nombregrupo=:nuevoGrupo,identrenador=:idEntrenador,Cupo=:cupo WHERE id=:id");
            $this->db->bind(":id",$data["idGrupo"]);
            $this->db->bind(":nuevoGrupo",$data["nuevoGrupo"]);
            $this->db->bind(":cupo",$data["cupo"]);
            $this->db->bind(":idEntrenador",$idEntrenador);

            if($this->db->execQuery()){
                
                return true;
            }else{
                return false;
            }
    }


    //Metodo para retornar el nombre del grupo para un entrenador en especifico
    public function GetEntrenadorGrupo($idEntrenador){
        $this->db->query("SELECT nombregrupo FROM grupos WHERE identrenador=:identrenador");
        $this->db->bind(":identrenador",$idEntrenador);
        $GrupoDeEntrenador = $this->db->getOne();

        return $GrupoDeEntrenador;
    }

    //Obtener el nombre de grupo y el responsable por cada grupo
    public function getGrupos(){
        $sql = "SELECT grupos.id,nombregrupo,Nombre,entrenador.id as idEntrenador,Cupo FROM grupos
        INNER JOIN entrenador ON grupos.identrenador = entrenador.id
        INNER JOIN empleado ON entrenador.IdEmpleado = empleado.id";

        $this->db->query($sql);
        $Grupo = $this->db->getAll();

        return $Grupo;
    }

    //Metodo para restar una vez se hace una inscripcion

    public function RestarCupo($idGrupo){

        //Obtenemos el Grupo por el ID
        $Grupo = $this->GetById($idGrupo);
        //Almacena el cupo actual del grupo
        $CupoActual = $Grupo->Cupo;
        $NuevoCupo = ($CupoActual - 1);

        $this->db->query("UPDATE grupos SET Cupo=:NuevoCupo WHERE id=:idGrupo");
        $this->db->bind(":idGrupo",$idGrupo);
        $this->db->bind(":NuevoCupo",$NuevoCupo);

        if($this->db->execQuery()){
            
            return true;
        }else{
            return false;
        }
        

    }
    //Metodo para sumar una vez se elimine una inscripcion
    public function SumarCupo($idGrupo){
        
    }



}




?>