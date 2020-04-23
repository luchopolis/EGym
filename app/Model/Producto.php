<?php


class Producto{

    private $NomProducto;
    private $Descripcion;
    private $Precio;
    private $Stock;
    private $ImageP;


    public $db;
    public function __construct()
    {
        $this->db = new Base();
    }

    public function setNomProducto($NomProducto){
        $this->NomProducto = $NomProducto;
    }

    public function setDescripcion($Desc){
        $this->Descripcion = $Desc;
    }

    public function setPrecio($Price){
        $this->Precio = $Price;
    }

    public function setStock($Stock){
        $this->Stock = $Stock;
    }

    public function setImage($Image){
        $this->ImageP = $Image;
    }


    //SE SETEAN ESAS VARIABLES, PARA QUE EN EL SQL SOLO SE LLAMEN 

    public function getNomProducto(){
        return $this->NomProducto;
    }

    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getPrecio(){
        return $this->Precio;
    }

    public function getStock(){
        return $this->Stock;
    }

    public function getImage(){
        return $this->ImageP;
    }


    public function ObtenerProductos(){
        $this->db->query("SELECT * FROM productos");
        $Productos = $this->db->getAll();

        return $Productos;
    }

    public function GetById($id){
        $this->db->query("SELECT * FROM productos WHERE id=:id");
        $this->db->bind(":id",$id);
        $UserData = $this->db->getOne();

        return $UserData;
    }
    public function CreateProduct(){
        $this->db->query("INSERT INTO productos(nombre_p,Descripcion,Precio,Stock,ImageProduct) values(:Product,:DescP,:Precio,:Stock,:ImageP)");
        $this->db->bind(":Product",$this->NomProducto);
        $this->db->bind(":DescP",$this->Descripcion);
        $this->db->bind(":Precio",$this->Precio);
        $this->db->bind(":Stock",$this->Stock);
        $this->db->bind(":ImageP",$this->ImageP);

        if($this->db->execQuery()){
            return true;
        }else{

            return false;
        }
    }

    public function DeleteProduct($id){
        
    }

    
}


?>