<?php


class ForgotPassword extends Controller{


    public function __construct()
    {
        $this->CheckEmail = $this->Model("UsuarioCliente");
        $this->CorreoE = $this->Library("Mail");
    }
    public function index(){

        $this->View("ForgotPassword/index");
    }


    public function ValidateEmail(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $data = [
                "Email" => $_POST["correo"]
            ];
            
            if($this->CheckEmail->ValidateEmail($data["Email"])){
                $this->UpdateToken($data["Email"]);
                //$this->SendM($data["Email"]);
                
                //$this->Redirect("Ingreso");
            }else{
                //$this->Redirect("ForgotPassword");
                die("Error no email found");
            }

        }else{
            $this->Redirect("ForgotPassword");
        }
    }

    //Genera un un nuevo token, para actualizar en los datosusuarios
    
    public function GenerateToken(){
        //GEnera un HEX aleatorio, comparable con el de la comlumna de la tabla 
        $token = openssl_random_pseudo_bytes(16);
        //CONVIERTE DE BIN A HEX
        $token = bin2hex($token);

        return $token;

    }
    //Inserta el token por el email
    public function UpdateToken($Email){
        $Token = $this->GenerateToken();
        $this->CheckEmail->UpdateToken($Token,$Email);
        $this->SendM($Email,$Token);
    }

    public function SendM($Email,$Token){
        $this->CorreoE->SendEmail($Email,$Token);
    }

   


}


?>