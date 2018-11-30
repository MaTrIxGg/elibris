<?php

namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Ejemplar;
use PDO;

/**
 * Description of EjemplarDAO
 *
 * @author JOHANA
 */
class EjemplarDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'ejemplar');
  }

  function ConsultarEjemplar() {
    $sentencia = $this->cnn->prepare('
            select E.idejemplar, E.codigounico,L.idlibro, L.titulolibro, E.fechaingreso, ES.nombreestado, E.descripcion
            from ejemplar E
                    inner join libro L on E.idlibro = L.idlibro                     
                    inner join estado ES on E.idestado = ES.idestado'
    );
    $sentencia->execute();
    $resultadoEjemplar = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEjemplar)) {
      return array();
    }
    return $resultadoEjemplar;
  }

  //lista de ejemplares para el estudiante
  function ConsultarEjemplarEs($idlibro) {
    $sentencia = $this->cnn->prepare('
            select E.idejemplar, E.codigounico,L.idlibro, L.titulolibro, E.descripcion,L.iddewey,L.idautor,L.ideditorial from ejemplar E 
            inner join libro L on E.idlibro = L.idlibro 
            inner join estado ES on E.idestado = ES.idestado
                    WHERE E.idestado=5 AND L.idlibro=?'
    );
    $sentencia->execute(array($idlibro));
    $resultadoEjemplarEs = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarEs)) {
      return array();
    }
    return $resultadoEjemplarEs;
  }
    //lista de ejemplares para el docente
  function ConsultarEjemplarDoc($idlibro) {
    $sentencia = $this->cnn->prepare('
            select E.idejemplar, E.codigounico,L.idlibro, L.titulolibro, E.descripcion,L.iddewey,L.idautor,L.ideditorial from ejemplar E 
            inner join libro L on E.idlibro = L.idlibro 
            inner join estado ES on E.idestado = ES.idestado
                    WHERE E.idestado=5 AND L.idlibro=?'
    );
    $sentencia->execute(array($idlibro));
    $resultadoEjemplarDoc = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarDoc)) {
      return array();
    }
    return $resultadoEjemplarDoc;
  }
    //lista de ejemplares para el administrador
  function ConsultarEjemplarAdm($idlibro) {
    $sentencia = $this->cnn->prepare('
            select E.idejemplar, E.codigounico,L.idlibro, L.titulolibro,E.fechaingreso,E.idestado,ES.nombreestado, E.descripcion,L.iddewey,L.idautor,L.ideditorial from ejemplar E 
            inner join libro L on E.idlibro = L.idlibro 
            inner join estado ES on E.idestado = ES.idestado
                    WHERE L.idlibro=?'
    );
    $sentencia->execute(array($idlibro));
    $resultadoEjemplarAdm = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarAdm)) {
      return array();
    }
    return $resultadoEjemplarAdm;
  }
  //lista de ejemplares dispodinibles de cada libro para el estudiante
  function ConsultarEjempDisEs($idlibro) {
    $sentencia = $this->cnn->prepare('
            SELECT L.idlibro, E.codigounico,E.descripcion,E.idejemplar, L.titulolibro FROM ejemplar E 
            inner join libro L on E.idlibro = L.idlibro
            inner join estado ES on E.idestado = ES.idestado
WHERE L.idlibro= ? AND ES.idestado=5'
    );
    $sentencia->execute(array($idlibro));
    $resultadoEjemplar = $sentencia->fetchAll(PDO::FETCH_OBJ);    
    $ejemplar = new Ejemplar();
    $ejemplar->setIdejemplar($resultadoEjemplar->idejemplar);
    $ejemplar->setCodigounico($resultadoEjemplar->codigounico);
    $ejemplar->setIdlibro($resultadoEjemplar->idlibro);    
    $ejemplar->setIdestado($resultadoEjemplar->idestado);
    $ejemplar->setDescripcion($resultadoEjemplar->descripcion);    
    return $ejemplar;
  }

  //consulta de id del ejemplar para actualizar
  function ConsultarId($id) {
    $sentencia = $this->cnn->prepare('select idejemplar,codigounico,idlibro,fechaingreso, idestado,descripcion from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $resultadoEjemplar = $sentencia->fetch(PDO::FETCH_OBJ);
    $ejemplar = new Ejemplar();
    $ejemplar->setIdejemplar($resultadoEjemplar->idejemplar);
    $ejemplar->setCodigounico($resultadoEjemplar->codigounico);
    $ejemplar->setIdlibro($resultadoEjemplar->idlibro);
    $ejemplar->setFechaingreso($resultadoEjemplar->fechaingreso);
    $ejemplar->setIdestado($resultadoEjemplar->idestado);
    $ejemplar->setDescripcion($resultadoEjemplar->descripcion);
    return $ejemplar;
  }

  //actualizacion del ejemplar
  function ActualizarEjemplar(Ejemplar $ejemplar) {
    $sentencia = $this->cnn->prepare('update ejemplar set codigounico=?,idlibro=?,fechaingreso=?, idestado=?,descripcion=? where idejemplar =?');
    $sentencia->execute(array($ejemplar->getCodigounico(), $ejemplar->getIdlibro(), $ejemplar->getFechaingreso(), $ejemplar->getIdestado(), $ejemplar->getDescripcion(), $ejemplar->getIdejemplar()));
  }

  //consulta de libro
  function ConsultarLibroEjemplar() {
    $sentencia = $this->cnn->prepare('SELECT * FROM libro');
    $sentencia->execute();
    $resultadoLibroEje = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoLibroEje)) {
      return "Hola";
    }
    return $resultadoLibroEje;
  }

  //consulta de estado
  function ConsultarEstadoEjemplar() {
    $sentencia = $this->cnn->prepare('SELECT * FROM estado ');
    $sentencia->execute();
    $resultadoEstadoEje = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoEje)) {
     
    }
    return $resultadoEstadoEje;
  }

  //consulta de ejemplar existente en la BD
  function ConsultarEjemplarRe() {
    $sentencia = $this->cnn->prepare('SELECT * FROM ejemplar where idestado=5');
    $sentencia->execute();
    $resultadoEjemplarReEs = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarReEs)) {
      
    }
    return $resultadoEjemplarReEs;
  }

  //consulta de ejemplar existente en la BD
  function ConsultarEjemplarReserva() {
    $sentencia = $this->cnn->prepare('SELECT * FROM ejemplar WHERE idestado=5');
    $sentencia->execute();
    $resultadoEjemplarReserva = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarReserva)) {
      
    }
    return $resultadoEjemplarReserva;
  }

  function ConsultarEstadoRe() {
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado =3');
    $sentencia->execute();
    $resultadoEstadoRe = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoRe)) {
      
    }
    return $resultadoEstadoRe;
  }

  function ConsultarDatosReserva($id) {
    $sentencia = $this->cnn->prepare('select idejemplar,codigounico from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $resultadoDatos = $sentencia->fetch(PDO::FETCH_OBJ);
    $reservaDatos = new Ejemplar();
    $reservaDatos->setIdejemplar($resultadoDatos->idejemplar);
    $reservaDatos->setCodigounico($resultadoDatos->codigounico);
    return $reservaDatos;
  }
  
  
  
  
  function ConsultarEjemRes($idejemplar) {
       $sentencia = $this->cnn->prepare('
        SELECT codigounico,idejemplar
        FROM ejemplar      
WHERE idejemplar =?');         
    $sentencia->execute(array($idejemplar));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoReg = new Ejemplar();
    $prestamoReg->setIdejemplar($resultado->idejemplar);         
    return $resultado;
  }
//consulta de estado existente en la BD para la tabla de reserva
  function ConsultarEstadoReEjem() {   
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado =3');
    $sentencia->execute();
    $resultadoEstadoReEje = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoReEje)) {
    }
    return $resultadoEstadoReEje;
  }
  //consulta de usuario existente en la BD
  function ConsultarUsuarioReEje() {
    $sentencia = $this->cnn->prepare('SELECT * FROM usuario WHERE rol=2');
    $sentencia->execute();
    $resultadoUsuarioRe = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoUsuarioRe)) {      
    }
    return $resultadoUsuarioRe;
  }
}
