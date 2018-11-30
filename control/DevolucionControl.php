<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\PrestamoDAO;
use modelo\vo\Prestamo;
use modelo\vo\Libro;
use modelo\vo\Ejemplar;
use modelo\vo\usuario;
use modelo\vo\Estado;
use modelo\dao\DevolucionDAO;
use modelo\vo\Devolucion;
use const RUTA_PRINCIPAL;

//use const URL_PRINCIPAL;

/**
 * Description of PrestamoControl
 *
 * @author JOHANA
 */
class DevolucionControl extends GenericoControl {

  private $devolucionDAO;

  public function __construct(&$cnn) {
    parent::__construct($cnn);
    parent::validarSesion();
    $this->devolucionDAO = new DevolucionDAO($cnn);
  }

  public function index() {    
    include RUTA_PRINCIPAL . '/vistaAdministrador/DevolucionPrestamo.php';
  }

// insertar la devolucion --- adminsitrador

  function registrarDevolucionLibro() {
    try {
      $this->cnn->beginTransaction();
      $idEjemplar= $_POST['dev_idejemplar'];
      $idprestamo= $_POST['dev_idprestamo'];
      $this->devolucionDAO->ConsEjemCambioEst($idEjemplar);
      $this->devolucionDAO->ActualizarEstEjem($idEjemplar);
      $this->devolucionDAO->ConsPresCambioEst($idprestamo);
      $this->devolucionDAO->ActualizarEstPre($idprestamo);
      $this->cnn->commit();
    } catch (Exception $exc){    
      $this->cnn->rollBack();
      echo $exc->getTraceAsString();
    }
      $devolucion = new Devolucion();
      $devolucion->convertir($_POST);
      $devolucion = $this->devolucionDAO->insertar($devolucion);
     // include RUTA_PRINCIPAL . '/vistaAdministrador/home.php';          
       print '<script languaje="JavaScript"> alert("La devolución fue un éxito."); </script>';
     header('Location:' . CONSULTAR_PRESTAMO['url']);
    }
  //consulta todas las devoluciones pendientes ----administrador
  public function consultarDevolucionesPendientes() {
    $prestamoDev = new Prestamo();
    $prestamoDev->getCampos($_POST);
    $listaDevoluciones = $this->devolucionDAO->ConsultarDevolucion($prestamoDev);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaDevolucion.php';
  }

}
