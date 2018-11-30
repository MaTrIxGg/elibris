<?php
namespace control;

use control\generico\GenericoControl;

class MenuControl {
    public function indexAdministrador(){
        include RUTA_PRINCIPAL. '/vistaAdministrador/home.php'; 
    }
        public function indexEstudiante(){
        include RUTA_PRINCIPAL. '/vistaAdministrador/homeEstudiante.php';         
    }
     public function indexDocente(){
        include RUTA_PRINCIPAL. '/vistaAdministrador/homeDocente.php';         
    }
     public function indexFuncionario(){
        include RUTA_PRINCIPAL. '/vistaAdministrador/homeFuncionario.php';         
    }
    //cierre de sesion 
        public function  cerrarSesion(){
         session_destroy();
         setcookie('usuario', null, -1, URL_PRINCIPAL);
         header('Location:' .URL_PRINCIPAL);
    }
}
