<?php 
namespace modelo\dao;

use modelo\generico\GenericoDAO;
use modelo\vo\usuario;
use PDO;

class UsuarioDAO extends GenericoDAO {
//metodo de insertar en el generico dao
    public function __construct(&$cnn) {
        parent::__construct($cnn, 'usuario');
    }
//validacion de sesion usuarios
    public function autenticar($numerodocumento, $clave) {
        $sentencia = $this->cnn->prepare("select * from usuario where numerodocumento = "
                . ":numerodocumento AND clave = :clave AND idestado = '1'");
        $sentencia->execute(array('numerodocumento' => $numerodocumento, 'clave' => $clave));
        $resultado = $sentencia->fetchAll();
        if (empty($resultado)) { 
          return NULL;
        }
        $registro = $resultado[0];
        $usuario = new usuario();
        $usuario->convertir($registro, false);
        return $usuario;
    }
//consulta de usuarios
    function Consultar() {
        $sentencia = $this->cnn->prepare('select idusuario,numerodocumento, nombresusuario, apellidosusuario,correo,telefono, rol, idestado from usuario');
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultado)) {
            return null;
        }
        return $resultado;
    }
    
//consulta por id de usuario
    function ConsultarId($id) {
        $sentencia = $this->cnn->prepare('select idusuario, nombresusuario, apellidosusario, rol, estado '
                . 'from usuario where idusuario = ?');
        $sentencia->execute(array($id));
        $resultado = $sentencia->fetch(PDO::FETCH_OBJ);
        $usuario = new usuario();
        $usuario->setIdusuario($resultado->idusuario);
        $usuario->setNombresusuario($resultado->nombresusuario);
        $usuario->setApellidosusuario($resultado->apellidosusuario);
        $usuario->setCedula($resultado->cedula);
        $usuario->setRol($resultado->rol);
        $usuario->setEstado($resultado->estado);

        return $usuario;
    }
//actualizacion de usuario por el id
    function ActualizarId(usuario $usu) {
        $sentencia = $this->cnn->prepare('update usuario set clave = md5(?) where idusuario = ?');
        $sentencia->execute(array($usu->getClave(), $usu->getIdusuario()));
//      $sentencia->fetch();
    }
//actualizacion de rol 
    function ActualizarRol(usuario $usu) {
        $sentencia = $this->cnn->prepare('update usuario set rol =?, idestado = ? where idusuario =?');
        $sentencia->execute(array($usu->getRol(), $usu->getIdestado(), $usu->getIdusuario()));
    }
    //validacion de correo
//    public function validarCorreo($correo) {
//        $sql = "SELECT * FROM usuario WHERE correo=:usu_correo";
//        $sentencia = $this->cnn->prepare($sql);
//        $sentencia->execute(['usu_correo' => $correo]);
//        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
//        if (empty($resultado)) {
//            throw new ValidacionExcepcion('El correo electronico ingresado no pertenece a ningun usuario.', -1);
//        }
//        return $resultado[0];
//    }
//    //eliminar el codigo de verificacion anterior
//     public function eliminarVerificacionesPasadas($correo) {
//        $sql = "DELETE FROM recuperar WHERE idusuario = (SELECT idusuario FROM usuario WHERE correo=:usu_correo)";
//        $sentencia = $this->cnn->prepare($sql);
//        $sentencia->execute(['usu_correo' => $correo]);
//        return;
//    }
//// Envio de correo
//    public function enviarCorreoRec(Recuperar $recuperar, $correo) {
//        $sql = "INSERT INTO recuperar (idrecuperar,codigoidusuario)
//               VALUES(:idrecuperar,(SELECT idusuario FROM usuario WHERE correo=:usu_correo),:codigo)";
//        $sentencia = $this->cnn->prepare($sql);
//        $sentencia->execute([
//            'idrecuperar' => $recuperar->getIdrecuperar(),
//            'codigo' => $recuperar->getCodigo(),           
//            'usu_correo' => $correo
//        ]);
//        return $this->cnn->lastInsertId();
//    }
////    //Metodo de actualizar la clave 
//    public function actualizarClaveRec($codigoVer, $clave) {
//        $sql = "UPDATE usuario SET clave=:usu_clave WHERE idusuario=(SELECT idusuario FROM recuperar WHERE codigo=:codigoVer)";
//        $sentencia = $this->cnn->prepare($sql);
//        $sentencia->execute([
//            'clave' => $clave,
//            'codigoVer' => $codigoVer
//        ]);
//        return $this->cnn->lastInsertId();
//    }
    
    public function validarCorreo($correo) {
        $sql = "SELECT * FROM usuario WHERE correo=:correo";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute(['correo' => $correo]);
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        if (empty($resultado)) {
            throw new ValidacionExcepcion('El correo electronico ingresado no pertenece a ningun usuario.', -1);
        }
        return $resultado[0];
    }
     public function enviarCorreoRec($recuperar, $correo) {
        $sql = "INSERT INTO recuperar (idrecuperar,idusuario,codigo)
               VALUES(:idrecuperar,(SELECT idusuario FROM usuario WHERE correo=:correo),:codigo)";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'idrecuperar' => $recuperar->getId_recuperar(),
            'codigo' => $recuperar->getCodigo(),
            'correo' => $correo
        ]);
        return $this->cnn->lastInsertId();
    }

    public function eliminarVerificacionesPasadas($correo) {
        $sql = "DELETE FROM recuperar WHERE idusuario = (SELECT idusuario FROM usuario WHERE correo=:correo)";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute(['correo' => $correo]);
        return;
    }

//    public function actualizarClaveRec($codigoVer, $clave) {
//        $sql = "UPDATE usuario SET clave=:clave WHERE idusuario=(SELECT idusuario FROM recuperar WHERE codigo=:codigoVer)";
//        $sentencia = $this->cnn->prepare($sql);
//        $sentencia->execute([
//            'clave' => $clave,
//            'codigoVer' => $codigoVer
//        ]);
//        return $this->cnn->lastInsertId();
//    }
     public function actualizarClaveRec($codigoVer, $clave) {
        $sql = "UPDATE usuario SET clave=:usu_clave WHERE idusuario=(SELECT idusuario FROM recuperar WHERE codigo=:codigo)";
        $sentencia = $this->cnn->prepare($sql);
        $sentencia->execute([
            'usu_clave' => $clave,
            'codigo' => $codigoVer
        ]);
        return $this->cnn->lastInsertId();
    }
    
}
