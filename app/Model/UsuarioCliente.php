<?php


class UsuarioCliente {
    

    public function __construct()
    {
        $this->db = new Base();
    }

    public function CreateUser($datos){
        $this->db->query("INSERT INTO datosusuarios(Email,UserName,PassWord,ClienteId) VALUES(:Email,:UserName,:Pass,:CId)");
        $this->db->bind(":Email",$datos["Email"]);
        $this->db->bind(":UserName",$datos["UserName"]);
        $this->db->bind(":Pass",$datos["Pass"]);
        $this->db->bind(":CId",$datos["CId"]);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    public function UpdateUser($id,$datos){
        $this->db->query("UPDATE datosusuarios set Email=:Email,UserName=:UserName,PassWord=:Pass WHERE ClienteId=:CId");
        $this->db->bind(":CId",$id);
        $this->db->bind(":Email",$datos["Email"]);
        $this->db->bind(":UserName",$datos["UserName"]);
        $this->db->bind(":Pass",$datos["Pass"]);
        

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }

    }
}










?>