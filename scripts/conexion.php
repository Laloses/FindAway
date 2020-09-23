<?php
class conectarDB{ 
    private $link;
    function __construct(){        
        $this->link = new mysqli('localhost', 'root', '', 'findaway'); 
         if( $this->link->connect_error ){
        echo "<script>alert('Mala conexion a base de datos')</script>
        <p>Error: ".$this->link->connect_error."</p>";
        }         
    } 
    public function consultar($sentencia){ 
        $result=$this->link->query($sentencia) or die($this->link->error.__LINE__);
        return $result; 
    } 
}
?>
