<?php

namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Prestamo;
use modelo\vo\Ejemplar;
use modelo\vo\usuario;
use modelo\vo\Devolucion;
use PDO;

/**
 * Description of PrestamoDAO
 *
 * @author JOHANA
 */
class PrestamoDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'prestamos');
  }
//consulta general de prestamos administrador
  function ConsultarPrestamo() {
    $sentencia = $this->cnn->prepare('
            select P.idprestamo,U.numerodocumento,E.codigounico, P.fechaprestamo,P.fechalimite, ES.nombreestado
            from prestamos P
                    inner join ejemplar E on P.idejemplar = E.idejemplar                     
                    inner join estado ES on P.idestado = ES.idestado
                    inner join usuario U on P.idusuario = U.idusuario'
    );
    $sentencia->execute();
    $resultadoPrestamo2 = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoPrestamo2)) {
      return array();
    }
    return $resultadoPrestamo2;
  }

//metodo de la consulta por id para realizar la modificacion
  function ConsultarId($id) {
    $sentencia = $this->cnn->prepare('select idprestamo,idejemplar,idusuario,fechaprestamo,fechalimite, idestado from prestamos where idprestamo = ?');
    $sentencia->execute(array($id));
    $resultadoPrestamo = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamo = new Prestamo();
    $prestamo->setIdprestamo($resultadoPrestamo->idprestamo);
    $prestamo->setIdejemplar($resultadoPrestamo->idejemplar);
    $prestamo->setIdusuario($resultadoPrestamo->idusuario);
    $prestamo->setFechaprestamo($resultadoPrestamo->fechaprestamo);
    $prestamo->setFechalimite($resultadoPrestamo->fechalimite);
    $prestamo->setIdestado($resultadoPrestamo->idestado);
    return $prestamo;
  }

  //cambiar el estado del ejemplar al insertar prestamo 
  function ConsultarIdEjemplarCambio($id) {
    $sentencia = $this->cnn->prepare('select idestado from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $resultadoEjemplarCambiar = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoCambio = new Ejemplar();
    $prestamoCambio->setIdestado($resultadoEjemplarCambiar->idestado);
    return $prestamoCambio;
  }  
    //cambiar el estado de reserva al insertar prestamo 
  function ConsultarResCamb($id) {
    $sentencia = $this->cnn->prepare('select idestado from reserva where idreserva = ?');
    $sentencia->execute(array($id));
    $resultadoResCambiar = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoCambio = new \modelo\vo\Reserva();
    $prestamoCambio->setIdestado($resultadoResCambiar->idestado);
    return $prestamoCambio;
  } 

  //actualizar prestamo
  function ActualizarPrestamo(Prestamo $prestamo) {
    $sentencia = $this->cnn->prepare('update prestamos set idejemplar= ?,idusuario= ?,fechaprestamo= ?,fechalimite= ?, idestado= ? where idprestamo = ?');
    $sentencia->execute(array($prestamo->getIdejemplar(), $prestamo->getIdusuario(), $prestamo->getFechaprestamo(), $prestamo->getFechalimite(), $prestamo->getIdestado(), $prestamo->getIdprestamo()));
  }

  //consulta de ejemplar en insertar prestamo
  function ConsultarEjemplarPres() {
    $sentencia = $this->cnn->prepare('SELECT * FROM ejemplar WHERE idestado=5');
    $sentencia->execute();
    $resultadoEjemplarpre = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEjemplarpre)) {
      
    }
    return $resultadoEjemplarpre;
  }
  

  //consulta de usuario en insertar prestamo
  function ConsultarUsuarioPres() {
    $sentencia = $this->cnn->prepare('SELECT * FROM usuario U WHERE U.rol = 2 OR U.rol=3 ');
    $sentencia->execute();
    $resultadoUsuariopre = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoUsuariopre)) {
      
    }
    return $resultadoUsuariopre;
  }

  //consulta de estado
  function ConsultarEstadoPres() {
    //   $sentencia = $this->cnn->prepare("SELECT * FROM estado WHERE tabla = 'Préstamo'");
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado =8');
    $sentencia->execute();
    $resultadoEstadopre = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadopre)) {
      
    }
    return $resultadoEstadopre;
  }

  //actualizacion  el estado de ejemplar al insertar prestamo
  function ActualizarEstadoEjem($ejemplar) {
    $sentencia = $this->cnn->prepare('update ejemplar set idestado= 6 where idejemplar=?');
    $sentencia->execute(array($ejemplar));
  }
  //actualizacion  el estado de la reserva al insertar prestamo
  function ActualizarEstadoRes($reserva) {
    $sentencia = $this->cnn->prepare('update reserva set idestado= 4 where idreserva=?');
    $sentencia->execute(array($reserva));
  }
  //consulta de estado de la reserva
  function ConsultarEstadoReserva() {
    //   $sentencia = $this->cnn->prepare("SELECT * FROM estado WHERE tabla = 'Préstamo'");
    $sentencia = $this->cnn->prepare('SELECT * FROM estado WHERE idestado=3');
    $sentencia->execute();
    $resultadoEstadoRes = $sentencia->fetchAll(\PDO::FETCH_OBJ);
    if (empty($resultadoEstadoRes)) {
      
    }
    return $resultadoEstadoRes;
  }

//actualizacion  el estado de reserva al insertar prestamo
  function ActualizarEstadoReserva($reserva) {
    $sentencia = $this->cnn->prepare('update reserva set idestado= 4 where idreserva=?');
    $sentencia->execute(array($reserva));
  }
  //consulta de prestamos segun el id del usuario ---ESTUDIANTE
  function ConsultarPrestamosEstudiante($idusuario) {
    $a=$idusuario->getIdusuario();
    $sentencia = $this->cnn->prepare('select P.idprestamo,U.numerodocumento,E.codigounico, P.fechaprestamo,P.fechalimite, ES.nombreestado
            from prestamos P
                    inner join ejemplar E on P.idejemplar = E.idejemplar                     
                    inner join estado ES on P.idestado = ES.idestado
                    inner join usuario U on P.idusuario = U.idusuario where numerodocumento=:documento ');
  
    $sentencia->bindParam(":documento",$a );
    $sentencia->execute();
    $resultadoPreEst = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoPreEst)) {     
    }    
    return $resultadoPreEst;
  }  
   //consulta de prestamos segun el id del usuario ---Docente
  function ConsultarPrestamosDocente($idusuario) {
    $a=$idusuario->getIdusuario();
    $sentencia = $this->cnn->prepare('select P.idprestamo,U.numerodocumento,E.codigounico, P.fechaprestamo,P.fechalimite, ES.nombreestado
            from prestamos P
                    inner join ejemplar E on P.idejemplar = E.idejemplar                     
                    inner join estado ES on P.idestado = ES.idestado
                    inner join usuario U on P.idusuario = U.idusuario where numerodocumento=:documento ');
  
    $sentencia->bindParam(":documento",$a );
    $sentencia->execute();
    $resultadoPreDoc = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoPreDoc)) {     
    }    
    return $resultadoPreDoc;
  } 
  //consulta para generar informe de cuantos prestamos segun el rol y el porcentaje
  function InformePrestamos() {
$sentencia = $this->cnn->prepare('
            select U.rol As tipousuario, 
COUNT(P.idusuario) AS numeroPrestamos,
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos  WHERE U.rol=Docente OR U.rol =Estudiante OR U.rol=Administrador) AS porcentaje
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE U.rol=Docente OR U.rol =Estudiante OR U.rol=Administrador  
GROUP BY U.rol');
    $sentencia->execute();
    $resultadoPrestamo = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoPrestamo)) {
      return array();
    }
    return $resultadoPrestamo;
  }
    //consulta por id del prestamo para realizar la devolucion 
  function ConsultarPrestamoReg($idprestamo) {
       $sentencia = $this->cnn->prepare('
        SELECT P.idprestamo,E.idlibro, E.codigounico,P.fechaprestamo, P.idejemplar,P.idusuario, U.numerodocumento
        FROM prestamos P
        INNER JOIN ejemplar E ON P.idejemplar = E.idejemplar       
INNER JOIN usuario U ON P.idusuario = U.idusuario       
WHERE P.idprestamo =?');         
    $sentencia->execute(array($idprestamo));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoReg = new Prestamo();
    $prestamoReg->setIdprestamo($resultado->idprestamo);
    $prestamoReg->setIdusuario($resultado->idusuario);
    $prestamoReg->setIdejemplar($resultado->idejemplar);
    $prestamoReg->setFechaprestamo($resultado->fechaprestamo);    
    return $resultado;
  }

}
