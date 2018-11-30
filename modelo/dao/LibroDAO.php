<?php

namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Libro;
use PDO;

/**
 * Description of LibroDAO
 *
 * @author JOHANA
 */
class LibroDAO extends GenericoDAO {

//metodo de insertar en el generico dao
    public function __construct(&$cnn) {
        parent::__construct($cnn, 'libro');
    }

    function ConsultarLibro() {
        $sentencia = $this->cnn->prepare('
            select L.idlibro, CA.nombredewey,L.codigoisbn, L.titulolibro, A.nombresautor, ED.nombreeditorial, L.ubicacion, C.nombrecargo,ES.nombreestado, F.ruta
            from libro L
                    inner join autor A on L.idautor = A.idautor 
                    inner join editorial ED on L.ideditorial = ED.ideditorial                    
                    inner join cargo C on L.idcargo = C.idcargo
                    inner join dewey CA on L.iddewey = CA.iddewey
                    inner join estado ES on L.idestado = ES.idestado
                    inner join foto F on F.idlibro = L.idlibro'
        );
        $sentencia->execute();
        $resultadoLibro = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoLibro)) {
            return array();
        }
        return $resultadoLibro;
    } 
    //libros estudiante 
    function ConsultarLibroEstudiante() {
        $sentencia = $this->cnn->prepare('
            select L.idlibro, CA.nombredewey,L.codigoisbn, L.titulolibro, A.nombresautor, ED.nombreeditorial, L.ubicacion, C.nombrecargo,ES.nombreestado, F.ruta
            from libro L
                    inner join autor A on L.idautor = A.idautor 
                    inner join editorial ED on L.ideditorial = ED.ideditorial                    
                    inner join cargo C on L.idcargo = C.idcargo
                    inner join dewey CA on L.iddewey = CA.iddewey
                    inner join estado ES on L.idestado = ES.idestado
                    inner join foto F on F.idlibro = L.idlibro
                    WHERE ES.idestado = 5'
        );
        $sentencia->execute();
        $resultadoLibroEstudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoLibroEstudiante)) {
            return array();
        }
        return $resultadoLibroEstudiante;
    }  
    
      //libros Docente
    function ConsultarLibroDocente() {
        $sentencia = $this->cnn->prepare('
            select L.idlibro, CA.nombredewey,L.codigoisbn, L.titulolibro, A.nombresautor, ED.nombreeditorial, L.ubicacion, C.nombrecargo,ES.nombreestado, F.ruta
            from libro L
                    inner join autor A on L.idautor = A.idautor 
                    inner join editorial ED on L.ideditorial = ED.ideditorial                    
                    inner join cargo C on L.idcargo = C.idcargo
                    inner join dewey CA on L.iddewey = CA.iddewey
                    inner join estado ES on L.idestado = ES.idestado
                    inner join foto F on F.idlibro = L.idlibro
                    WHERE ES.idestado = 5'
        );
        $sentencia->execute();
        $resultadoLibroDocente = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultadoLibroDocente)) {
            return array();
        }
        return $resultadoLibroDocente;
    } 
    //consulta por id para a modificacion
    function ConsultarId($id) {
        $sentencia = $this->cnn->prepare('select idlibro,iddewey,codigoisbn,titulolibro,idautor, ideditorial,ubicacion, idcargo,idestado from libro where idlibro = ?');
        $sentencia->execute(array($id));
        $resultadoLibro = $sentencia->fetch(PDO::FETCH_OBJ);
        $libro = new Libro();
        $libro->setIdlibro($resultadoLibro->idlibro);
        $libro->setIddewey($resultadoLibro->iddewey);
        $libro->setCodigoisbn($resultadoLibro->codigoisbn);
        $libro->setTitulolibro($resultadoLibro->titulolibro);
        $libro->setIdautor($resultadoLibro->idautor);
//        $libro->setFoto($resultadoLibro->foto);
        $libro->setIdeditorial($resultadoLibro->ideditorial);
        $libro->setUbicacion($resultadoLibro->ubicacion);
        $libro->setIdcargo($resultadoLibro->idcargo);
        $libro->setIdestado($resultadoLibro->idestado);
        return $libro;
    }

    //actualizacion 
    function ActualizarLibro(Libro $lib) {
        $sentencia = $this->cnn->prepare('update libro set iddewey=?,codigoisbn=?,titulolibro=?,idautor=?,ideditorial=?,ubicacion=?,idcargo=?,idestado=? where idlibro =?');
        $sentencia->execute(array($lib->getIddewey(),$lib->getCodigoisbn(),$lib->getTitulolibro(),$lib->getIdautor(),$lib->getIdeditorial(), $lib->getUbicacion(),$lib->getIdcargo(),$lib->getIdestado(), $lib->getIdlibro()));
    }

    //consulta de dewey para insertar 
    function ConsultarCategoria2() {
        $sentencia = $this->cnn->prepare('SELECT * FROM dewey');
        $sentencia->execute();
        $resultadoCategoria2 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoCategoria2)) {
            return "Hola";
        }
        return $resultadoCategoria2;
    }
    //consulta de dewey para insertar 
    function ConsultarCategoria3() {
        $sentencia = $this->cnn->prepare('SELECT * FROM libro where iddewey=?');
        $sentencia->execute();
        $resultadoCategoria3 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoCategoria3)) {
            return "Hola";
        }
        return $resultadoCategoria3;
    }

    //consulta de autores
    function ConsultarAutorLibro() {
        $sentencia = $this->cnn->prepare('SELECT * FROM autor');
        $sentencia->execute();
        $resultadoAutor2 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoAutor2)) {
            return "Hola";
        }
        return $resultadoAutor2;
    }

    //consulta de editoriales
    function ConsultarEditorialesLibro() {
        $sentencia = $this->cnn->prepare('SELECT * FROM editorial');
        $sentencia->execute();
        $resultadoEditorial2 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoEditorial2)) {
            return "Hola";
        }
        return $resultadoEditorial2;
    }

    
    //consulta de cargo
    function ConsultarCargoLibro() {
        $sentencia = $this->cnn->prepare('SELECT * FROM cargo');
        $sentencia->execute();
        $resultadoCargo2 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoCargo2)) {
            return "Hola";
        }
        return $resultadoCargo2;
    }

    //consulta de estado
    function ConsultarEstadoLibro() {
        $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado = 5 OR idestado = 6 OR idestado = 7');
        $sentencia->execute();
        $resultadoEstado2 = $sentencia->fetchAll(\PDO::FETCH_OBJ);
        if (empty($resultadoEstado2)) {
            return "Hola";
        }
        return $resultadoEstado2;
    }
     // consulta de ejemplares segun el id del libro
  function ConsultarEjemplarEs($idlibro) {
    $sentencia = $this->cnn->prepare('
            select E.idejemplar, E.codigounico,L.idlibro, L.titulolibro, E.descripcion,L.iddewey,L.idautor,L.ideditorial from ejemplar E 
            inner join libro L on E.idlibro = L.idlibro 
            inner join estado ES on E.idestado = ES.idestado
                    WHERE E.idestado=6 AND L.idlibro=?'
    );
    $sentencia->execute(array($idlibro));
    $resultadoEjemplarEs = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $ejemplar = new Ejemplar();
    $ejemplar->setIdejemplar($resultadoEjemplarEs->idejemplar);
    $ejemplar->setCodigounico($resultadoEjemplarEs->codigounico);
    $ejemplar->setIdlibro($resultadoEjemplarEs->idlibro);
    $ejemplar->setIdestado($resultadoEjemplarEs->idestado);
    if (empty($resultadoEjemplarEs)) {
      return array();
    }
    return $resultadoEjemplarEs;
  }


}
