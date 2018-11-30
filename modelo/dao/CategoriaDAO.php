<?php
namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Categoria;
use PDO;

/**
 * Description of CategoriaDAO
 *
 * @author JOHANA
 */
class CategoriaDAO extends GenericoDAO {
    public function __construct(&$cnn) {
        parent::__construct($cnn, 'dewey');
    }
    
      //cosultar categorias
    function ConsultarCategoria() {
        $sentencia = $this->cnn->prepare('SELECT * FROM dewey');
        $sentencia->execute();
        $resultadoCategoria = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoCategoria)) {
            return "Hola";
        }
        return $resultadoCategoria;
    }              
}
