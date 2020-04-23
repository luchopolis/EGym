<?php


class Inscripcion{

    public function __construct()
    {
        $this->db = new Base();
    }


    //Retornar los clientes en X grupo
    public function getIntegrantesGrupo($NombreGrupo){
        $sql = "SELECT cliente.id,Nombres, Apellidos,Estatura, peso FROM inscripcion 
        JOIN cliente ON inscripcion.idCliente = cliente.id
        JOIN grupos ON inscripcion.idGrupo = grupos.id
        JOIN entrenador ON grupos.identrenador = entrenador.id
        JOIN empleado ON entrenador.idempleado = empleado.id
        WHERE nombregrupo = :NGrupo";

        $this->db->query($sql);
        $this->db->bind(":NGrupo",$NombreGrupo);
        $Participantes = $this->db->getAll();

        return $Participantes;
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM inscripcion WHERE id=:id");
        $this->db->bind(":id",$id);
        $Inscripcion = $this->db->getOne($id);

        return $Inscripcion;
    }

    //Retorna el nombre del cliente, el nombre del grupo en donde realizó la inscripcion, para el !Index!
    public function getClientesGrupo(){
        $sql = "SELECT inscripcion.id,inscripcion.idGrupo,inscripcion.idCliente,Nombres,nombregrupo FROM inscripcion
        INNER JOIN cliente on inscripcion.idCliente = cliente.id
        INNER JOIN grupos on inscripcion.idGrupo = grupos.id
        ";

        $this->db->query($sql);
        $Inscripciones = $this->db->getAll();

        return $Inscripciones;

    }

    public function CreateInscripcion($data){
        $this->db->query("INSERT INTO inscripcion (idCliente,idGrupo) VALUES (:idC,:idG)");
        $this->db->bind(":idC",$data["idCliente"]);
        $this->db->bind(":idG",$data["idGrupo"]);

        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    }

    public function UpdateInscripcion($id,$data){
        $this->db->query("UPDATE inscripcion SET idCliente=:idC,idGrupo=:idG WHERE id=:id");
        $this->db->bind(":idC",$data["idCliente"]);
        $this->db->bind(":idG",$data["idGrupo"]);
        $this->db->bind(":id",$id);
        
        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }

    }
}












?>