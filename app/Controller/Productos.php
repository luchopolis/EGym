<?php



class Productos extends Controller{

    private $Image;
    public function __construct()
    {
        $this->Productos = $this->Model("Producto");
    }


    public function index(){    
        $productos = $this->Productos->ObtenerProductos();
        $data = [
            "productos" => $productos
        ];
        $this->View("Productos/index",$data);
    }

    public function Edit($id){
        $Producto = $this->Productos->GetById($id);

        $data = [
            "Producto" => $Producto
        ];
        
        $this->View("Productos/edit",$data);
    }

    public function Update(){

    }

    public function Delete(){

    }

    public function Show(){
        $this->View("Productos/show");
    }
    public function Create(){
        $this->View("Productos/create");
    }

    public function Save(){

        $this->Image = null;

        if (isset($_FILES["ProductImg"]) && $_FILES["ProductImg"]["error"] == UPLOAD_ERR_OK) {

            $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . BASE . "public/images/Suplementos/" . basename($_FILES["ProductImg"]["name"]);

            if (move_uploaded_file($_FILES["ProductImg"]["tmp_name"], $rutaDestino)) {
                $this->Image = basename($_FILES["ProductImg"]["name"]);
            } else {
                $this->Image = basename($_FILES["ProductImg"]["name"] = "silueta.png");
                echo "Erro en subir imagen";
            }
        }else{
            $this->Image = "silueta.png";
        }   


        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $data = [
                "Product" => trim($_POST["Producto"]),
                "Descripcion" => trim($_POST["Descripcion"]),
                "Precio" => trim($_POST["Precio"]),
                "Stock" => trim($_POST["Stock"]),
                "ImageProduct" => $this->Image
            ];
//SETEAR VARIABLES
            $this->Productos->setNomProducto($data["Product"]);
            $this->Productos->setDescripcion($data["Descripcion"]);
            $this->Productos->setPrecio($data["Precio"]);
            $this->Productos->setStock($data["Stock"]);
            $this->Productos->setImage($data["ImageProduct"]);

            if ($this->Productos->CreateProduct()) {
                echo $data["ImageProduct"];
                $this->Redirect("Productos/");
            } else {
                die("Error en la sentencia");
            }
        } else {
            $data = [
                "Product" => "",
                "Descripcion" => "",
                "Precio" => "",
                "Stock" => "",
                "ImageProduct" => $this->Image
            ];

            $this->Productos->setNomProducto($data["Product"]);
            $this->Productos->setDescripcion($data["Descripcion"]);
            $this->Productos->setPrecio($data["Precio"]);
            $this->Productos->setStock($data["Stock"]);
            $this->Productos->setImage($data["ImageProduct"]);

            $this->View("Productos/create");
        }

    }


    
}









?>