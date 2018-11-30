<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\CategoriaDAO;
use modelo\vo\Categoria;
use const RUTA_PRINCIPAL;
use const URL_PRINCIPAL;

/**
 * Description of CategoriaControl
 *
 * @author JOHANA
 */
class CategoriaControl extends GenericoControl {

    private $categoriaDAO;

    public function __construct(&$cnn) {
        parent::__construct($cnn);
        $this->categoriaDAO = new CategoriaDAO($cnn);
    }
   //cosnulta todas las categorias 
    public function consultarCategorias() {
        $categoria = new Categoria();
//        $categoria->getCampos($_POST);
//        $categoria->getIddewey($_POST);  
        $categoria->getNombredewey($_POST);      
        $listaCategoria = $this->categoriaDAO->ConsultarCategoria($categoria);
        include_once RUTA_PRINCIPAL . '/vistaAdministrador/listaCategoria.php';
    }           
}
