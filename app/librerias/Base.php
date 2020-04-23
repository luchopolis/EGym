<?php


class Base{


    private $Host = DB_HOST;
    private $UserName = DB_USER;
    private $PassDB = DB_PASS;
    private $DBName = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' .$this->Host . ';dbname=' . $this->DBName;

        try{
            $this->dbh = new PDO($dsn, $this->UserName, $this->PassDB);
            $this->dbh->exec('set names utf8');
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error . " en la linea". $e->getLine();
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parametro,$valor,$tipo = null){
        if(is_null($tipo)){
            switch(true){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                    $tipo = PDO::PARAM_STR;
                break;
            }
        }

        $this->stmt->bindValue($parametro,$valor,$tipo);
    }

    //Ejecutar la query

    public function execQuery(){
        return $this->stmt->execute();
    }

    //Obtener registros

    public function getAll(){
        $this->execQuery();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ); //Retorna los atributos como una clase
    }

    //Obtener registro
    public function getOne(){
        $this->execQuery();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Cantidad de filas afectadas

    public function rowCountAffected(){
       return $this->stmt->rowCount();
    }
    


}







?>