<?php


class Cliente{



    public function __construct()
    {
        $this->db = new Base();
    }

    public function ObtenerClientes(){
        $this->db->query("SELECT * FROM cliente");
        $Clientes = $this->db->getAll();
        return $Clientes;
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM cliente WHERE id=:id");
        $this->db->bind(":id",$id);
        $ClienteData = $this->db->getOne();
        
        return $ClienteData;
    }

    public function CreateCliente($data){
        $this->db->query("INSERT INTO cliente (Nombres,Apellidos,Estatura,peso,edad) values(:Names,:Apes,:Estatura,:peso,:edad)");
        $this->db->bind(":Names",$data["names"]);
        $this->db->bind(":Apes",$data["Apes"]);
        $this->db->bind(":Estatura",$data["Estatura"]);
        $this->db->bind(":peso",$data["peso"]);
        $this->db->bind(":edad",$data["edad"]);
        
        
        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    public function UpdateCliente($id,$data){
        $this->db->query("UPDATE cliente SET Nombres=:Names,Apellidos=:Apes,Estatura=:Estatura,peso=:peso,edad=:edad WHERE id=:ID");
        $this->db->bind(":ID",$id);
        $this->db->bind(":Names",$data["names"]);
        $this->db->bind(":Apes",$data["Apes"]);
        $this->db->bind(":Estatura",$data["Estatura"]);
        $this->db->bind(":peso",$data["peso"]);
        $this->db->bind(":edad",$data["edad"]);
        

         
        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    public function GetClientUser($id){
        $this->db->query("SELECT UserName,Email,PassWord FROM datosusuarios INNER JOIN cliente WHERE ClienteId = :id = cliente.id");
        $this->db->bind(":id",$id);
        $ClientData = $this->db->getOne();
        if(!empty($ClientData)){
            return $ClientData;
        }else{
            $ClientData = [];
            return $ClientData;
        }
        
    }



}







?>