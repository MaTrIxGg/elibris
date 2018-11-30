<?php

namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Editorial;
use PDO;
/**
 * Description of AutorDAO
 *
 * @author JOHANA
 */
class EditorialDAO extends GenericoDAO {
//metodo de insertar en el generico dao
    public function __construct(&$cnn) {
        parent::__construct($cnn, 'editorial');
    }
    
        //cosultar editoriales
    function ConsultarEditorial() {
        $sentencia = $this->cnn->prepare('select * from editorial ');
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultado)) {
            return array();
        }
        return $resultado;                       
}
//cosultar editoriales estudiante
    function ConsultarEditorialEstudiante() {
        $sentencia = $this->cnn->prepare('select * from editorial ');
        $sentencia->execute();
        $resultadoEstudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoEstudiante)) {
            return array();
        }
        return $resultadoEstudiante;                       
}

 //cosultar editoriales existentes
    function ConsultarEditorialExistente() {
        $sentencia = $this->cnn->prepare('select * from editorial ');
        $sentencia->execute();
        $resultadoExistente = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoExistente)) {
            return array();
        }
        return $resultadoExistente;                       
}

 function ConsultarId($id) {
        $sentencia = $this->cnn->prepare('select ideditorial, nombreeditorial from editorial where ideditorial = ?');
        $sentencia->execute(array($id));
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        $editorial = new Editorial();
        $editorial->setIdeditorial($resultado->ideditorial);
        $editorial->setNombreeditorial($resultado->nombreeditorial);
        return $editorial;
    }
   
function ActualizarEditorial(Editorial $edi) {
        $sentencia = $this->cnn->prepare('update editorial set nombreeditorial =? where ideditorial =?');
        $sentencia->execute(array($edi->getNombreeditorial(), $edi->getIdeditorial()));
    
}
}

