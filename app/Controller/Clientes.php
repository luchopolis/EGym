<?php


class Clientes extends Controller{


    public function __construct()
    {
        $this->Clientes = $this->Model("Cliente");
    }

    public function Index(){
       
        
        $Clientes = $this->Clientes->ObtenerClientes();

        $data = [
            "Clientes" => $Clientes
        ];

        $this->View("Clientes/index",$data);
        
        
    }

    public function Create(){

        $this->View("Clientes/create");

    }

    public function Save(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "names" => trim($_POST["names"]),
                "Apes" => trim($_POST["Apes"]),
                "Estatura" => trim($_POST["Estatura"]),
                "peso" => trim($_POST["peso"]),
                "edad" => trim($_POST["edad"])
            ];

            if($this->Clientes->CreateCliente($data)){
                $this->Redirect("Clientes/");
            }else{
                die("Error en la sentencia");
            }

        }else{
            $data = [
                "names" => "",
                "Apes" => "",
                "Estatura" => "",
                "peso" => "",
                "edad" => ""
            ];

            $this->View("Clientes/create");
        }
       
        
    }

    public function Edit($id){

        $Clientes = $this->Clientes->GetById($id);
        $data = [
            "Cliente" => $Clientes
        ];

        $this->View("Clientes/Edit",$data);
    }

    public function Update($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "names" => trim($_POST["names"]),
                "Apes" => trim($_POST["Apes"]),
                "Estatura" => trim($_POST["Estatura"]),
                "peso" => trim($_POST["peso"]),
                "edad" => trim($_POST["edad"])
            ];

            if($this->Clientes->UpdateCliente($id,$data)){
                $this->Redirect("Clientes/");
            }else{
                die("Error en la sentencia");
            }

        }else{
            $data = [
                "names" => "",
                "Apes" => "",
                "Estatura" => "",
                "peso" => "",
                "edad" => ""
            ];

            $this->View("Clientes/");
        }

    }
    public function Show($id){
        $DatosC = $this->Clientes->GetById($id);
        $UserClient = $this->ShowUsuarios($id);
       
        $data = [
            "Datos" => $DatosC,
            "Credenciales" => $UserClient
        ];
        $this->View("Clientes/show",$data);
        
    }

    public function ShowUsuarios($id){
        $data = $this->Clientes->GetClientUser($id);
        return $data;
    }


}






?>