<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\EditorialDAO;
use modelo\vo\Editorial;
use const RUTA_PRINCIPAL;
//use const URL_PRINCIPAL;

/**
 * Description of EditorialControl
 *
 * @author JOHANA
 */
class EditorialControl extends GenericoControl{
   private $editorialDAO;

    public function __construct(&$cnn) {
        parent::__construct($cnn);
        parent::validarSesion();
        $this->editorialDAO = new EditorialDAO($cnn);
    }

    public function index() {
        include RUTA_PRINCIPAL . '/vistaAdministrador/editorial.php';
        
    }
//-------------insertar Administrador
    function registrarEditorial() {
        $editorial = new Editorial();
        $editorial->convertir($_POST);
        $editorial = $this->editorialDAO->insertar($editorial);        
          print '<script ' . 'languaje="JavaScript">alert("La Editorial se inserto con éxito"); </script>';
        include RUTA_PRINCIPAL . '/vistaAdministrador/editorial.php';
        

//        print '<script languaje="JavaScript"> alert("Se guardo exitosamente la editorial");</script>';
    }
    //----consulta todas las editoriales Administrador
    function consultarEditorial() {
        $editorial = new Editorial();
        $editorial->getCampos($_POST);
        $lista = $this->editorialDAO->ConsultarEditorial($editorial);
        include RUTA_PRINCIPAL . '/vistaAdministrador/listaEditorial.php';
   }                 
    //-----consulta por id Administrador
    function mostrarModificarEditorial() {
        $id = $_GET['ideditorial'];
        $editorial = $this->editorialDAO->ConsultarId($id);
        include RUTA_PRINCIPAL . '/vistaAdministrador/modificarEditorial.php';
    }
    //-----modificacion Administrador
    function modificarEditorial(){
        $id = $_GET['ideditorial'];
        $nombre = $_POST['edi_nombreeditorial'];        
        $edi = new Editorial();
        $edi->setIdeditorial($id);
        $edi->setNombreeditorial($nombre);        
        $this->editorialDAO->ActualizarEditorial(($edi));        
        print '<script ' . 'languaje="JavaScript">alert("La Editorial se ha modificado exitosamente"); </script>';
        //include_once RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
         header('Location:' . CONSULTAR_EDITORIAL['url']);
    }   
}
