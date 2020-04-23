<?php



class Grupo extends Controller
{



    public function __construct()
    {
        $this->Grupos = $this->Model("Grupos");
        $this->Inscritos = $this->Model("Inscripcion");
        $this->Entrenadores = $this->Model("Entrenador");
    }

    public function index()
    {

        $Registros = $this->Grupos->getGrupos();

        $data = [
            "Grupos" => $Registros
        ];

        $this->View("Grupos/index", $data);
    }

    public function Create()
    {
        $letras = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N"];
        $Entrenadores = $this->Entrenadores->ObtenerEntrenadores();
        $GruposN = $this->Grupos->ObtenerGrupos();
        $data = [
            "Entrenadores" => $Entrenadores,
            "GruposNo" => $GruposN,
            "GruposAll" => $letras
        ];

        $this->View("Grupos/create", $data);
    }


    public function Save()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {



            $data = [
                "emp" => trim($_POST["empleadoid"]),
                "cupo" => trim($_POST["cupo"]),
                "grupo" => trim($_POST["Grupo"])
            ];




            if ($this->Grupos->CreateGrupo($data)) {

                $this->Redirect("Grupo/");
            } else {
                die("Error en la sentencia");
            }
        } else {
            $data = [
                "emp" => "",
                "grupo" => "",
                "cupo" => ""
            ];

            $this->View("Entrenadores/Create");
        }
    }
    public function Show($nombregrupo)
    {


        $Participantes = $this->Inscritos->getIntegrantesGrupo($nombregrupo); //Retorna los participantes por grupo


        $data = [

            "Grupo" => $nombregrupo,
            "Participantes" => $Participantes,

        ];

        $this->View("Grupos/show", $data);
    }

    public function edit($idEntrenador,$idGrupo)
    {
        $letras = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N"];
        $InfoEntrenador = $this->Entrenadores->GetById($idEntrenador);
        $Entrenadores = $this->Entrenadores->ObtenerEntrenadores();
        $GruposN = $this->Grupos->ObtenerGrupos();
        $GrupoDeEntrenador = $this->Grupos->GetEntrenadorGrupo($idEntrenador);
        $GrupoInfo = $this->Grupos->GetById($idGrupo);

        $data = [

            "Entrenador" => $InfoEntrenador,
            "GruposAll" => $letras,
            "Entrenadores" => $Entrenadores,
            "GruposNo" => $GruposN,
            "GrupoDeEntrenador" =>  $GrupoDeEntrenador,
            "Grupo" => $GrupoInfo
         
        ];

        $this->View("Grupos/edit",$data);
    }

    //id del entrenador
    public function update($id)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $data = [
                
                "idGrupo" => trim($_POST["idGrupo"]),
                "cupo" => trim($_POST["cupo"]),
                "nuevoGrupo" => trim($_POST["Grupo"])

            ];


            $this->Grupos->UpdateGrupo($id, $data);

            $this->Redirect("Grupo/");
        } else {
            $data = [
                
                "idGrupo" => "",
                "cupo" => "",
                "grupo" => ""
            ];

            $this->View("Grupo/create");
        }
    }
}
