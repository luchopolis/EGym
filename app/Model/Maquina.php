<?php


class Maquina {


    public function __construct()
    {
        $this->db = new Base();
    }

    public function ObtenerMaquinas(){
        $this->db->query("SELECT * FROM maquinas");
        $Maquinas = $this->db->getAll();

        return $Maquinas;
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM maquinas WHERE id=:id");
        $this->db->bind(":id",$id);
        
        $Maquina = $this->db->getOne();
        return $Maquina;

    }

    public function CreateMaquina($data){
        $this->db->query("INSERT INTO maquinas (NombreMaquina,Estado,Imagen) VALUES (:NMaquina,:Estado,:Imagen)");
        $this->db->bind(":NMaquina",$data["NombreMaquina"]);
        $this->db->bind(":Estado",$data["Estado"]);
        $this->db->bind(":Imagen",$data["ImageMaquina"]);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    
    }

    public function UpdateMaquina($id,$data){
        $this->db->query("UPDATE maquinas SET NombreMaquina=:NMaquina,Estado=:Estado,Imagen=:Imagen WHERE id=:id");
        $this->db->bind(":id",$id);
        $this->db->bind(":NMaquina",$data["NombreMaquina"]);
        $this->db->bind(":Estado",$data["Estado"]);
        $this->db->bind(":Imagen",$data["ImageMaquina"]);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }
}








?>