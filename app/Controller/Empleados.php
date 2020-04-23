<?php


class Empleados extends Controller{

    public function __construct()
    {
        $this->Empleado = $this->Model("Empleado");
        $this->Horarios = $this->Model("Horario");
    }

    public function Index(){

       $Empleados =  $this->Empleado->ObtenerEmpleados();
       $data = [
            "Empleados" => $Empleados
       ];

       $this->View("Empleados/index",$data);

    }

    public function Show($id){
        
        $DatosEmpleado = $this->Empleado->GetById($id);
        $EmpleadoHorario = $this->Horarios->HorarioDeEmpleado($id);
        $data = [
            "Datos" => $DatosEmpleado,
            "EmpleadoHorario" => $EmpleadoHorario
        ];

        $this->View("Empleados/show",$data);
    }

    public function Create(){
        $this->View("Empleados/create");
    }

    public function Save(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "Nombre" => trim($_POST["Name"]),
                "Apellido" => trim($_POST["Apellido"]),
                "Direccion" => trim($_POST["Dirr"]),
                "Telefono" => trim($_POST["tel"])
            ];

            if($this->Empleado->CreateEmpleado($data)){
                $this->Redirect("Empleados/");
            }else{
                die("Error en la sentencia");
            }

        }else{
            $data = [
                "Nombre" => "",
                "Apellido" => "",
                "Direccion" => "",
                "Telefono" => ""
               
            ];

            $this->View("Empleados/create");
        }
       

        
    }

    public function Edit($id){
        $Empleado = $this->Empleado->GetById($id);

        $data = [
            "Empleado" => $Empleado
        ];
        $this->View("Empleados/edit",$data);
    }

    public function update($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "Nombre" => trim($_POST["Name"]),
                "Apellido" => trim($_POST["Apellido"]),
                "Direccion" => trim($_POST["Dirr"]),
                "Telefono" => trim($_POST["tel"])
            ];

            if($this->Empleado->UpdateEmpleado($id,$data)){
                $this->Redirect("Empleados/");
            }else{
                die("Error en la sentencia");
            }

        }else{
            $data = [
                "Nombre" => "",
                "Apellido" => "",
                "Direccion" => "",
                "Telefono" => ""
               
            ];

            $this->View("Empleados/");
        }
    }
}







?>