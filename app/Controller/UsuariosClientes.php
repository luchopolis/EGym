<?php


class UsuariosClientes extends Controller{

    public function __construct()
    {
        
        $this->UClientes = $this->Model("UsuarioCliente");
    }

    public function Create($id){
        
        $data = [
            "ID" => $id
        ];
        $this->View("UsuariosClientes/Create",$data);
    }

    public function Save($idCliente){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "Email" => trim($_POST["Correo"]),
                "Pass" => trim($_POST["PassWD"]),
                "UserName" => trim($_POST["Usuario"]),
                "CId" => $idCliente
            ];

            if($this->UClientes->CreateUser($data)){
                $this->Redirect("Clientes/Show/".$idCliente);
            }else{
                die("Error en crear Usuario");
            }
        }else{
            $data = [
                "Email" => "",
                "Pass" => "",
                "UserName" => "",
                "CId" => ""
            ];

            $this->View("Clientes/");
        }


    }


    public function Update($idCliente){
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "Email" => trim($_POST["Email"]),
                "Pass" => trim($_POST["PassU"]),
                "UserName" => trim($_POST["UserName"]),
                "CId" => $idCliente
            ];

            if($this->UClientes->UpdateUser($idCliente,$data)){
                $this->Redirect("Clientes/Show/".$idCliente);
            }else{
                die("Error en actualizar Usuario");
            }
        }else{
            $data = [
                "Email" => "",
                "Pass" => "",
                "UserName" => "",
                "CId" => ""
            ];

            $this->View("Clientes/");
        }

    }
}






?>