<?php


//require_once "/EGYM/Model/Usuario/Usuario.php";

class Ingreso extends Controller{
    private $Session;
    public function __construct()
    {
        $this->Usuario = $this->Model("Usuario"); //Retorna una instancia 
    }

    public function index(){

        
        $this->View("Login/index");
        
        
    }
    public function Login(){
        $userName = $_POST["UserName"];
        $password = $_POST["PassWD"];


        $UserExist = $this->Usuario->ValidarUsuario($userName,sha1($password));

        if($UserExist){
            $this->Session = $this->Library("Sesiones");
            $this->Session->start();
            $this->Session->addNew("UsuarioGYM",$userName);

            $data = [
                "Titulo" => "Main GYM",
                "Usuario" => $UserExist
            ];
            
            //header("Location:".RUTA_URL);
            $this->Redirect("MainMenu");
        }else{
           
            header("Location:".RUTA_URL);
            
        }


    }

    public function Cerrar(){
        $this->Session = $this->Library("Sesiones");
        $this->Session->start();
        $this->Session->unsetSesion("UsuarioGYM");
        header("Location:".RUTA_URL);

    }
    
}






?>