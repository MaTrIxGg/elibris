<?php

namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\Prestamo;
use PDO;

/**
 * Description of LibroDAO
 *
 * @author JOHANA
 */
class InformeDAO extends GenericoDAO {

//metodo de insertar en el generico dao
  public function __construct(&$cnn) {
    parent::__construct($cnn, 'prestamos');
  }

  function InformePrestamos() {
    $sentencia = $this->cnn->prepare('select U.rol As tipousuario, 
COUNT(P.idusuario) AS numeroPrestamos,
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE  U.rol =2  ) AS porcentaje
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE  U.rol =2
GROUP BY U.rol');
    $sentencia->execute();
    $informePrestamoP = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($informePrestamoP)) {
      return array();
    }
    return $informePrestamoP;
  }  
  
      function InformePrestamosD() {
    $sentencia = $this->cnn->prepare('select U.rol As tipousuario, 
COUNT(P.idusuario) AS numeroPrestamos,
(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE  U.rol =3  ) AS porcentaje
from prestamos P 
inner join usuario U 
on P.idusuario = U.idusuario 
WHERE  U.rol =3 
GROUP BY U.rol');
    $sentencia->execute();
    $informePrestamoD = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($informePrestamoD)) {
      return array();
    }
    return $informePrestamoD;
  }
        function InformePrestamosTo() {
    $sentencia = $this->cnn->prepare('SELECT COUNT(idprestamo) AS Total FROM prestamos');
    $sentencia->execute();
    $informePrestamoT = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if (empty($informePrestamoT)) {
      return array();
    }
    return $informePrestamoT;
  }
  
  
//  select U.rol As tipousuario, 
//COUNT(P.idusuario) AS numeroPrestamos,
//(SELECT COUNT(U.idusuario) * 100 / COUNT(P.idprestamo) FROM prestamos p WHERE U.rol='Docente' OR U.rol ='Estudiante' OR U.rol='Administrador') AS porcentaje
//from prestamos P 
//inner join usuario U 
//on P.idusuario = U.idusuario 
//WHERE U.rol='Docente' OR U.rol ='Estudiante' OR U.rol='Administrador'  
//GROUP BY U.rol

}
