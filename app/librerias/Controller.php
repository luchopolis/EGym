
<?php

class Controller{

    public function Model($Model){
        require_once '../app/Model/'.$Model.'.php';
        //Instancia del Objeto
        return new $Model;
    }

    public function View($View, $data = []){
        if(file_exists('../app/View/' .$View. '.php')){
            require_once '../app/View/' .$View. '.php';
        }else{
            die("La vista no existe");
        }
    }

    public function Library($Libray){
        require_once '../app/librerias/'.$Libray.'.php';
        //Instancia del Objeto
        return new $Libray;
    }

    public function Redirect($pagina){
        header('location:'.RUTA_URL.$pagina);
    }

    public function JustRoute($pagina){
        $url = BASE.$pagina;
        return $url;
    }

    
}

?>