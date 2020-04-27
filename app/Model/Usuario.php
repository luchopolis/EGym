<?php




class Usuario{

    public $UserName;
    public $Email;
    public $PassWD;

    private $db;

    public function __construct()
    {
        $this->db = new Base;
        
    }

    public function ValidarUsuario($Usuario,$Pass){

        $this->UserName = $Usuario;
        $this->Email = $Usuario;
        $this->PassWD = $Pass;

        
        $Validar = $this->db->query("SELECT  *  FROM datosusuariosempleado WHERE (Email=:Email OR UserName=:UserN) and Pass=:PassWD");
        $this->db->bind(":Email",$this->Email);
        $this->db->bind(":UserN",$this->UserName);
        $this->db->bind(":PassWD",$this->PassWD);

        $MatchUser = $this->db->getOne();
        
        if($MatchUser){
            $UserExist = true;
        }else{
            $UserExist = false;
        }
        return $UserExist;


        /*$Validar = $this->db->prepare("SELECT *  FROM $this->table WHERE (Email=:Email OR UserName=:UserN) and PassWord=:PassWD");
        $Validar->bindParam(":Email",$this->Email);
        $Validar->bindParam(":UserN",$this->UserName);
        $Validar->bindParam(":PassWD",$this->PassWD);
        $Validar->execute();

        //variable para encontrar si el usuario existe
        $MatchUser = $Validar->fetch(PDO::FETCH_ASSOC); //Retorna un arreglo asociativo

        
        if($MatchUser){
            $UserExist = true;
            
        }else{
            $UserExist = false;
        }

        return $UserExist;*/

        
    }

    public function ObtenerUsuarios(){
        $Usuarios = $this->db->query("SELECT * FROM datosusuariosempleado");
        $DatosUsuarios = $this->db->getAll();

        return $DatosUsuarios;
    }

    public function GetOne($Name){
        $this->db->query("SELECT * FROM datosusuariosempleado WHERE UserName=:Name");
        $this->db->bind(":Name",$Name);
        $UserData = $this->db->getOne();

        return $UserData;


    }

    public function GetById($id){
        $this->db->query("SELECT * FROM datosusuariosempleado WHERE id=:id");
        $this->db->bind(":id",$id);
        $UserData = $this->db->getOne();

        return $UserData;
    }



    public function CreateUser($datos){
        $this->db->query("INSERT INTO datosusuariosempleado(Email,UserName,Pass,Tipo,NombreImagen)VALUES(:Correo,:Usuario,:Pass,:Tipo,:ImageAvatar)");
        $this->db->bind(":Correo",$datos["Correo"]);
        $this->db->bind(":Usuario",$datos["Usuario"]);
        $this->db->bind(":Pass",sha1($datos["PassWD"]));
        $this->db->bind(":Tipo",$datos["Tipo"]);
        $this->db->bind(":ImageAvatar",$datos["ImageAvatar"]);

        
        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }

    }

    public function UpdateUser($id,$datos){
        $this->db->query("UPDATE datosusuariosempleado SET Email=:Correo,UserName=:Usuario,Pass=:Pass,Tipo=:Tipo,NombreImagen=:ImageAvatar WHERE id=:id");
        $this->db->bind(":id",$id); 
        $this->db->bind(":Correo",$datos["Correo"]);
        $this->db->bind(":Usuario",$datos["Usuario"]);
        $this->db->bind(":Pass",sha1($datos["PassWD"]));
        $this->db->bind(":Tipo",$datos["Tipo"]);
        $this->db->bind(":ImageAvatar",$datos["ImageAvatar"]);

        
        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    }

    public function DeleteUser($id){
        $this->db->query("DELETE FROM datosusuariosempleado where id=:idUser");
        $this->db->bind(":idUser",$id);
        if($this->db->execQuery()){
            return true;
        }else{
            return false;
        }
    }


    public function ShowTipoUsuario(){
        $this->db->query("SELECT TipoEmpleado FROM tipoempleado");
        $TiposUsuarios = $this->db->getAll();
        
        return $TiposUsuarios;
    }

  
    
    
}


?>