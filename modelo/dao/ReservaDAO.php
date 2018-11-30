<?php

namespace modelo\dao;
use modelo\generico\GenericoDAO;
use modelo\vo\Reserva;
use modelo\vo\Ejemplar;
use modelo\vo\Estado;
use PDO;

/**
 * Description of ReservaDAO
 *
 * @author JOHANA
 */
class ReservaDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'reserva');
  }

  //consulta general
  function ConsultarReserva() {
    $sentencia = $this->cnn->prepare('
            select U.numerodocumento,E.codigounico,R.fechainicio,R.fechafin, ES.nombreestado, R.idreserva
            from reserva R
                    inner join ejemplar E on R.idejemplar = E.idejemplar                     
                    inner join estado ES on R.idestado = ES.idestado
                    inner join usuario U on R.idusuario = U.idusuario
                    WHERE ES.idestado=3'
    );
    $sentencia->execute();
    $resultadoReserva = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoReserva)) {
      return array();
    }
  return $resultadoReserva;
  }
    //lista de reservas de Estudinate
  function ConsultarReservaEst($idusuario) {
    $a=$idusuario->getIdusuario();
    $sentencia = $this->cnn->prepare('
            select U.numerodocumento,E.codigounico,R.fechainicio,R.fechafin, ES.nombreestado, R.idreserva
            from reserva R
                    inner join ejemplar E on R.idejemplar = E.idejemplar                     
                    inner join estado ES on R.idestado = ES.idestado
                    inner join usuario U on R.idusuario = U.idusuario where numerodocumento=:documento'
    );
     $sentencia->bindParam(":documento",$a );
    $sentencia->execute();
    $resultadoReservaEst = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoReservaEst)) {
      return array();
    }
  return $resultadoReservaEst;
  }
  //lista de reservas de Docente
    function ConsultarReservaDoce($idusuario) {
      $a=$idusuario->getIdusuario();
    $sentencia = $this->cnn->prepare('
            select U.numerodocumento,E.codigounico,R.fechainicio,R.fechafin, ES.nombreestado, R.idreserva
            from reserva R
                    inner join ejemplar E on R.idejemplar = E.idejemplar                     
                    inner join estado ES on R.idestado = ES.idestado
                    inner join usuario U on R.idusuario = U.idusuario where numerodocumento=:documento'
    );
     $sentencia->bindParam(":documento",$a );
    $sentencia->execute();
    $resultadoReservaDoce = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoReservaDoce)) {
      return array();
    }
  return $resultadoReservaDoce;
  }
  
  
  
  
  
  
  
//consulta por id para la modificacion de datos
  function ConsultarId($id) {
    $sentencia = $this->cnn->prepare('select idreserva,idejemplar,idusuario,fechainicio,fechafin, idestado from reserva where idreserva = ?');
    $sentencia->execute(array($id));
    $resultadoReserva = $sentencia->fetch(PDO::FETCH_OBJ);
    $reserva = new Reserva();
    $reserva->setIdreserva($resultadoReserva->idreserva);
    $reserva->setIdejemplar($resultadoReserva->idejemplar);
    $reserva->setIdusuario($resultadoReserva->idusuario);
    $reserva->setFechainicio($resultadoReserva->fechainicio);
    $reserva->setFechafin($resultadoReserva->fechafin);
    $reserva->setIdestado($resultadoReserva->idestado);
    return $reserva;
  }  
  //actualizacion de los datos de la reserva
  function ActualizarReserva(Reserva $reserva) {
    $sentencia = $this->cnn->prepare('update reserva set idejemplar= ?,idusuario= ?,fechainicio= ?,fechafin= ?, idestado= ? where idreserva = ?');
    $sentencia->execute(array($reserva->getIdejemplar(), $reserva->getIdusuario(), $reserva->getFechainicio(), $reserva->getFechafin(), $reserva->getIdestado(), $reserva->getIdreserva()));
  }
  //actualizacion el estado de la reserva
  function CancelarReserva($reserva) {
    $sentencia = $this->cnn->prepare('update reserva set idestado= 4 where idreserva=?');
    $sentencia->execute(array($reserva));
  }
  //cambiar el estado del ejemplar al registrar reserva
  function ConsultaCancelar($id) {
    $sentencia = $this->cnn->prepare('select idestado from reserva where idreserva = ?');
    $sentencia->execute(array($id));
    $reservaCancelada = $sentencia->fetch(PDO::FETCH_OBJ);
    $reservaCambio = new Reserva();    
    $reservaCambio->setIdestado($reservaCancelada->idestado);
    return $reservaCambio;
  }
    
  //consulta de ejemplar existente en la BD
  function ConsultarEjemplarRe() {
    $sentencia = $this->cnn->prepare('SELECT * FROM ejemplar WHERE  idestado=3');
    $sentencia->execute();
    $resultadoEjemplarRe = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarRe)) {      
    }
    return $resultadoEjemplarRe;
  }

  //consulta de usuario existente en la BD
  function ConsultarUsuarioRe() {
    $sentencia = $this->cnn->prepare('SELECT * FROM usuario WHERE rol=2');
    $sentencia->execute();
    $resultadoUsuarioRe = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoUsuarioRe)) {      
    }
    return $resultadoUsuarioRe;
  }

  //consulta de estado existente en la BD para la tabla de reserva
  function ConsultarEstadoRe() {   
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado =8');
    $sentencia->execute();
    $resultadoEstadoRe = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoRe)) {
    }
    return $resultadoEstadoRe;
  }  
  //consulta de estado existente en la BD para la tabla de reserva
  function ConsultarEstadoReserva() {   
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado =3');
    $sentencia->execute();
    $resultadoEstadoRes = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoRes)) {
    }
    return $resultadoEstadoRes;
  }  
//cambiar el estado del ejemplar al registrar reserva
  function ConsultaEjemCambio($id) {
    $sentencia = $this->cnn->prepare('select idestado from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $reservaEjemplarCambio = $sentencia->fetch(PDO::FETCH_OBJ);
    $reservaCambio = new Ejemplar();    
    $reservaCambio->setIdestado($reservaEjemplarCambio->idestado);
    return $reservaCambio;
  }
  //actualizacion  el estado de ejemplar para reserva
  function ActualizarEstadoEjemReserva($reserva) {
    $sentencia = $this->cnn->prepare('update ejemplar set idestado= 3 where idejemplar=?');
    $sentencia->execute(array($reserva));
  }
  //consulta por id para recuperar los valores para el ejemplar
   function ConsultarDatosPrestamo($id) {
    $sentencia = $this->cnn->prepare('select idreserva,idejemplar,idusuario from reserva where idreserva = ?');
    $sentencia->execute(array($id));
    $resultadoDatos = $sentencia->fetch(PDO::FETCH_OBJ);
    $reservaDatos = new Reserva();    
    $reservaDatos->setIdreserva($resultadoDatos->idreserva);
    $reservaDatos->setIdejemplar($resultadoDatos->idejemplar);
    $reservaDatos->setIdusuario($resultadoDatos->idusuario);     
    return $reservaDatos;
  }
  function ConsultarDatosReservaEjemplar($id) {
    $sentencia = $this->cnn->prepare('select idejemplar from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $resultadoEjemReser = $sentencia->fetch(PDO::FETCH_OBJ);
    $reservaEjemplar = new Reserva();    
    $reservaEjemplar->setIdejemplar($resultadoEjemReser->idejemplar);   
    return $reservaEjemplar;
  }
  
  
}
