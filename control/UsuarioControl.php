<?php

namespace control;

use control\generico\GenericoControl;
use modelo\dao\UsuarioDAO;
use modelo\vo\usuario;
use PHPMailer\PHPMailer\PHPMailer;
use modelo\vo\Recuperar;
use control\generico\ValidacionExcepcion;
use control\generico\UtilValidacion;
use const RUTA_PRINCIPAL;
use const URL_PRINCIPAL;

class UsuarioControl extends GenericoControl {

  private $usuarioDAO;

  public function __construct(&$cnn) {
    parent::__construct($cnn);
//    parent::respuestaJSON();
    $this->usuarioDAO = new UsuarioDAO($cnn);
  } 
  public function index() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/inicio.php';
  }

  //cosnulta todos los ususarios 
  public function consultarUsuario() {
    $usuario = new usuario();
    $usuario->getCampos($_POST);
    $listaDocente = $this->usuarioDAO->Consultar($usuario);
    include_once RUTA_PRINCIPAL . '/vista/consultarUsuario.php';
  }

  function consultarDocente() {
    $docente = new usuario();
    $docente->getCampos($_POST);
    $listaDocente = $this->docenteDAO->ConsultarDocente($docente);
    include RUTA_PRINCIPAL . '/vistaAdministrador/listaDocente.php';
  }

  function mostrarModificcar() {
    $id = $_GET['idusuario'];
    $usuario = $this->usuarioDAO->ConsultarId($id);
    include RUTA_PRINCIPAL . '/vistaAdministrador/modificarUsuario.php';
  }

  function modificarClave() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/cambiarClave.php';
  }

  function modificarClaveEst() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/cambiarClaveEst.php';
  }
   function modificarClaveDoce() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/cambiarClaveDoce.php';
  }

  function recuperarClave() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/recuperarContraseña.php';
  }

  function verificacionCodigo() {
    include RUTA_PRINCIPAL . '/vistaAdministrador/cambioClaveRec.php';
  }

  public function autenticar() {
    $numerodocumento = $_POST['usu_numerodocumento'];
    $clave = md5($_POST['usu_clave']);    
    $usuario = $this->usuarioDAO->autenticar($numerodocumento, $clave);

    if (is_null($usuario)) {
      session_destroy();
      header('Location:' . SESION_USUARIO['url']);
      return;
    }
    if(isset($_POST['usu_recordarme'])){
        $json= json_encode($usuario->getCampos());
        setcookie('usuario', $json, time()+(60*60*24*365),URL_PRINCIPAL);
    }
    $rol = $usuario->getRol();
    if ($rol === '1') {
      $_SESSION['usuario'] = $usuario;
      header('Location:' . MENU['url']);
       print '<script languaje="JavaScript"> alert("BIENVENIDO AL MENÚ DEL ADMINISTRADOR."); </script>';      
      include RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
    } else if ($rol === '2') {
      $_SESSION['usuario'] = $usuario;
      header('Location:' . MENU_ESTUDIANTE['url']);
       print '<script languaje="JavaScript"> alert("BIENVENIDO AL MENÚ DEL ESTUDIANTE."); </script>';      
      include RUTA_PRINCIPAL . '/vistaAdministrador/homeEstudiante.php';
    } elseif ($rol === '3') {
      $_SESSION['usuario'] = $usuario;
      header('Location:' . MENU_DOCENTE['url']);
       print '<script languaje="JavaScript"> alert("BIENVENIDO AL MENÚ DEL DOCENTE."); </script>';      
      include RUTA_PRINCIPAL . '/vistaAdministrador/homeDocente.php';
    } elseif ($rol === '4') {
      $_SESSION['usuario'] = $usuario;
      header('Location:' . MENU_FUNCIONARIO['url']);
       print '<script languaje="JavaScript"> alert("BIENVENIDO AL MENÚ DEL FUNCIONARIO."); </script>';      
      include RUTA_PRINCIPAL . '/vistaAdministrador/homeFuncionario.php';
    }
  }

//  function ModificarUsuario() {
//    $id = $_GET['idusuario'];
//    $rol = $_POST['usu_rol'];
//    $estado = $_POST['usu_idestado'];
//    $usu = new usuario();
//    $usu->setIdusuario($id);
//    $usu->setRol($rol);
//    $usu->setIdestado($estado);
//    $this->usuarioDAO->ActualizarRol(($usu));
//  }

  //cambio de clave 
  function guardarClave() {
    $usuario = $_SESSION['usuario'];
    $id = $usuario->getIdusuario();
    $claveActual = $usuario->getClave();
    $claveActualCampo = $_POST['usu_clave_actual'];
    if ($claveActual === $claveActualCampo) {
      $clave = $_POST['usu_clave'];
      $repetir_clave = $_POST['usu_repetir_clave'];
      if ($clave === $repetir_clave) {
        $usu = new usuario();
        $usu->setIdusuario($id);
        $usu->setClave($clave);
        $usuario = $this->usuarioDAO->ActualizarId(($usu));
        print '<script languaje="JavaScript"> alert("Se cambio la clave con éxito."); </script>';
        include RUTA_PRINCIPAL . '/vistaAdministrador/home.php';
      } else {
        print '<script languaje="JavaScript"> alert("Las claves no coinciden"); </script>';
        include RUTA_PRINCIPAL . '/vistaAdministrador/cambiarClave.php';
      }
    } else {
      print '<script languaje="JavaScript"> alert("La clave actual no coincide"); </script>';
      include RUTA_PRINCIPAL . '/vistaAdministrador/cambiarClave.php';
    }
  }
  //validacion para el envio de correo
  public function validarCorreo() {
    $verifcode = rand(1, 1000000);
    try {
      //Validacion::validar(['usuario' => 'obligatorio', 'clave' => 'obligatorio'], $_POST);
      $correo = $_POST ['usu_correo'];
      $body = 'archivos/_49606_valentino-rossi-yamaha_factory.jpg';
      //Import PHPMailer classes into the global namespace
      require 'vendor/autoload.php';
      if ($correo != null) {
        $mail = new PHPMailer;
        $mail->isSMTP();       
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "senaphpmailer@gmail.com";
        $mail->Password = "Sena1234";
        $mail->setFrom('ASD@ASD.com', 'eLibris');
        $mail->addAddress($correo, '');
        $mail->Subject = utf8_decode('Solicitud de reestablecimiento de contraseña');   
        $mail->AddAttachment='vistaAdministrador/assets/img/logoeLibris.gif'; 
        $mail->msgHTML('Su codigo de verificacion es: ' . $verifcode . '. ', __DIR__);
        $mail->AltBody = 'Agradecimiento';
        $mail->SMTPOptions = Array(
            'ssl' => [
                'verify_peer' => false,
                'verify_depth' => false,
                'allow_self_signed' => true
            ],
        );
        if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
          print '<script languaje="JavaScript"> alert("El correo fue enviado correctamente"); </script>';
          include RUTA_PRINCIPAL . '/vistaAdministrador/cambioClaveReC.php';
        }

        function save_mail($mail) {
          //You can change 'Sent Mail' to any other folder or tag
          $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
          //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
          $imapStream = imap_open($path, $mail->Username, $mail->Password);
          $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
          imap_close($imapStream);
          return $result;
        }

      } else {
        
      }

      $encryptMail = $correo . "" . rand(1, 1000);
      $token =  md5($encryptMail);
      $this->usuarioDAO->validarCorreo($correo);
      require_once ("./modelo/vo/Recuperar.php");
      $recuperarVO = new Recuperar();
      //método POSTc
      $recuperarVO->setId_recuperar($token);
      $recuperarVO->setCodigo($verifcode);
      $this->usuarioDAO->eliminarVerificacionesPasadas($correo);
      $this->usuarioDAO->enviarCorreoRec($recuperarVO, $correo);
      die();
//Esto le indica a chrome que devuelve un JSON
      $this->respuestaJSON(['codigo' => 1, 'mensaje' => 'Su correo es valido,  se ha enviado el codigo de verificacion.']);
    } catch (ValidacionExcepcion $error) {
      $this->respuestaJSON(['codigo' => $error->getCode(), 'mensaje' => $error->getMessage()]);
    }
  }
//            //Actualizacion de la clave por medio del codigo de verificacion

  public function actualizarClaveRec() {
    try {
//método POSTc
      $codigoVer = ($_POST['codigo']);
      $clave = md5($_POST['usu_clave']);     
      $this->usuarioDAO->actualizarClaveRec($codigoVer, $clave);
//Esto le indica a chrome
       print '<script languaje="JavaScript"> alert("Se cambio la clave con éxito."); </script>';      
      include RUTA_PRINCIPAL . '/vistaAdministrador/inicio.php';
    } catch (ValidacionExcepcion $error) {
      $this->respuestaJSON(['codigo' => $error->getCode(),
          'mensaje' => $error->getMessage()]);
    }
  }

}
