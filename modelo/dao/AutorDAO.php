<?php

namespace modelo\dao;
use modelo\generico\GenericoDAO;
use modelo\vo\Autor;
use PDO;

/**
 * Description of AutorDAO
 *
 * @author JOHANA
 */
class AutorDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'autor');
  }

  //cosultar de todos los autores
  function ConsultarAutor() {
    $sentencia = $this->cnn->prepare('select idautor , initcap(nombresautor) AS nombresautor, initcap(apellidosautor) AS apellidosautor from autor ');
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultado)) {
      return array();
    }
    return $resultado;
  }
    function ConsultarAutorEstudiante() {
    $sentencia = $this->cnn->prepare('select idautor , initcap(nombresautor) AS nombresautor, initcap(apellidosautor) AS apellidosautor from autor ');
    $sentencia->execute();
    $resultadoEstudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEstudiante)) {
      return array();
    }
    return $resultadoEstudiante;
  }

  //consulta por id
  function ConsultarId($id) {
       $sentencia = $this->cnn->prepare('select idautor , initcap(nombresautor) AS nombresautor, apellidosautor from autor where idautor = ?');      
   // $sentencia = $this->cnn->prepare('select idautor ,nombresautor, apellidosautor from autor where idautor = ?');
    $sentencia->execute(array($id));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $autor = new Autor();
    $autor->setIdautor($resultado->idautor);
    $autor->setNombresautor($resultado->nombresautor);
    $autor->setApellidosautor($resultado->apellidosautor);

    return $autor;
  }

  //consulta por nombre
  function ConsultarAutorNombre($nombre) {
    $sentencia = $this->cnn->prepare('select idautor, nombresautor, apellidosautor from autor where nombreautor = ?');
    $sentencia->execute(array($nombre));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $autor = new Autor();
    $autor->setIdautor($resultado->idautor);
    $autor->setNombresautor($resultado->nombresautor);
    $autor->setApellidosautor($resultado->apellidosautor);
    return $autor;
  }

  //consulta por apellido
  function ConsultarAutorApellido($apellido) {
    $sentencia = $this->cnn->prepare('select idautor, nombresautor, apellidosautor from autor where apellidosautor = ?');
    $sentencia->execute(array($apellido));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $autor = new Autor();
    $autor->setIdautor($resultado->idautor);
    $autor->setNombresautor($resultado->nombresautor);
    $autor->setApellidosautor($resultado->apellidosautor);
    return $autor;
  }

  //actualizacion 
  function ActualizarAutor(Autor $aut) {
    $sentencia = $this->cnn->prepare('update autor set nombresautor =?, apellidosautor = ? where idautor =?');
    $sentencia->execute(array($aut->getNombresautor(), $aut->getApellidosautor(), $aut->getIdautor()));
  }

}
