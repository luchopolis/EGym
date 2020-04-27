<?php 


/*Mapear URL
1-Controlador
2-Meotodo
3-Parametro
*/

class Core{

    protected $controladorActual = 'Ingreso'; //NotFound
    protected $metodoActual = 'index';
    protected $parametros = [];
    

    public function __construct()
    {   

        $url = $this->getUrl();
        
        if(file_exists("../app/Controller/".ucwords($url[0]).".php")){
            $this->controladorActual = ucwords($url[0]);
            

            unset($url[0]);

        }else if(ucwords($url[0]) != ""){
            $this->controladorActual = "NoPage";
        }

        require_once '../app/Controller/'.$this->controladorActual . '.php';

        //Crea Instancia del controlador
        $this->controladorActual = new $this->controladorActual;

        if(isset($url[1])){
            if(method_exists($this->controladorActual, $url[1])){
                $this->metodoActual = $url[1];
                unset($url[1]);
            }
        }

        //echo $this->metodoActual;

        $this->parametros = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);
    }
    public function getUrl(){
        if(isset($_GET["url"])){
            $url = rtrim($_GET["url"],"/");
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode("/",$url);

            return $url;
        }
    }
}