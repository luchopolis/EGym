<?php

class Usuarios extends Controller
{
//CLASE PARA LOS USUARIOS ADMINISTRADORES O CON RANGO DE ACCEDER AL SISTEMA
    private $Imagen;

    public function __construct()
    {
        $this->UsuariosD = $this->Model("Usuario");
    }

    public function index()
    {

        $DatosUsuarios = $this->UsuariosD->ObtenerUsuarios();

        $data = [
            "Usuarios" => $DatosUsuarios
        ];
        $this->View("Usuarios/index", $data);
    }

    public function Edit($id)
    {
        $Tipos = $this->UsuariosD->ShowTipoUsuario();
        $Usuario = $this->UsuariosD->GetById($id);
        $data = [
            "Tipos" => $Tipos,
            "Usuario" => $Usuario
        ];
        $this->View("Usuarios/edit", $data);
    
    }

    public function Update($id){

        
        $this->Imagen  = null;
        if (isset($_FILES["imgAvatar"]) && $_FILES["imgAvatar"]["error"] == UPLOAD_ERR_OK) {

            $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . BASE . "public/images/" . basename($_FILES["imgAvatar"]["name"]);

            if (move_uploaded_file($_FILES["imgAvatar"]["tmp_name"], $rutaDestino)) {
                $this->Imagen = basename($_FILES["imgAvatar"]["name"]);
            } else {
                $this->Imagen = basename($_FILES["imgAvatar"]["name"] = "default.png");
                echo "Erro en subir imagen";
            }
        }else{
            $this->Imagen = "default.png";
        }   

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $data = [
                "Correo" => trim($_POST["Correo"]),
                "Usuario" => trim($_POST["Usuario"]),
                "PassWD" => trim($_POST["PassWD"]),
                "Tipo" => trim($_POST["Tipo"]),
                "ImageAvatar" => $this->Imagen
            ];

            if ($this->UsuariosD->UpdateUser($id,$data)) {
                echo $data["ImageAvatar"];
                $this->Redirect("Usuarios/");
            } else {
                die("Error en la sentencia");
            }
        } else {
            $data = [
                "Correo" => "",
                "Usuario" => "",
                "PassWD" => "",
                "Tipo" => trim($_POST["Tipo"]),
                "ImageAvatar" => $this->Imagen
            ];

            $this->View("Usuarios/Edit", $data);
        }

    }

    public function Delete($id){
        
        if($this->UsuariosD->DeleteUser($id)){
            $this->Redirect("Usuarios/");
        }else{
            echo "Error en borrar el registro";
        }
    }

    

    public function Create()
    {

        $Tipos = $this->UsuariosD->ShowTipoUsuario();
        $data = [
            "Tipos" => $Tipos
        ];
        $this->View("Usuarios/create", $data);
    }

    public function Save()
    {


        $this->Imagen  = null;
        if (isset($_FILES["imgAvatar"]) && $_FILES["imgAvatar"]["error"] == UPLOAD_ERR_OK) {

            $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . BASE . "public/images/" . basename($_FILES["imgAvatar"]["name"]);

            if (move_uploaded_file($_FILES["imgAvatar"]["tmp_name"], $rutaDestino)) {
                $this->Imagen = basename($_FILES["imgAvatar"]["name"]);
            } else {
                $this->Imagen = basename($_FILES["imgAvatar"]["name"] = "default.png");
                echo "Erro en subir imagen";
            }
        }else{
            $this->Imagen = "default.png";
        }   

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $data = [
                "Correo" => trim($_POST["Correo"]),
                "Usuario" => trim($_POST["Usuario"]),
                "PassWD" => trim($_POST["PassWD"]),
                "Tipo" => trim($_POST["Tipo"]),
                "ImageAvatar" => $this->Imagen
            ];

            if ($this->UsuariosD->CreateUser($data)) {
                echo $data["ImageAvatar"];
                $this->Redirect("Usuarios/");
            } else {
                die("Error en la sentencia");
            }
        } else {
            $data = [
                "Correo" => "",
                "Usuario" => "",
                "PassWD" => "",
                "Tipo" => trim($_POST["Tipo"]),
                "ImageAvatar" => $this->Imagen
            ];

            $this->View("Usuarios/create", $data);
        }
    }
}
