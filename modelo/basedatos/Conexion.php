<?php
namespace modelo\basedatos;

use PDO;

class Conexion {

    public static function conectar() {      
        $cnn = new PDO('mysql:host=localhost; port=3306;  dbname=elibris', 'biblioteca', '123'); 
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnn;
    }


}
