
<?php 

class MainMenu extends Controller{
    public function __construct()
    {
        $this->Maquinas = $this->Model("Maquina");
    }

    public function index(){

        $Maquinas = json_encode($this->Maquinas->ObtenerMaquinas());
            $data = [
                "Maquinas" => $Maquinas
            ];
    
            $this->View('Main/index',$data);  
    }

    public function showData(){
        $Maquinas = json_encode($this->Maquinas->ObtenerMaquinas());

        echo $Maquinas;
    }
   
}