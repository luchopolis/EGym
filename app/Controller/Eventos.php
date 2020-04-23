<?php 

class Eventos extends Controller{

    public function __construct()
    {
        $this->EventosD = $this->Model("Evento");
    }
    public function index(){

        $this->View("Eventos/index");
    }

    public function show(){

        $HorariosEventos = $this->EventosD->ObtenerEventos();

        $data = [
            "Eventos" => json_encode($HorariosEventos)
        ];

        $this->View("Eventos/show",$data);
    }

    

    public function Store(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "title" => $_POST["title"],
                "Description" => $_POST["Description"],
                "start" => $_POST["start"],
                "end" => $_POST["end"]
            ];

            if($this->EventosD->CreateEvent($data)){
                $this->Redirect("Eventos/");
            }else{
             
                die(" Error");
                
                $this->Redirect("Eventos/");
            }
            
        }else{
            $data = [
                "title" => "",
                "Description" => "",
                "start" => "",
                "end" => ""
            ];

            $this->Redirect("Eventos/");
        }
    }

    public function Edit($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "title" => $_POST["title"],
                "Description" => $_POST["Description"],
                "start" => $_POST["start"],
                "end" => $_POST["end"]
            ];

            if($this->EventosD->UpdateEvent($id,$data)){
                $this->Redirect("Eventos/");
            }else{
                print_r($data);
                die(" Error");

                $this->Redirect("Eventos/");
            }

        }else{
            $data = [
                "title" => "",
                "Description" => "",
                "start" => "",
                "end" => ""
            ];

            $this->Redirect("Eventos/");
        }

    }
}