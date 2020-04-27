<?php 



class ChangePass extends Controller{

    public function __construct()
    {
        //Manda vacio para evitar entrar, a no ser que se tenga un toquen
        $this->UsuarioCliente= $this->Model("UsuarioCliente");
        
        
    }

    public function index(){
        
       
    }

    public function Update($id){

        

        

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "Pass" => $_POST["NPass"]
            ];

            $Data = $this->UsuarioCliente->GetById($id);

            $this->UpdateToken($Data->Email);
            $this->UsuarioCliente->UpdatePass($id,$data);

            $this->Redirect("Ingreso");

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
        $this->UsuarioCliente->UpdateToken($Token,$Email);
        
    }


    public function CheckToken($TokenCheck){
        
        if(!empty($TokenCheck)){
            
            $TokenUsuario = $this->UsuarioCliente->GetToken($TokenCheck);
            if($TokenCheck == $TokenUsuario->Token){
                $data = [
                    "UsuarioID" => $TokenUsuario->id
                ];
                $this->View("ChangePass/index",$data);
            }else{
                $this->Redirect("ForgotPassword");
            }
            //print_r($TokenUsuario);
            
            //echo strlen($TokenCheck);
           
            
        }else if(strlen($TokenCheck) == 0){
            
            $this->Redirect("Ingreso");
        }

    }

   

    
}







?>