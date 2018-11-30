<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\ReservaDAO;
use modelo\vo\Reserva;
use modelo\vo\Ejemplar;
use modelo\vo\usuario;
use modelo\vo\Estado;
use const RUTA_PRINCIPAL;

//use const URL_PRINCIPAL;

/**
 * Description of ReservaControl
 *
 * @author JOHANA
 */
class ReservaControl extends GenericoControl {

  private $reservaDAO;

  public function __construct(&$cnn) {
    parent::__construct($cnn);
    parent::validarSesion();
    $this->reservaDAO = new ReservaDAO($cnn);
  }
   
    public function index() {

//select de ejemplar
    $ejemplarRe = new Ejemplar();
    $ejemplarRe->getIdejemplar($_POST);
    $listaEjemplaRe = $this->reservaDAO->ConsultarEjemplarRe($ejemplarRe);

//select de usuario
    $usuarioRe = new usuario();
    $usuarioRe->getIdusuario($_POST);
    $listaUsuarioRe = $this->reservaDAO->ConsultarUsuarioRe($usuarioRe);

//select de estado
    $estadoRe = new Estado();
    $estadoRe->getIdestado($_POST);
    $listaEstadoRes = $this->reservaDAO->ConsultarEstadoReserva($estadoRe); 
    include RUTA_PRINCIPAL . '/vistaAdministrador/reservaPrestamo.php';
  }
  //------insertar estudiante---//
  function registrarReserva() {
    try {
      $this->cnn->beginTransaction();
      $codEjemplar = $_POST['res_idejemplar'];
      $this->reservaDAO->ConsultaEjemCambio($codEjemplar);
      $this->reservaDAO->ActualizarEstadoEjemReserva($codEjemplar);
      $this->cnn->commit();
    } catch (Exception $exc){    
      $this->cnn->rollBack();
      echo $exc->getTraceAsString();
    }
      $reserva = new Reserva();
      $reserva->convertir($_POST);
      $reserva = $this->reservaDAO->insertar($reserva);
      //include RUTA_PRINCIPAL . '/vistaAdministrador/homeEstudiante.php';          
       print '<script languaje="JavaScript"> alert("La reserva fue un éxito."); </script>';
      header('Location:' . CONSULTAR_RESERVA_EST['url']);
    }
    //------insertar docente---//
  function registrarReservaDoc() {
    try {
      $this->cnn->beginTransaction();
      $codEjemplar = $_POST['res_idejemplar'];
      $this->reservaDAO->ConsultaEjemCambio($codEjemplar);
      $this->reservaDAO->ActualizarEstadoEjemReserva($codEjemplar);
      $this->cnn->commit();
    } catch (Exception $exc){    
      $this->cnn->rollBack();
      echo $exc->getTraceAsString();
    }
      $reserva = new Reserva();
      $reserva->convertir($_POST);
      $reserva = $this->reservaDAO->insertar($reserva);
      //include RUTA_PRINCIPAL . '/vistaAdministrador/homeDocente.php';          
       print '<script languaje="JavaScript"> alert("La reserva fue un éxito."); </script>';
      header('Location:' . CONSULTAR_RESERVA_DOCENTE['url']);
    }
  //consulta todos los prestamo
  public function consultarReserva() {
    $reservas = new Reserva();
    $reservas->getCampos($_POST);
    $listaReservas = $this->reservaDAO->ConsultarReserva($reservas);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaReserva.php';
  }
//lista de reserva --Estudiante
    public function consultarReservaEst() {
    $reservas = new Reserva();
        $usuario = $_SESSION['usuario']; 
    $id = $usuario->getNumerodocumento();  
    $reservas->setIdusuario($id);
    $reservas->getCampos($_POST);
    $listaReservasEst = $this->reservaDAO->ConsultarReservaEst($reservas);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaReservaEst.php';
  }
  //lista de reserva --Docente
      public function consultarReservaDoc() {
    $reservas = new Reserva();
    $usuario = $_SESSION['usuario'];  
    $id = $usuario->getNumerodocumento();  
    $reservas->setIdusuario($id);
    $reservas->getCampos($_POST);
    $listaReservasDoce = $this->reservaDAO->ConsultarReservaDoce($reservas);
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaReservaDoce.php';
  }

  //----consulta por id --Estudiante---//
  function mostrarModificarReserva() {
    $id = $_GET['idreserva'];
    $reserva = $this->reservaDAO->ConsultarId($id);
    //Select ejemplar
    $ejemplarreM = new Ejemplar();
    $ejemplarreM->getIdejemplar($_POST);
    $listaejemplarreM = $this->reservaDAO->ConsultarEjemplarRe($ejemplarreM);
    //Select usuario
    $usuarioreM = new usuario();
    $usuarioreM->getIdusuario($_POST);
    $listausuarioreM = $this->reservaDAO->ConsultarUsuarioRe($usuarioreM);
    //Select estado
    $estadoreM = new Estado();
    $estadoreM->getIdestado($_POST);
    $listaestadoreM = $this->reservaDAO->ConsultarEstadoRe($estadoreM);    
    include RUTA_PRINCIPAL . '/vistaAdministrador/modificarReserva.php';
  }
    //----consulta por id Docente---//
  function mostrarModificarReservaDoce() {
    $id = $_GET['idreserva'];
    $reserva = $this->reservaDAO->ConsultarId($id);
    //Select ejemplar
    $ejemplarreM = new Ejemplar();
    $ejemplarreM->getIdejemplar($_POST);
    $listaejemplarreM = $this->reservaDAO->ConsultarEjemplarRe($ejemplarreM);
    //Select usuario
    $usuarioreM = new usuario();
    $usuarioreM->getIdusuario($_POST);
    $listausuarioreM = $this->reservaDAO->ConsultarUsuarioRe($usuarioreM);
    //Select estado
    $estadoreM = new Estado();
    $estadoreM->getIdestado($_POST);
    $listaestadoreM = $this->reservaDAO->ConsultarEstadoRe($estadoreM);    
    include RUTA_PRINCIPAL . '/vistaAdministrador/modificarReservaDoce.php';
  }

  //---------modificacion --- Estudiante----//  
    function modificarReserva() {
    $id = $_GET['idreserva'];
    $ideje = $_POST['res_idejemplar'];
    $idusua = $_POST['res_idusuario'];
    $fechaini = $_POST['res_fechainicio'];
    $fechafin = $_POST['res_fechafin'];
    $idest = $_POST['res_idestado'];
    $res = new Reserva();
    $res->setIdreserva($id);
    $res->setIdejemplar($ideje);
    $res->setIdusuario($idusua);
    $res->setFechainicio($fechaini);
    $res->setFechafin($fechafin);
    $res->setIdestado($idest);
    $this->reservaDAO->ActualizarReserva(($res));
    //include_once RUTA_PRINCIPAL . '/vistaAdministrador/homeEstudiante.php';  
     print '<script languaje="JavaScript"> alert("La reserva se modifico con éxito."); </script>';
      header('Location:' . CONSULTAR_RESERVA_EST['url']);
  }
  //---------modificacion --- Docente----//  
    function modificarReservaDoce() {
    $id = $_GET['idreserva'];
    $ideje = $_POST['res_idejemplar'];
    $idusua = $_POST['res_idusuario'];
    $fechaini = $_POST['res_fechainicio'];
    $fechafin = $_POST['res_fechafin'];
    $idest = $_POST['res_idestado'];
    $res = new Reserva();
    $res->setIdreserva($id);
    $res->setIdejemplar($ideje);
    $res->setIdusuario($idusua);
    $res->setFechainicio($fechaini);
    $res->setFechafin($fechafin);
    $res->setIdestado($idest);
    $this->reservaDAO->ActualizarReserva(($res));
    //include_once RUTA_PRINCIPAL . '/vistaAdministrador/homeDocente.php';  
     print '<script languaje="JavaScript"> alert("La reserva se modifico con  éxito."); </script>';
      header('Location:' . CONSULTAR_RESERVA_DOCENTE['url']);
  }
  //cancelar reserva --Estudiante
  function cancelarReserva(){       
      $codestado = $_GET['idreserva'];
      $this->reservaDAO->CancelarReserva($codestado);           
    //include_once RUTA_PRINCIPAL . '/vistaAdministrador/homeEstudiante.php';  
       print '<script languaje="JavaScript"> alert("La reserva fue CANCELADA."); </script>';
      header('Location:' . CONSULTAR_RESERVA_EST['url']);
  }
   //cancelar reserva ---Docente
  function cancelarReservaDoce(){       
      $codestado = $_GET['idreserva'];
      $this->reservaDAO->CancelarReserva($codestado);           
   // include_once RUTA_PRINCIPAL . '/vistaAdministrador/homeDocente.php';  
       print '<script languaje="JavaScript"> alert("La reserva fue CANCELADA."); </script>';
      header('Location:' . CONSULTAR_RESERVA_DOCENTE['url']);
  }
  //----consulta datos de la reserva para el prestamo-  --Administrador--//
function mostrarDatosReserva() {
    $id = $_GET['idreserva'];
    $reserva = $this->reservaDAO->ConsultarDatosPrestamo($id);    
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
}
