<?php

class Conexion {

    static function Conect(){
        
        try{
            $con = new PDO("mysql:host=localhost;dbname=GYMUGB","Caballero","usuarioroot");
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $e){
            echo "error en linea" . $e->getLine();
        }
    }
}

