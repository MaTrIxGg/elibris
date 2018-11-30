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
class DevolucionDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'devolucion');
  }

  //consulta por id del prestamo para realizar la devolucion 
  function ConsultarPrestamoReg($idprestamo) {
       $sentencia = $this->cnn->prepare('
        SELECT P.idprestamo,E.idlibro, E.codigounico,P.fechaprestamo
        FROM prestamos P
        INNER JOIN ejemplar E ON P.idejemplar = E.idejemplar
        WHERE P.idprestamo =?');         
    $sentencia->execute(array($idprestamo));
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoReg = new Prestamo();
    $prestamoReg->setIdprestamo($resultado->idprestamo);
    $prestamoReg->setIdejemplar($resultado->idejemplar);
    $prestamoReg->setFechaprestamo($resultado->fechaprestamo);
    return $prestamoReg;
  }
   //cambiar el estado del prestamo al insertar devolucion
  function ConsPresCambioEst($id) {
    $sentencia = $this->cnn->prepare('select idestado from prestamos where idprestamo = ?');
    $sentencia->execute(array($id));
    $resultadoEjemplarCambiar = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoCambio = new Ejemplar();
    $prestamoCambio->setIdestado($resultadoEjemplarCambiar->idestado);
    return $prestamoCambio;
  }
    //actualizacion  el estado de prestamo al insertar devolucion
  function ActualizarEstPre($prestamoEst) {
    $sentencia = $this->cnn->prepare('update prestamos set idestado= 9 where idprestamo=?');
    $sentencia->execute(array($prestamoEst));
  }
     //cambiar el estado del ejemplar al insertar devolucion
  function ConsEjemCambioEst($id) {
    $sentencia = $this->cnn->prepare('select idestado from ejemplar where idejemplar = ?');
    $sentencia->execute(array($id));
    $resultadoEjemplarCambiar = $sentencia->fetch(PDO::FETCH_OBJ);
    $prestamoCambio = new Ejemplar();
    $prestamoCambio->setIdestado($resultadoEjemplarCambiar->idestado);
    return $prestamoCambio;
  }
    //actualizacion  el estado de  ejemplar al insertar devolucion
  function ActualizarEstEjem($devEje) {
   $sentencia = $this->cnn->prepare('update ejemplar set idestado= 5 where idejemplar=?');
    $sentencia->execute(array($devEje));
  }
//consulta de las devoluciones pendientes
  function ConsultarDevolucion() {
    $sentencia = $this->cnn->prepare('
            select P.idprestamo,U.numerodocumento,E.codigounico, P.fechaprestamo,P.fechalimite, ES.nombreestado
            from prestamos P
                    inner join ejemplar E on P.idejemplar = E.idejemplar                     
                    inner join estado ES on P.idestado = ES.idestado
                    inner join usuario U on P.idusuario = U.idusuario
                    WHERE P.idestado=8'
    );
    $sentencia->execute();
    $resultadoDev = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($resultadoDev)) {
      return array();
    }
    return $resultadoDev;
  }
  
}
