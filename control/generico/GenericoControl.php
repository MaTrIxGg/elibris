<?php

namespace control\generico;
abstract class GenericoControl {

    /**
     *
     * @var PDO 
     */
    protected $cnn;

    public function __construct(&$cnn) {
        $this->cnn = $cnn;
        session_start();
    }
    
    public function validarSesion() {
        if(!isset($_SESSION['usuario'])){
                 header('Location:' . URL_PRINCIPAL);
        }
    }
    public function respuestaJSON($info = array()) {
          header('Content-Type:application/json');
        $json = json_encode($info);
        echo $json;
    }
}
