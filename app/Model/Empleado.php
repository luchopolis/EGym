<?php


class Empleado{


    public function __construct()
    {
        $this->db = new Base();
    }

    public function ObtenerEmpleados(){
        $this->db->query("SELECT * FROM empleado");
        $Empleados = $this->db->getAll();
        return $Empleados;
    }

    public function CreateEmpleado($datos){
        $this->db->query("INSERT INTO empleado (Nombre,Apellido,Direccion,Telefono) VALUES(:Nom,:Ape,:Direccion,:Tel)");
        $this->db->bind(":Nom",$datos["Nombre"]);
        $this->db->bind(":Ape",$datos["Apellido"]);
        $this->db->bind(":Direccion",$datos["Direccion"]);
        $this->db->bind(":Tel",$datos["Telefono"]);
        
        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    }

    public function UpdateEmpleado($id,$datos){
        $this->db->query("UPDATE empleado SET Nombre=:Nom,Apellido=:Ape,Direccion=:Direccion,Telefono=:Tel WHERE id=:id");
        $this->db->bind(":id",$id);
        $this->db->bind(":Nom",$datos["Nombre"]);
        $this->db->bind(":Ape",$datos["Apellido"]);
        $this->db->bind(":Direccion",$datos["Direccion"]);
        $this->db->bind(":Tel",$datos["Telefono"]);
        
        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM empleado WHERE id=:id");
        $this->db->bind(":id",$id);
        $EmpleadoData = $this->db->getOne();

        return $EmpleadoData;
    }



}








?>