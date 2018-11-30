<?php

namespace control;

use control\generico\GenericoControl;
use Exception;
use modelo\dao\EjemplarDAO;
use modelo\vo\Estado;
use modelo\vo\Ejemplar;
use modelo\vo\Libro;
use modelo\vo\usuario;
use const RUTA_PRINCIPAL;

/**
 * Description of EjemplarControl
 *
 * @author JOHANA
 */
class EjemplarControl extends GenericoControl {

  private $ejemplarDAO;

  public function __construct(&$cnn) {
    parent::__construct($cnn);
    $this->ejemplarDAO = new EjemplarDAO($cnn);
  }
  //insertar --Administrador
  function registrarEjemplar() {
    $ejemplar = new Ejemplar();
    $ejemplar->convertir($_POST);
    $ejemplar = $this->ejemplarDAO->insertar($ejemplar);
    include RUTA_PRINCIPAL . '/vistaAdministrador/ejemplar.php';
    print '<script ' . 'languaje="JavaScript">alert("El ejemplar se inserto con éxito."); </script>';
  }
  //muestra el formlario de insertar ejemplar ---Administrador
  public function index() {
//select de libro
    $libroEjemplar = new Libro();
    $libroEjemplar->getIddewey($_POST);
    $listaLibroEjemplar = $this->ejemplarDAO->ConsultarLibroEjemplar($libroEjemplar);

//Select de estado ejemplar
    $estadoLibroEjemplar = new Estado();
    $estadoLibroEjemplar->getIdestado($_POST);
    $listaEstadoEjemplar = $this->ejemplarDAO->ConsultarEstadoEjemplar($estadoLibroEjemplar);
    include RUTA_PRINCIPAL . '/vistaAdministrador/ejemplar.php';
  }
//consulta de ejemplares --Administrador
  function consultarEjemplar() {
    $ejemplar = new Ejemplar();
    $ejemplar->getCampos($_POST);
    $listaEjemplar = $this->ejemplarDAO->ConsultarEjemplar($ejemplar);
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaEjemplar.php';
  }
    // consulta de ejemplares segun el id del libro estudiante
      function consultarEjemplarEs() {
    $idlibro = $_GET['idlibro'];  
    $listaEjemplarEs = $this->ejemplarDAO->ConsultarEjemplarEs($idlibro);      
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaEjemplarEstudiante.php';
  }
    // consulta de ejemplares segun el id del libro docente
      function consultarEjemplarDoc() {
    $idlibro = $_GET['idlibro'];  
    $listaEjemplarDoc = $this->ejemplarDAO->ConsultarEjemplarDoc($idlibro);      
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaEjemplarDocente.php';
  } 
   // consulta de ejemplares segun el id del libro administrador
      function consultarEjemplarAdm() {
    $idlibro = $_GET['idlibro'];  
    $listaEjemplarAdm = $this->ejemplarDAO->ConsultarEjemplarAdm($idlibro);      
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaEjemplarAdm.php';
  } 
  //consulta por id para modificar --Administrador
  function mostrarModificarEjemplar() {
    $id = $_GET['idejemplar'];
    $ejemplar = $this->ejemplarDAO->ConsultarId($id);
    //select de libro
    $libroEjemplar = new Libro();
    $libroEjemplar->getIddewey($_POST);
    $listaLibroEjemplar = $this->ejemplarDAO->ConsultarLibroEjemplar($libroEjemplar);

//Select de estado ejemplar
    $estadoLibroEjemplar = new Estado();
    $estadoLibroEjemplar->getIdestado($_POST);
    $listaEstadoEjemplar = $this->ejemplarDAO->ConsultarEstadoEjemplar($estadoLibroEjemplar);    
    include RUTA_PRINCIPAL . '/vistaAdministrador/modificarEjemplar.php';
  }

  //modificacion  --Administrador
  function modificarEjempplar() {
    $id = $_GET['idejemplar'];
    $codigounico = $_POST['eje_codigounico'];
    $idlibro = $_POST['eje_idlibro'];
    $fechaingreso = $_POST['eje_fechaingreso'];
    $idestado = $_POST['eje_idestado'];
    $descripcion = $_POST['eje_descripcion'];
    $ejemplar = new Ejemplar();
    $ejemplar->setIdejemplar($id);
    $ejemplar->setCodigounico($codigounico);
    $ejemplar->setIdlibro($idlibro);
    $ejemplar->setFechaingreso($fechaingreso);
    $ejemplar->setIdestado($idestado);
    $ejemplar->setDescripcion($descripcion);
    $this->ejemplarDAO->ActualizarEjemplar(($ejemplar));
   // include_once RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
   print '<script ' . 'languaje="JavaScript">alert("La Ejemplar se modifico con éxito."); </script>';
    header('Location:' . CONSULTAR_EJEMPLAR['url']);
  }
//consulta de datos del ejemplar para solicitar reserva --Estudiante
  function mostrarejemplarReserva() {
    $idejemplar = $_GET['idejemplar'];
    $datosEjemRes = $this->ejemplarDAO->ConsultarEjemRes($idejemplar); 
    //select de usuario
    $usuarioRe = new usuario();
    $usuarioRe->getIdusuario($_POST);
    $listaUsuarioRe = $this->ejemplarDAO->ConsultarUsuarioReEje($usuarioRe);
    
    //Select estado
    $estadoreDatos = new Estado();
    $estadoreDatos->getIdestado($_POST);
    $listaEstadoReEje = $this->ejemplarDAO->ConsultarEstadoReEjem($estadoreDatos);   
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/reservaEjemplar.php';
  }
  //consulta de datos del ejemplar para solicitar reserva ---Docente
      function mostrarejemplarReservaDoc() {
    $idejemplar = $_GET['idejemplar'];
    $datosEjemRes = $this->ejemplarDAO->ConsultarEjemRes($idejemplar); 
    //select de usuario
    $usuarioRe = new usuario();
    $usuarioRe->getIdusuario($_POST);
    $listaUsuarioRe = $this->ejemplarDAO->ConsultarUsuarioReEje($usuarioRe);
    
    //Select estado
    $estadoreDatos = new Estado();
    $estadoreDatos->getIdestado($_POST);
    $listaEstadoReEje = $this->ejemplarDAO->ConsultarEstadoReEjem($estadoreDatos);   
    include_once RUTA_PRINCIPAL . '/vistaAdministrador/reservaEjemplarDocente.php';
  }   
}
