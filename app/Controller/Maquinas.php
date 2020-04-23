<?php 

class Maquinas extends Controller{

    public function __construct()
    {
        $this->Maquina = $this->Model("Maquina");
    }

    public function index(){

        $Maquinas = $this->Maquina->ObtenerMaquinas();

        $data = [
            "Maquinas" => $Maquinas
        ];

        $this->View("Maquinas/index",$data);
    }


    public function create(){

        $this->View("Maquinas/create");
    }

    public function Save(){
        $this->Image = null;

        if (isset($_FILES["MaquinaImg"]) && $_FILES["MaquinaImg"]["error"] == UPLOAD_ERR_OK) {

            $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . BASE . "public/images/Maquinas/" . basename($_FILES["MaquinaImg"]["name"]);

            if (move_uploaded_file($_FILES["MaquinaImg"]["tmp_name"], $rutaDestino)) {
                $this->Image = basename($_FILES["MaquinaImg"]["name"]);
            } else {
                $this->Image = basename($_FILES["MaquinaImg"]["name"] = "silueta.jpg");
                echo "Error en subir imagen";
            }
        }else{
            $this->Image = "silueta.jpg";
        }  

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "NombreMaquina" => trim($_POST["NombreMaquina"]),
                "Estado" => "Disponible",
                "ImageMaquina" => $this->Image
            ];

            if($this->Maquina->CreateMaquina($data)){
                $this->Redirect("Maquinas/");
            }else{
               die("Error sentencia");
            }
        }else{
            $data = [
                "NombreMaquina" => "",
                "Estado" => "",
                "ImageMaquina" => ""
            ];

            $this->View("Maquinas/create");
        }

    }

    public function edit($id){
        
        $Maquina = $this->Maquina->GetById($id);

        $data = [
            "Maquina" => $Maquina
        ];

        $this->View("Maquinas/edit",$data);
    }

    public function Update($id){
        $this->Image = null;

        if (isset($_FILES["MaquinaImg"]) && $_FILES["MaquinaImg"]["error"] == UPLOAD_ERR_OK) {

            $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . BASE . "public/images/Maquinas/" . basename($_FILES["MaquinaImg"]["name"]);

            if (move_uploaded_file($_FILES["MaquinaImg"]["tmp_name"], $rutaDestino)) {
                $this->Image = basename($_FILES["MaquinaImg"]["name"]);
            } else {
                $this->Image = basename($_FILES["MaquinaImg"]["name"] = "silueta.jpg");
                echo "Error en subir imagen";
            }
        }else{
            $this->Image = "silueta.jpg";
        }  

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $data = [
                "NombreMaquina" => trim($_POST["NombreMaquina"]),
                "Estado" => "Disponible",
                "ImageMaquina" => $this->Image
            ];

            if($this->Maquina->UpdateMaquina($id,$data)){
                $this->Redirect("Maquinas/");
            }else{
               die("Error sentencia");
            }
        }else{
            $data = [
                "NombreMaquina" => "",
                "Estado" => "",
                "ImageMaquina" => ""
            ];

            $this->View("Maquinas/edit");
        }
    }
}