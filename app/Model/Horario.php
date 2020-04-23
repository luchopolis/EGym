<?php


class Horario {

    public function __construct()
    {
        $this->db = new Base();

    }

    public function ObtenerHorarios(){

        $this->db->query("SELECT idHorario,empleado.id as idEMp,DiasTrabajo,Entrada,Salida,Nombre as N,Apellido as A  FROM Horarios INNER JOIN empleado on Horarios.idEmpleado = empleado.id");
        $Horarios = $this->db->getAll();

        return $Horarios;

    }

    //Mostrar la informacion del horario los dias que asistirá en el show del Empleado por el idEMpleado

    function HorarioDeEmpleado($idEmpleado){
        $this->db->query("SELECT DiasTrabajo,Entrada,Salida FROM Horarios WHERE Horarios.idEmpleado=:idEmpleado");
        $this->db->bind(":idEmpleado",$idEmpleado);
        $HorarioDeEmpleado = $this->db->getOne();

        return $HorarioDeEmpleado;
    }


    public function GetByID($id){
        $this->db->query("SELECT * FROM Horarios WHERE idHorario=:id");
        $this->db->bind(":id",$id);
        $HorarioUnico = $this->db->getOne();

        return $HorarioUnico;

    }

    function CreateHorario($data){
        $this->db->query("INSERT INTO Horarios (DiasTrabajo,Entrada,Salida,idEmpleado) VALUES(:Dias,:Entrada,:Salida,:idEmp)");
        $this->db->bind(":Dias",$data["Dias"]);
        $this->db->bind(":Entrada",$data["Entrada"]);
        $this->db->bind(":Salida",$data["Salida"]);
        $this->db->bind(":idEmp",$data["idEmp"]);

        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }

    }


    public function UpdateHorarios($id,$data){
        $this->db->query("UPDATE Horarios SET DiasTrabajo=:DiasT,Entrada=:Entrada,Salida=:Salida,idEmpleado=:idEmp WHERE idHorario=:idH");
        $this->db->bind(":DiasT",$data["Dias"]);
        $this->db->bind(":Entrada",$data["Entrada"]);
        $this->db->bind(":Salida",$data["Salida"]);
        $this->db->bind(":idEmp",$data["idEmp"]);
        $this->db->bind(":idH",$id);

        if($this->db->execQuery()){
            return True;
        }else{
            return False;
        }
    }

    public function EmpleadosConHorario(){
        $this->db->query("SELECT Nombre FROM Horarios INNER JOIN empleado on Horarios.idEmpleado = empleado.id ");
        $ConHorario = $this->db->getAll();

        return $ConHorario;
    }


}








?>