<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\AutorDAO;
use modelo\vo\Autor;
use const RUTA_PRINCIPAL;
//use const URL_PRINCIPAL;

/**
 * Description of AutorControl
 *
 * @author JOHANA
 */
class AutorControl extends GenericoControl {

    private $autorDAO;

    public function __construct(&$cnn) {
        parent::__construct($cnn);
        parent::validarSesion();
        $this->autorDAO = new AutorDAO($cnn);
    }

    public function index() {
        include RUTA_PRINCIPAL . '/vistaAdministrador/autor.php';       
    }
     //------insertar--- ADMINISTRADOR//
    function registrarAutor() {        
        $autor = new \modelo\vo\Autor();
        $autor->convertir($_POST);
        $autor = $this->autorDAO->insertar($autor);
        //include RUTA_PRINCIPAL . '/vistaAdministrador/autor.php';       
         header('Location:' . CONSULTAR_AUTOR['url']);
    }
    //consulta todos los AUTORES --ADMINISTRADOR
    public function consultarAutor() {
        $autor = new Autor();
        $autor->getCampos($_POST);
        $lista = $this->autorDAO->ConsultarAutor($autor);
        include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaAutor.php';
    } 
    
//    public function consultarAutorEstudiante() {
//        $autor = new Autor();
//        $autor->getCampos($_POST);
//        $listaAutorEstudiante = $this->autorDAO->ConsultarAutorEstudiante($autor);
//        include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaAutorEstudiante.php';
//    }
    //----consulta por id--- ADMINISTRADOR//
    function mostrarModificarAutor() {
        $id = $_GET['idautor'];
        $autor = $this->autorDAO->ConsultarId($id);
       include RUTA_PRINCIPAL . '/vistaAdministrador/modificarAutor.php';
    }    
    //---------modificacion--- ADMINISTRADOR-//
    function modificarAutor() {
        $id = $_GET['idautor'];
        $nombre = $_POST['aut_nombresautor'];
        $apellido = $_POST['aut_apellidosautor'];
        $aut = new Autor();
        $aut->setIdautor($id);
        $aut->setNombresautor($nombre);
        $aut->setApellidosautor($apellido);
        $this->autorDAO->ActualizarAutor(($aut));           
//        print '<script '
//        . 'languaje="JavaScript">alert("Autor se ha modificado exitosamente"); </script>';
        //include_once RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
         header('Location:' . CONSULTAR_AUTOR['url']);
    }

    

}
