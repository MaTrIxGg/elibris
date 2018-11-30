<?php

namespace control;

use control\generico\GenericoControl;
use Exception;
use modelo\dao\LibroDAO;
use modelo\dao\FotoDAO;
use modelo\dao\AutorDAO;
use modelo\dao\EjemplarDAO;
use modelo\dao\PrestamoDAO;
use modelo\dao\ReservaDAO;
use modelo\dao\UsuarioDAO;
use modelo\vo\Autor;
use modelo\vo\Editorial;
use modelo\vo\Cargo;
use modelo\vo\Estado;
use modelo\vo\Foto;
use modelo\vo\Libro;
use modelo\vo\Prestamo;
use modelo\vo\usuario;
use modelo\dao\InformeDAO;
use const RUTA_PRINCIPAL;
use const URL_PRINCIPAL;

/**
 * Description of LibroControl
 *
 * @author JOHANA
 */
class InformeControl extends GenericoControl {

    private $informeDAO;

    public function __construct(&$cnn) {
        parent::__construct($cnn);  
        $this->informeDAO = new InformeDAO($cnn);
    }

    public function index() {              
    }
    function Informe(){
      $informe = new Prestamo();
        $informe->getCampos($_POST);
        $listaInforme = $this->informeDAO->InformePrestamos($informe);
        
        $informe = new Prestamo();
        $informe->getCampos($_POST);
        $listaInformeD = $this->informeDAO->InformePrestamosD($informe);
        
        $informe = new Prestamo();
        $informe->getCampos($_POST);
        $listaInformeTo = $this->informeDAO->InformePrestamosTo($informe);
      include_once RUTA_PRINCIPAL . '/vistaAdministrador/informe.php';
    }    
    public function consultaPrestamoInforme(){
      $informeDAO = InformeDAO($this->cnn);
      $listar = $informeDAO->DatosInformePrestamo();      
    } 
     function informePrestamo() {
        $informe = new Prestamo();
        $informe->getCampos($_POST);
        $listaInforme = $this->informeDAO->InformePrestamos($informe);
        include RUTA_PRINCIPAL . '/vistaAdministrador/informe.php';
    } 
     public function pdf() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/prestamosGeneralesPDF.php';
    }
     public function liberias() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/Librerias.php';
    }
    //metodos para mostrar los diferentes reportes para el administrador 
    //ENERO
     public function RepEne() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/ENERO.php';
    }
    //febrero
    public function RepFeb() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/FEBRERO.php';
    }
    //MAZO
    public function RepMar() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/MARZO.php';
    }
    //ABRIL
    public function RepAbr() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/ABRIL.php';
    }
    //MAYO
    public function RepMay() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/MAYO.php';
    }
    //JUNIO
    public function RepJun() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/JUNIO.php';
    }
    //JULIO
    public function RepJul() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/JULIO.php';
    }
    //AGOSTO
    public function RepAgo() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/AGOSTO.php';
    }
    //SEPTIEMBRE
    public function RepSep() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/SEPTIEMBRE.php';
    }
     //OCTUBRE
    public function RepOct() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/OCTUBRE.php';
    }
     //NOVIEMBRE
    public function RepNov() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/NOVIEMBRE.php';
    }
      //DICIEMBRE
    public function RepDic() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/DICIEMBRE.php';
    }
    //DURANTE EL AÑO 
    public function RepDurAño() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/DURANTE-AÑO.php';
    }
    //PORCENTAJE DE PRESTAMOS POR EL ROL
    public function RepPorRol() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/PORCENTAJE_ROL.php';
    }
      //PRESTAMOS POR DOCENTES
    public function RepPreDoc() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/PRESTAMOS_DOCENTES.php';
    }
    //PRESTAMOS POR ESTUDIANTE
    public function RepPreEst() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/PRESTAMOS_ESTUDIANTES.php';
    }
    //CANTIDAD DE PRESTAMOS  REAIZADOS EN LA MISMA FECHA
    public function RepPreFec() {      
        include RUTA_PRINCIPAL . '/vistaAdministrador/index.php';
    } 

    
    

} 
