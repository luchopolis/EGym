<?php


class Sesiones{

    function __construct()
    {
        
    }

    public function start(){
        session_start();
    }

    public function addNew($key,$Value){
        $_SESSION[$key] = $Value;
    }

    public function check($key){

         if(!empty($_SESSION[$key])){
             $SesionCreada = $_SESSION[$key];
         }else{
             $SesionCreada = null;
         }
         return $SesionCreada;
    }

    public function getSesiones(){
        return $_SESSION;
    }

    public function updateSesion($key,$NewValue){
        if(!empty($_SESSION[$key])){
            $_SESSION[$key] = $NewValue;
        }
    }

    public function unsetSesion($Key){

        if(!empty($_SESSION[$Key])){
            unset($_SESSION[$Key]);
        }
    }




}



?>