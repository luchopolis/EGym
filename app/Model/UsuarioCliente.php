<?php


class UsuarioCliente {
    

    public function __construct()
    {
        $this->db = new Base();
    }

    public function CreateUser($datos){
        $this->db->query("INSERT INTO datosusuarios(Email,UserName,PassWord,ClienteId) VALUES(:Email,:UserName,:Pass,:CId)");
        $this->db->bind(":Email",$datos["Email"]);
        $this->db->bind(":UserName",$datos["UserName"]);
        $this->db->bind(":Pass",$datos["Pass"]);
        $this->db->bind(":CId",$datos["CId"]);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    public function UpdateUser($id,$datos){
        $this->db->query("UPDATE datosusuarios set Email=:Email,UserName=:UserName,PassWord=:Pass WHERE ClienteId=:CId");
        $this->db->bind(":CId",$id);
        $this->db->bind(":Email",$datos["Email"]);
        $this->db->bind(":UserName",$datos["UserName"]);
        $this->db->bind(":Pass",$datos["Pass"]);
        

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }

    }

    //Check si el correo existe
    public function ValidateEmail($Email){
      

        $this->db->query("SELECT * FROM datosusuarios WHERE Email=:Email");
        $this->db->bind(":Email",$Email);
        $EmailMatch = $this->db->getOne();

        if($this->db->rowCountAffected() == 0){
            $EmailExist = false;
        }else{
            $EmailExist = true;
        }

        return $EmailExist;

    }

    public function InsertToken($Token,$Email){
        $this->db->query("INSERT INTO datosusuarios(Token) VALUES (:Token) WHERE Email=:Email");
        $this->db->bind(":Token",$Token);
        $this->db->bind(":Email",$Email);


        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }

        
    }

    public function UpdateToken($Token,$Email){
        $this->db->query("UPDATE datosusuarios SET Token=:Token WHERE Email=:Email");
        $this->db->bind(":Token",$Token);
        $this->db->bind(":Email",$Email);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }
    public function GetById($id){
        $this->db->query("SELECT * FROM datosusuarios WHERE id=:id");
        $this->db->bind(":id",$id);

        $Data = $this->db->GetOne();

        return $Data;

    }
      //Update PAss
      public function UpdatePass($Id,$data){
        $this->db->query("UPDATE datosusuarios SET PassWord=:Pass WHERE id=:Id");
        $this->db->bind(":Id",$Id);
        $this->db->bind(":Pass",$data["Pass"]);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    //Get token para comparar

    public function GetToken($Token){
        $this->db->query("SELECT id,Token,Email FROM datosusuarios WHERE Token=:Token");
        $this->db->bind(":Token",$Token);

        $TokenUser = $this->db->GetOne();

        return $TokenUser;
    }

  
}










?>