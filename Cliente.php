<?php
include_once "Conexion.php";
class Cliente extends Conexion{
    public $correo;
    public $nombre;
    public $edad;
    //crud
    //create
    public function create(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO clientes (correo,nombre,edad) VALUES (?,?,?)");
        $pre->bind_param("ssi", $this->correo, $this->nombre, $this->edad);
        $pre->execute();
      
    }

    //update
    public function update(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE clientes SET nombre=?,edad=? WHERE correo=?");
        $pre->bind_param("sis", $this->nombre , $this->edad , $this->correo);
        $pre->execute();
    }

    //delete
    public function delete(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM clientes WHERE correo=?");
        $pre->bind_param("s", $this->correo);
        $pre->execute();
    }

   
    //read all
    public static function all(){
        $conexion = new Conexion();
        $conexion ->conectar();
        $pre = mysqli_prepare($conexion->con,"SELECT * FROM clientes");
        $pre->execute();
        $res = $pre->get_result();
        $clientes = [];

        while ($cliente = $res->fetch_object(Cliente::class)){
            array_push($clientes,$cliente);
        }

        return $clientes;
    
    }


    //read one obtener un objeto cliente por su correo (pk)
    public static function getByEmail($correo){
        $conexion = new Conexion();
        $conexion ->conectar();
        $pre = mysqli_prepare($conexion->con,"SELECT * FROM clientes WHERE correo = ?");
        $pre->bind_param("s", $correo);
        $pre->execute();
        $res = $pre->get_result();

        return $res->fetch_object(Cliente::class);
    }


}



?>