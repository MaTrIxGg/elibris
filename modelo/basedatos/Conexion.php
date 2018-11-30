<?php
namespace modelo\basedatos;

use PDO;

class Conexion {

    public static function conectar() {      
        $cnn = new PDO('mysql:host=den1.mysql1.gear.host; port=3306;  dbname=elibris', 'elibris', 'Mx7t84TksT!~'); 
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $cnn;
    }


}
