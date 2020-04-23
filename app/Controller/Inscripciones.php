<?php


class Inscripciones extends Controller{

    public function __construct()
    {
        $this->Inscripciones = $this->Model("Inscripcion");
        $this->Grupos = $this->Model("Grupos");
        $this->Clientes = $this->Model("Cliente");
    }


    public function index(){
        $Inscripciones = $this->Inscripciones->getClientesGrupo();

        $data = [
            "Inscripciones" => $Inscripciones
        ];
        $this->View("Inscripciones/index",$data);
    }

    public function Create(){
        //Almacena los que no estan inscritos en ningun grupo
        $ListaNoInscritos = [];
        $Grupos = $this->Grupos->ObtenerGrupos();
        $Clientes = $this->Clientes->ObtenerClientes();
        $Inscripciones = $this->Inscripciones->getClientesGrupo();

        foreach($Clientes as $Cliente => $value){
            foreach($Inscripciones as $I){
                    //echo json_encode($I);
               
                    if($value->Nombres == $I->Nombres){
                        //Eliminar los que ya estan inscritos ALV
                      unset($Clientes[$Cliente]);
                    }

                   
            }
          
           
        };
        $ListaNoInscritos = $Clientes;
        //echo json_encode($Clientes);

        $data = [
            "Grupos" => $Grupos,
            "Clientes" => $ListaNoInscritos
        ];

        $this->View("Inscripciones/create",$data);
    }

    public function Save(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "idCliente" => trim($_POST["clienteid"]),
                "idGrupo" => trim($_POST["idGrupo"])
            ];

            
            if ($this->Inscripciones->CreateInscripcion($data)) {
                //Resta al grupo un cupo
                $this->Grupos->RestarCupo($data["idGrupo"]);
                $this->Redirect("Inscripciones/");
            } else {
                die("Error en la sentencia");
            }
        }else {
            $data = [
                "idCliente" => "",
                "idGrupo" => ""
            ];

            $this->View("Inscripciones/create");
        }

    }
    public function Edit($idInscripcion,$idC,$idGrupo){
         //Almacena los que no estan inscritos en ningun grupo
        
        
        $Clientes = $this->Clientes->ObtenerClientes();
        $ClienteInfo = $this->Clientes->GetById($idC);
        $Inscripcion = $this->Inscripciones->GetById($idInscripcion);
        $Grupos = $this->Grupos->ObtenerGrupos();
        $GrupoInfo = $this->Grupos->GetById($idGrupo);

        
       

        $data = [
            "Inscripcionid" => $Inscripcion,
            "InfoCliente" => $ClienteInfo,
            "InfoGrupo" => $GrupoInfo,
            "Grupos" => $Grupos,
            "Clientes" => $Clientes
        ];
        //echo json_encode($ClienteInfo);
        $this->View("Inscripciones/edit",$data);
    }

    public function Update($idInscripcion){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "idCliente" => trim($_POST["clienteid"]),
                "idGrupo" => trim($_POST["idGrupo"])
            ];

            
            if ($this->Inscripciones->UpdateInscripcion($idInscripcion,$data)) {

                $this->Redirect("Inscripciones/");
            } else {
                die("Error en la sentencia");
            }
        }else {
            $data = [
                "idCliente" => "",
                "idGrupo" => ""
            ];

            $this->View("Inscripciones/create");
        }

    }


}




?>