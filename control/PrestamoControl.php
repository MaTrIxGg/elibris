<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\PrestamoDAO;
use modelo\vo\Prestamo;
use modelo\vo\Libro;
use modelo\vo\Ejemplar;
use modelo\vo\usuario;
use modelo\vo\Estado;

use const RUTA_PRINCIPAL;

//use const URL_PRINCIPAL;

/**
 * Description of PrestamoControl
 *
 * @author JOHANA
 */
class PrestamoControl extends GenericoControl {

  private $prestamoDAO;

  public function __construct(&$cnn) {
    parent::__construct($cnn);
    parent::validarSesion();
    $this->prestamoDAO = new PrestamoDAO($cnn);
  }

  public function index() {
//select de ejemplar
    $ejemplarPre = new Ejemplar();
    $ejemplarPre->getIdejemplar($_POST);
    $listaEjemplarpre = $this->prestamoDAO->ConsultarEjemplarPres($ejemplarPre);

//select de usuario
    $usuarioPre = new \modelo\vo\usuario();
    $usuarioPre->getIdusuario($_POST);
    $listaUsuariopre = $this->prestamoDAO->ConsultarUsuarioPres($usuarioPre);

//select de estado
    $estadoPre = new \modelo\vo\usuario();
    $estadoPre->getIdestado($_POST);
    $listaEstadopre = $this->prestamoDAO->ConsultarEstadoPres($estadoPre);
    include RUTA_PRINCIPAL . '/vistaAdministrador/prestamo.php';
  }

  //------insertar--- administrador//
  function registrarPrestamo() {              
  try {
      $this->cnn->beginTransaction();          
      $idEjemplar= $_POST['pre_idejemplar'];   
      $this->prestamoDAO->ConsultarIdEjemplarCambio($idEjemplar);  
      
      $this->prestamoDAO->ActualizarEstadoEjem($idEjemplar);       
          $this->cnn->commit();    
        } catch (Exception $exc) {
      $this->cnn->rollBack();
      echo $exc->getTraceAsString();
    }  
      $prestamo = new \modelo\vo\Prestamo();
      $prestamo->convertir($_POST);
      $prestamo = $this->prestamoDAO->insertar($prestamo);                          
    //include RUTA_PRINCIPAL . '/vistaAdministrador/home.php'; 
       print '<script languaje="JavaScript"> alert("El préstamo fue un éxito."); </script>';
      header('Location:' . CONSULTAR_PRESTAMO['url']);
  } 
    //------insertar prestamo con reserva-- administrador-//
  function registrarPrestamoRe() {              
  try {
      $this->cnn->beginTransaction();          
      $idEjemplar= $_POST['pre_idejemplar'];
          $idRes= $_POST['res_idreserva'];  
      $this->prestamoDAO->ConsultarIdEjemplarCambio($idEjemplar);       
      $this->prestamoDAO->ActualizarEstadoEjem($idEjemplar);          
      $this->prestamoDAO->ConsultarResCamb($idRes); 
           $this->prestamoDAO->ActualizarEstadoRes($idRes); 
          $this->cnn->commit();    
        } catch (Exception $exc) {
      $this->cnn->rollBack();
      echo $exc->getTraceAsString();
    }  
      $prestamo = new \modelo\vo\Prestamo();
      $prestamo->convertir($_POST);
      $prestamo = $this->prestamoDAO->insertar($prestamo);                          
   // include RUTA_PRINCIPAL . '/vistaAdministrador/home.php';     
       print '<script languaje="JavaScript"> alert("El préstamo fue un éxito."); </script>';
      header('Location:' . CONSULTAR_RESERVA['url']);
  } 
  //consulta todos los prestamo administrador
  public function consultarPrestamo() {
    $prestamo = new Prestamo();
    $prestamo->getCampos($_POST);
    $listaprestamo = $this->prestamoDAO->ConsultarPrestamo($prestamo);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaPrestamo_1.php';
  }
  //consulta todos los prestamo ---estudiante
  public function consultarPrestamoEstudiante() {                        
    $prestamo = new Prestamo();    
    $usuario = $_SESSION['usuario'];  
    $id = $usuario->getNumerodocumento();   
    $prestamo->setIdusuario($id);
    $prestamo->getCampos($_POST);
    $listaprestamoEst = $this->prestamoDAO->ConsultarPrestamosEstudiante($prestamo);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaPrestamoEstudiante.php';
  }
    //consulta todos los prestamo ---Docente
  public function consultarPrestamoDocente() {                        
    $prestamo = new Prestamo();    
    $usuario = $_SESSION['usuario'];  
    $id = $usuario->getNumerodocumento();   
    $prestamo->setIdusuario($id);
    $prestamo->getCampos($_POST);
    $listaprestamoDoc = $this->prestamoDAO->ConsultarPrestamosDocente($prestamo);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaPrestamoDocente.php';
  }

  //----consulta por id---//
  function mostrarModificarPrestamo() {
    $id = $_GET['idprestamo'];
    $prestamo = $this->prestamoDAO->ConsultarId($id);

    //Select ejemplar
    $ejemplarPreM = new Ejemplar();
    $ejemplarPreM->getIdejemplar($_POST);
    $listaejemplarPreM = $this->prestamoDAO->ConsultarEjemplarPres($ejemplarPreM);
    //Select usuario
    $usuarioPreM = new usuario();
    $usuarioPreM->getIdusuario($_POST);
    $listausuarioPreM = $this->prestamoDAO->ConsultarUsuarioPres($usuarioPreM);
    //Select estado
    $estadoPreM = new Estado();
    $estadoPreM->getIdestado($_POST);
    $listaestadoPreM = $this->prestamoDAO->ConsultarEstadoPres($estadoPreM);
    include RUTA_PRINCIPAL . '/vistaAdministrador/modificarPrestamo.php';
  }
  
  //---------modificacion---- administrador//
  function modificarPrestamo() {
     $id = $_GET['idprestamo'];
    $ideje = $_POST['pre_idejemplar'];
    $idusua = $_POST['pre_idusuario'];
    $fechapres = $_POST['pre_fechaprestamo'];
    $fechalim = $_POST['pre_fechalimite'];
    $idest = $_POST['pre_idestado'];
    $pres = new Prestamo();
    $pres->setIdprestamo($id);
    $pres->setIdejemplar($ideje);
    $pres->setIdusuario($idusua);
    $pres->setFechaprestamo($fechapres);
    $pres->setFechalimite($fechalim);
    $pres->setIdestado($idest);
    $this->prestamoDAO->ActualizarPrestamo(($pres));
   // include_once RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
     print '<script languaje="JavaScript"> alert("El préstamo se modifico fue un éxito."); </script>';
      header('Location:' . CONSULTAR_PRESTAMO['url']);
  }
  
    //----consulta datos de la reserva para el prestamo---//
function mostrarDatosPrestamo() {
    $id = $_GET['idprestamo'];
    $prestamo = $this->reservaDAO->ConsultarDatosPresta($id);        
    //Select ejemplar
    $ejemplarDatos = new Ejemplar();
    $ejemplarDatos->getIdejemplar($_POST);
    $listaejemplaDatos = $this->reservaDAO->ConsultarEjemplarRe($ejemplarDatos);
    //Select usuario
    $usuarioDatos = new usuario();
    $usuarioDatos->getIdusuario($_POST);
    $listausuarioDatos = $this->reservaDAO->ConsultarUsuarioRe($usuarioDatos);
    //Select estado
    $estadoreDatos = new Estado();
    $estadoreDatos->getIdestado($_POST);
    $listaestadoDatos = $this->reservaDAO->ConsultarEstadoRe($estadoreDatos);    
    include RUTA_PRINCIPAL . '/vistaAdministrador/prestamoReserva.php';
  }
  
  //el resultado de la consulta para el informe
   function informePrestamo() {
       $prestamo = new Prestamo();
    $prestamo->getCampos($_POST);
    $listaprestamo = $this->prestamoDAO->InformePrestamos($prestamo);     
        include RUTA_PRINCIPAL . '/vistaAdministrador/informe.php';
    } 
  //muestra en el modal consulta por id del prestamo para realizar la devolucion 
    function mostrarConsultaDev() {
        $idprestamo = $_GET['idprestamo'];
        $prestamoReg = $this->prestamoDAO->ConsultarPrestamoReg($idprestamo); 
        //echo json_encode($prestamoReg);
        include RUTA_PRINCIPAL . '/vistaAdministrador/DevolucionPrestamo.php';
    }

}
