<?php


class Horarios extends Controller{

    public function __construct()
    {
        $this->Horario = $this->Model("Horario");
        $this->Empleados = $this->Model("Empleado");
    }

    public function Create(){

        $NoAsignados = [];
        $Empleados = $this->Empleados->ObtenerEmpleados();
        $ConHorario =  $this->Horario->EmpleadosConHorario();

        foreach ($Empleados as $empleado => $values){
            foreach ($ConHorario as $ConH){
                if($values->Nombre == $ConH->Nombre){
                    unset($Empleados[$empleado]);
                }
            }
        }

        $NoAsignados = $Empleados;

        $data = [
          "Empleados" => $NoAsignados
        ];

        $this->View("Horarios/create",$data);

    }

    public function Save(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
              "Dias" => $_POST["Dias"],
              "Entrada" => $_POST["HrEntrada"],
              "Salida" => $_POST["HrSalida"],
                "idEmp" => $_POST["empleadoid"]
            ];

            if($this->Horario->CreateHorario($data)){
                $this->Redirect("Horarios/");
            }else{
                die("Error en la sentencia");
            }
        }else{

            $data = [
                "Dias" => "",
                "Entrada" => "",
                "Salida" => "",
                  "idEmp" => ""
            ];

            $this->View("Horarios/Create");

        }
    }
    public function index(){

        $Horarios = $this->Horario->ObtenerHorarios();

        $data = [
            "Horarios" => $Horarios
        ];

        $this->View("Horarios/index",$data);

    }

    public function edit($idEmpleado,$idHorario){

    
        $infoEmpleado = $this->Empleados->GetById($idEmpleado);
        $Empleados = $this->Empleados->ObtenerEmpleados();
        $HorarioEmpleado = $this->Horario->GetById($idHorario);


        $data = [
            "Empleados" => $Empleados,
            "Empleado" => $infoEmpleado,
            "HorarioEmpleado" => $HorarioEmpleado
        ];

        $this->View("Horarios/edit",$data);


    }

    public function update($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
              "Dias" => $_POST["Dias"],
              "Entrada" => $_POST["HrEntrada"],
              "Salida" => $_POST["HrSalida"],
                "idEmp" => $_POST["empleadoid"]
            ];

            if($this->Horario->UpdateHorarios($id,$data)){
                $this->Redirect("Horarios/");
            }else{
                die("Error en la sentencia");
            }
        }else{

            $data = [
                "Dias" => "",
                "Entrada" => "",
                "Salida" => "",
                  "idEmp" => ""
            ];

            $this->View("Horarios/Create");

        }

    }

    public function Delete(){

    }


}





?>