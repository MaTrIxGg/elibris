<?php

namespace control;

use control\generico\GenericoControl;
use Exception;
use modelo\dao\LibroDAO;
use modelo\dao\FotoDAO;
use modelo\vo\Categoria;
use modelo\vo\Autor;
use modelo\vo\Editorial;
use modelo\vo\Cargo;
use modelo\vo\Estado;
use modelo\vo\Foto;
use modelo\vo\Ejemplar;
use modelo\vo\Libro;
use const RUTA_PRINCIPAL;
use const URL_PRINCIPAL;

/**
 * Description of LibroControl
 *
 * @author JOHANA
 */
class LibroControl extends GenericoControl {

    private $libroDAO;

    public function __construct(&$cnn) {
        parent::__construct($cnn);  
        $this->libroDAO = new LibroDAO($cnn);
    }

    public function index() {
//select de categoria
        $categoria2 = new Categoria();
        $categoria2->getIddewey($_POST);
        $listaCategoria2 = $this->libroDAO->ConsultarCategoria2($categoria2);
//select de autores
        $autores2 = new Autor();
        $autores2->getIdautor($_POST);
        $listaAutor2 = $this->libroDAO->ConsultarAutorLibro($autores2);

//Select de editoriales
        $editoria2 = new Editorial();
        $editoria2->getIdeditorial($_POST);
        $listaEditorial2 = $this->libroDAO->ConsultarEditorialesLibro($editoria2);

//Select de cargo
        $cargo2 = new Cargo();
        $cargo2->getIdcargo($_POST);
        $listaCargo2 = $this->libroDAO->ConsultarCargoLibro($cargo2);

//Select de estado
        $estadoLibro = new Estado();
        $estadoLibro->getIdestado($_POST);
        $listaEstado2 = $this->libroDAO->ConsultarEstadoLibro($estadoLibro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/libro.php';
    }
    //insertar libro --Administrador
    public function registrarLibro(){
$libro = new  Libro($_POST);
            $listaFotos = $_FILES['fot_nombre'];
            $usuario = $_SESSION['usuario'];
           $id = $usuario->getIdusuario();   
            print_r($id);        
          for ($index = 0; $index < count($listaFotos); $index++) {
                if (!empty($listaFotos['tmp_name'][$index])) {
                    $foto[$index] = $id . '_' . rand(0, 200000) . '_' . $listaFotos['name'][$index];
                    move_uploaded_file($listaFotos['tmp_name'][$index], RUTA_PRINCIPAL . '/archivos/' . $foto[$index]);                    
                }
            }
          $libro->convertir($_POST);
            $idlibro = $this->libroDAO->insertar($libro);    
            $fotoDAO = new FotoDAO($this->cnn);
            for ($index = 0; $index < count($foto); $index++) {
                $objFoto = new Foto();
                $objFoto->setNombre($foto[$index]);
                $objFoto->setRuta($foto[$index]);
                $objFoto->setIdlibro($idlibro);              
                $fotoDAO->insertar($objFoto);                
            }                      
            print '<script languaje="JavaScript"> alert("Se insertó el libro con éxito"); </script>';
             header('Location:' . CONSULTAR_LIBRO['url']);
}
    //catalogo --Administrador
 function consultarLibroCatalogo() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaLibro = $this->libroDAO->ConsultarLibro($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/catalogo.php';
    } 
      //catalogo --sin sesion
     function consultarCatalogo() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaLibro = $this->libroDAO->ConsultarLibro($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/catalogoSesion.php';
    }
      //catalogo --Estudiante
       function CatalogoEstudiante() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaCatalogoEstudiante = $this->libroDAO->ConsultarLibro($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/catalogoEstudiante.php';
    }
   //consulta de libros --Administrador
    function consultarLibro() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaLibro = $this->libroDAO->ConsultarLibro($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/listaLibro.php';
    }
    //consulta de libro estudiante
    function consultarLibroEstudiante() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaLibroEstudiante = $this->libroDAO->ConsultarLibroEstudiante($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/listaLibroEstudiante.php';
    }
    //consulta de libro docente
     function consultarLibroDocente() {
        $libro = new Libro();
        $libro->getCampos($_POST);
        $listaLibroDocente = $this->libroDAO->ConsultarLibroDocente($libro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/listaLibroDocente.php';
    }
                           
    //consulta por id para modificar
    function mostrarModificarLibro() {
        $id = $_GET['idlibro'];
        $libro = $this->libroDAO->ConsultarId($id);
        
        //select de categoria
        $categoria2 = new Categoria();
        $categoria2->getIddewey($_POST);
        $listaCategoria2 = $this->libroDAO->ConsultarCategoria2($categoria2);
        
        //select de autores
        $autores2 = new Autor();
        $autores2->getIdautor($_POST);
        $listaAutor2 = $this->libroDAO->ConsultarAutorLibro($autores2);

//Select de editoriales
        $editoria2 = new Editorial();
        $editoria2->getIdeditorial($_POST);
        $listaEditorial2 = $this->libroDAO->ConsultarEditorialesLibro($editoria2);

//Select de cargo
        $cargo2 = new Cargo();
        $cargo2->getIdcargo($_POST);
        $listaCargo2 = $this->libroDAO->ConsultarCargoLibro($cargo2);

//Select de estado
        $estadoLibro = new Estado();
        $estadoLibro->getIdestado($_POST);
        $listaEstado2 = $this->libroDAO->ConsultarEstadoLibro($estadoLibro);
        include RUTA_PRINCIPAL . '/vistaAdministrador/modificarlibro.php';
        
    }

    //modificacion  administrador
    function modificarLibro() {
        $id = $_GET['idlibro'];
        $iddewey = $_POST['lib_iddewey'];
        $codigoisbn = $_POST['lib_codigoisbn'];
        $titulo = $_POST['lib_titulolibro'];
        $idautor = $_POST['lib_idautor'];        
        $ideditorial = $_POST['lib_ideditorial'];
        $ubicacion = $_POST['lib_ubicacion'];
        $idcargo = $_POST['lib_idcargo'];
        $idestado = $_POST['lib_idestado'];
        $lib = new Libro();
        $lib->setIdlibro($id);
        $lib->setIddewey($iddewey);
        $lib->setCodigoisbn($codigoisbn);
        $lib->setTitulolibro($titulo);
        $lib->setIdautor($idautor);
        $lib->setIdeditorial($ideditorial);
        $lib->setUbicacion($ubicacion);
        $lib->setIdcargo($idcargo);
        $lib->setIdestado($idestado);
        $this->libroDAO->ActualizarLibro(($lib));
      // include_once RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
       print '<script languaje="JavaScript"> alert("Los datos del Libro se modificaron con éxito."); </script>';
       header('Location:' . CONSULTAR_LIBRO['url']);
    }
    function Informe(){
      include_once RUTA_PRINCIPAL . '/vistaAdministrador/informe.php';
    }
    // consulta de ejemplares segun el id del libro
      function consultarEjemplarEs() {
    $idlibro = $_GET['idlibro'];     
    $ejemplar = new Ejemplar();    
    $listaEjemplarEs = $this->libroDAO->ConsultarEjemplarEs($ejemplar);
       $libro = $this->libroDAO->ConsultarId($id);    
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaEjemplarEstudiante.php';
  }

} 
