<?php
define('RUTA_PRINCIPAL', __DIR__);
define('PROYECTO', '/eLibrisProyecto/');
define('URL_PRINCIPAL', '/eLibrisProyecto/index.php');
define('PROYECTO_EXCEPCION', 'control/excepcion/ValidacionExcepcion.php');
define('PROYECTO_UTIL', 'control/util/Validacion.php');
//define('PROYECTO_VENDOR', PROYECTO .  'vendor/autoload.php');

//VISTA
define('PROYECTO_RECURSOS_CSS', PROYECTO . 'vista/css/');
define('PROYECTO_RECURSOS_JS', PROYECTO . 'vista/js/');
//PRINCIPAL
define('PROYECTO_RECURSOS_CSSP', PROYECTO . 'paginaPrincipal/cssp/');
define('PROYECTO_RECURSOS_FA', PROYECTO . 'paginaPrincipal/cssp/font-awesome/css/');
define('PROYECTO_RECURSOS_EF', PROYECTO . 'paginaPrincipal/elegant_font/');
define('PROYECTO_RECURSOS_JSP', PROYECTO . 'paginaPrincipal/jsp/');
define('PROYECTO_RECURSOS_IMG', PROYECTO . 'paginaPrincipal/images/img-portfolio/');
define('PROYECTO_RECURSOS_F', PROYECTO . 'paginaPrincipal/fontsp/');
//vista administrador
define('PROYECTO_RECURSOS_CSSA', PROYECTO . 'vistaAdministrador/css/');
define('PROYECTO_RECURSOS_ASSETS_ICONS', PROYECTO . 'vistaAdministrador/assets/icons/');
define('PROYECTO_RECURSOS_ASSETS_IMG', PROYECTO . 'vistaAdministrador/assets/img/');
define('PROYECTO_RECURSOS_JSA', PROYECTO . 'vistaAdministrador/js/');
define('PROYECTO_RECURSOS_AR', PROYECTO . 'archivos/');
define('PROYECTO_RECURSOS_ASSETS_CSSP', PROYECTO . 'vistaAdministrador/assets/cssp/');
define('PROYECTO_RECURSOS_ASSETS_JSP2', PROYECTO . 'vistaAdministrador/assets/jsp/');
//paginacion
define('PROYECTO_RECURSOS_ASSETS_BUNDLES2', PROYECTO . 'vistaAdministrador/assets/bundles2/');
define('PROYECTO_RECURSOS_ASSETS_PLUGINSP', PROYECTO . 'vistaAdministrador/assets/pluginsp/jquery-datatable/buttons/');
define('PROYECTO_RECURSOS_ASSETS_JSP', PROYECTO . 'vistaAdministrador/assets/jsp/pages/tables/');
define('PROYECTO_RECURSOS_ASSETS_CCSP', PROYECTO . 'vistaAdministrador/assets/cssp/');
//MENUS
//menu administrador
define('MENU', array(
    'clase' => 'MenuControl',
    'metodo' => 'indexAdministrador',
    'url' => URL_PRINCIPAL. '/home/administrador'
));
//menu de  estudiante
define('MENU_ESTUDIANTE', array(
    'clase' => 'MenuControl',
    'metodo' => 'indexEstudiante',
    'url' => URL_PRINCIPAL. '/menu/estudiante'
));
//menu de  docente
define('MENU_DOCENTE', array(
    'clase' => 'MenuControl',
    'metodo' => 'indexDocente',
    'url' => URL_PRINCIPAL. '/menu/docente'
));
//menu de funcionario
define('MENU_funcionario', array(
    'clase' => 'MenuControl',
    'metodo' => 'indexFuncionario',
    'url' => URL_PRINCIPAL. '/menu/funcionario'
));
//USUARIOS
define('USUARIO_AUTENTICAR', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'autenticar',
    'url' => URL_PRINCIPAL. '/usuario/autenticar'
    ));
define('SESION_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/usuario/sesion'
));
//recuperacion de usuario por medio de la clave
define('RECUPERAR_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'recuperarClave',
    'url' => URL_PRINCIPAL. '/usuario/recuperar/clave'
));
//verificacion de codigo para la recuperacion
define('VERIFICACION_CODIGO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'verificacionCodigo',
    'url' => URL_PRINCIPAL. '/usuario/verificar/restablecer/clave'
));
//consulta de todos los usuarios 
define('CONSULTAR_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'consultarUsuario',
    'url' => URL_PRINCIPAL. '/menu/consultar/usuario'
));
//consulta de usuario por id
define('CONSULTAR_USUARIO_ID', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'consultarUsuarioId',
    'url' => URL_PRINCIPAL. '/menu/consultar/usuario/id'
));
//Muestra formulario de modificar usuario
define('MOSTRAR_MODIFICAR', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'mostrarModificcar',
    'url' => URL_PRINCIPAL. '/menu/mostrar/usuario'
));
//modifica los datos del usuario
define('MODIFICAR_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'modificarUsuario',
    'url' => URL_PRINCIPAL. '/menu/modificar/usuario'
));
//muestra formulario de modificar clave 
define('MOSTRAR_MODIFICAR_CLAVE_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'modificarClave',
    'url' => URL_PRINCIPAL. '/menu/mostrar/modificar/clave/usuario'
));
//muestra formulario de modificar clave 
define('MOSTRAR_MODIFICAR_CLAVE_ESTUDIANTE', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'modificarClaveEst',
    'url' => URL_PRINCIPAL. '/menu/mostrar/modificar/clave/estudiante'
));
//muestra formulario de modificar clave --Docente
define('MOSTRAR_MODIFICAR_CLAVE_DOCENTE', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'modificarClaveDoce',
    'url' => URL_PRINCIPAL. '/menu/mostrar/modificar/clave/docente'
));
//modifica la clave del usuario 
define('GUARDAR_CLAVE_USUARIO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'guardarClave',
    'url' => URL_PRINCIPAL. '/menu/guardar/clave/usuario'
));
define('RECUPERAR_CLAVE', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'actualizarClaveRec',
    'url' => URL_PRINCIPAL. '/menu/guardar/clave/recuperacion/usuario'
));
//AUTOR
//Muestra el formulario
define('REGISTRAR_AUTOR', array(
    'clase' => 'AutorControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/autor'
));
//guarda el nuevo autor
define('GUARDAR_AUTOR', array(
    'clase' => 'AutorControl',
    'metodo' => 'registrarAutor',
    'url' => URL_PRINCIPAL. '/menu/guardar/autor'
));
//consultar todos los autores
define('CONSULTAR_AUTOR', array(
    'clase' => 'AutorControl',
    'metodo' => 'consultarAutor',
    'url' => URL_PRINCIPAL. '/menu/consultar/autor'
));
define('CONSULTAR_AUTOR_ESTUDIANTE', array(
    'clase' => 'AutorControl',
    'metodo' => 'consultarAutorEstudiante',
    'url' => URL_PRINCIPAL. '/menu/consultar/autorPrincipal'
));
// muestra formulario de modifica los datos del autor
define('MOSTRAR_MODIFICAR_AUTOR', array(
    'clase' => 'AutorControl',
    'metodo' => 'mostrarModificarAutor',
    'url' => URL_PRINCIPAL. '/menu/mostrar/autor'
));
// modifica los datos del autor
define('MODIFICAR_AUTOR', array(
    'clase' => 'AutorControl',
    'metodo' => 'modificarAutor',
    'url' => URL_PRINCIPAL. '/menu/modificar/autor'
));
//EDITORIAL
//Muestra el formulario
define('REGISTRAR_EDITORIAL', array(
    'clase' => 'EditorialControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/editorial'
));
//guarda la editrial
define('GUARDAR_EDITORIAL', array(
    'clase' => 'EditorialControl',
    'metodo' => 'registrarEditorial',
    'url' => URL_PRINCIPAL. '/menu/guardar/editorial'
));
//muestra la consulta de las editoriales
define('CONSULTAR_EDITORIAL', array(
    'clase' => 'EditorialControl',
    'metodo' => 'consultarEditorial',
    'url' => URL_PRINCIPAL. '/menu/consultar/editorial'
));
define('CONSULTAR_EDITORIAL_ESTUDIANTE', array(
    'clase' => 'EditorialControl',
    'metodo' => 'consultarEditorialEstudiante',
    'url' => URL_PRINCIPAL. '/menu/consultar/editorial/estudiante'
));
// muestra formulario de modificar editorial 
define('MOSTRAR_MODIFICAR_EDITORIAL', array(
    'clase' => 'EditorialControl',
    'metodo' => 'mostrarModificarEditorial',
    'url' => URL_PRINCIPAL. '/menu/mostrar/editorial'
));
//modifica editorial
define('MODIFICAR_EDITORIAL', array(
    'clase' => 'EditorialControl',
    'metodo' => 'modificarEditorial',
    'url' => URL_PRINCIPAL. '/menu/modificar/editorial'
));
//EJEMPLAR
//muestra el formulario 
define('REGISTRAR_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/ejemplar'
));
// guarda el nuevo ejemplar
define('GUARDAR_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'registrarEjemplar',
    'url' => URL_PRINCIPAL. '/menu/guardar/ejemplar'
));
//consulta todos los ejemplares 
define('CONSULTAR_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'consultarEjemplar',
    'url' => URL_PRINCIPAL. '/menu/consultar/ejemplar'
));
//consulta de los ejemplares segun el id del libro estudiante
define('CONSULTAR_EJEMPLAR_ESTUDIANTE', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'consultarEjemplarEs',
    'url' => URL_PRINCIPAL. '/menu/consultar/ejemplar/estudiante'
));
//consulta de los ejemplares segun el id del libro Docente
define('CONSULTAR_EJEMPLAR_DOCENTE', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'consultarEjemplarDoc',
    'url' => URL_PRINCIPAL. '/menu/consultar/ejemplar/docente'
));
//consulta de los ejemplares segun el id del libro Administrador
define('CONSULTAR_EJEMPLAR_ADMINISTRADOR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'consultarEjemplarAdm',
    'url' => URL_PRINCIPAL. '/menu/consultar/ejemplar/administrador'
));
// muestra formulario de modificar ejemplar 
define('MOSTRAR_MODIFICAR_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'mostrarModificarEjemplar',
    'url' => URL_PRINCIPAL. '/menu/mostrar/ejemplar'
));
//modifica ejemplar
define('MODIFICAR_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'modificarEjempplar',
    'url' => URL_PRINCIPAL. '/menu/modificar/ejemplar'
));

//LIBRO
//Muestra formularios de libro
define('REGISTRAR_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/libro'
));
//guarda el nuevo libro
define('GUARDAR_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'registrarLibro',
    'url' => URL_PRINCIPAL. '/menu/guardar/libro'
));
//consulta todos los libros
define('CONSULTAR_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarLibro',
    'url' => URL_PRINCIPAL. '/menu/consultar/libro'
));
//consulta de libros para docente
define('CONSULTAR_LIBRO_DOCENTE', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarLibroDocente',
    'url' => URL_PRINCIPAL. '/menu/consultar/libro/estudiante'
));
//consilta de libros para estudiante
define('CONSULTAR_LIBRO_ESTUDIANTE', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarLibroEstudiante',
    'url' => URL_PRINCIPAL. '/menu/consultar/libro/estudiante'
));
// muestra formulario de modificar libro 
define('MOSTRAR_MODIFICAR_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'mostrarModificarLibro',
    'url' => URL_PRINCIPAL. '/menu/mostrar/libro'
));
//modifica editorial
define('MODIFICAR_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'modificarLibro',
    'url' => URL_PRINCIPAL. '/menu/modificar/libro'
));
//CATALOGO
define('CATALOGO', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarLibroCatalogo',
    'url' => URL_PRINCIPAL. '/menu/mostrar/catalogo'
));
define('CATALOGO_SESION', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarCatalogo',
    'url' => URL_PRINCIPAL. '/menu/mostrar/catalogo/principal'
));
define('CATALOGO_ESTUDIANTE', array(
    'clase' => 'LibroControl',
    'metodo' => 'CatalogoEstudiante',
    'url' => URL_PRINCIPAL. '/menu/mostrar/catalogo/estudiante'
));

//consulta de Administrador 
define('CONSULTAR_ADMINISTRADOR', array(
    'clase' => 'AdministradorControl',
    'metodo' => 'consultarAdministrador',
    'url' => URL_PRINCIPAL. '/menu/consultar/administrador'
));
//consulta de docentes 
define('CONSULTAR_DOCENTES', array(
    'clase' => 'DocenteControl',
    'metodo' => 'consultarDocente',
    'url' => URL_PRINCIPAL. '/menu/consultar/docente'
));
//consulta de estuiantes 
define('CONSULTAR_ESTUDIANTES', array(
    'clase' => 'EstudianteControl',
    'metodo' => 'consultarEstudiante',
    'url' => URL_PRINCIPAL. '/menu/consultar/estudiante'
));
//consulta de funcionarios
define('CONSULTAR_FUNCIONARIOS', array(
    'clase' => 'FuncionarioControl',
    'metodo' => 'consultarFuncionarios',
    'url' => URL_PRINCIPAL. '/menu/consultar/funcionarios'
));

//categoria
define('CONSULTAR_CATEGORIA', array(
    'clase' => 'CategoriaControl',
    'metodo' => 'consultarCategorias',
    'url' => URL_PRINCIPAL. '/menu/categoria/consulta'
));

define('CONSULTAR_CATEGORIA_LIBRO', array(
    'clase' => 'LibroControl',
    'metodo' => 'consultarCategorias2',
    'url' => URL_PRINCIPAL. '/menu/registrar/libro2'
));
//PRESTAMO
//Muestra formularios de prestamo
define('REGISTRAR_PRESTAMO', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/prestamo'
));
//guarda el nuevo prestamo
define('GUARDAR_PRESTAMO', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'registrarPrestamo',
    'url' => URL_PRINCIPAL. '/menu/guardar/prestamo'
));
define('GUARDAR_PRESTAMO_RESERVA', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'registrarPrestamoRe',
    'url' => URL_PRINCIPAL. '/menu/guardar/prestamo/reserva'
));
//consulta todos los prestamos administrador
define('CONSULTAR_PRESTAMO', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'consultarPrestamo',
    'url' => URL_PRINCIPAL. '/menu/consultar/prestamo'
));
//consulta todas las devoluciones pendientes ----administrador
define('CONSULTAR_DEVOLUCION', array(
    'clase' => 'DevolucionControl',
    'metodo' => 'consultarDevolucionesPendientes',
    'url' => URL_PRINCIPAL. '/menu/consultar/devoluciones/pendientes'
));
//consulta todos los prestamos estudiante
define('CONSULTAR_PRESTAMO_ESTUDIANTE', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'consultarPrestamoEstudiante',
    'url' => URL_PRINCIPAL. '/menu/consultar/prestamo/estudiante'
));
//consulta todos los prestamos docente
define('CONSULTAR_PRESTAMO_DOCENTE', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'consultarPrestamoDocente',
    'url' => URL_PRINCIPAL. '/menu/consultar/prestamo/docente'
));
// muestra formulario de modificar prestamo 
define('MOSTRAR_MODIFICAR_PRESTAMO', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'mostrarModificarPrestamo',
    'url' => URL_PRINCIPAL. '/menu/mostrar/prestamo'
));
// modifica los datos del prestamo
define('MODIFICAR_PRESTAMO', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'modificarPrestamo',
    'url' => URL_PRINCIPAL. '/menu/modificar/prestamo'
));
//RESERVA
//Muestra formularios de reserva
define('REGISTRAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'index',
    'url' => URL_PRINCIPAL. '/menu/registrar/reserva'
));
//guarda el nuevo reserva estudiante
define('GUARDAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'registrarReserva',
    'url' => URL_PRINCIPAL. '/menu/guardar/reserva/estudiante'
));
//guarda el nuevo reserva Docente
define('GUARDAR_RESERVA_DOCENTE', array(
    'clase' => 'ReservaControl',
    'metodo' => 'registrarReservaDoc',
    'url' => URL_PRINCIPAL. '/menu/guardar/reserva/docente'
));
//consulta todos las reserva
define('CONSULTAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'consultarReserva',
    'url' => URL_PRINCIPAL. '/menu/consultar/reserva'
));
//lista de reservas del estudiante
define('CONSULTAR_RESERVA_EST', array(
    'clase' => 'ReservaControl',
    'metodo' => 'consultarReservaEst',
    'url' => URL_PRINCIPAL. '/menu/consultar/reserva/estudiante'
));
//lista de reservas del docente
define('CONSULTAR_RESERVA_DOCENTE', array(
    'clase' => 'ReservaControl',
    'metodo' => 'consultarReservaDoc',
    'url' => URL_PRINCIPAL. '/menu/consultar/reserva/docente'
));
// muestra formulario de modificar reserva --Estudiante
define('MOSTRAR_MODIFICAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'mostrarModificarReserva',
    'url' => URL_PRINCIPAL. '/menu/mostrar/reserva'
));
// muestra formulario de modificar reserva --Docente
define('MOSTRAR_MODIFICAR_RESERVA_DOCENTE', array(
    'clase' => 'ReservaControl',
    'metodo' => 'mostrarModificarReservaDoce',
    'url' => URL_PRINCIPAL. '/menu/mostrar/reserva/docente'
));
// modifica los datos de reserva --Estudiante
define('MODIFICAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'modificarReserva',
    'url' => URL_PRINCIPAL. '/menu/modificar/reserva/estudiante'
));
// modifica los datos de reserva --Docente
define('MODIFICAR_RESERVA_DOCENTE', array(
    'clase' => 'ReservaControl',
    'metodo' => 'modificarReservaDoce',
    'url' => URL_PRINCIPAL. '/menu/modificar/reserva/docente'
));
// Cancelar la reserva --Estudiante
define('CANCELAR_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'cancelarReserva',
    'url' => URL_PRINCIPAL. '/menu/cancelar/reserva/estudiante'
));
// Cancelar la reserva --Docente
define('CANCELAR_RESERVA_DOCENTE', array(
    'clase' => 'ReservaControl',
    'metodo' => 'cancelarReservaDoce',
    'url' => URL_PRINCIPAL. '/menu/cancelar/reserva/docente'
));
// insertar prestamo conlos datos dela reserva
define('REGISTAR_PRESTAMO_RESERVA', array(
    'clase' => 'ReservaControl',
    'metodo' => 'mostrarDatosReserva',
    'url' => URL_PRINCIPAL. '/menu/prestamo/reserva'
));
//consulta de ejemplar para insertar reserva ---Estudiante
define('REGISTAR_RESERVA_EJEMPLAR', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'mostrarejemplarReserva',
    'url' => URL_PRINCIPAL. '/menu/ejemplar/reserva/estudiante'
));
//consulta de ejemplar para insertar reserva ---Docente
define('REGISTAR_RESERVA_EJEMPLAR_DOCENTE', array(
    'clase' => 'EjemplarControl',
    'metodo' => 'mostrarejemplarReservaDoc',
    'url' => URL_PRINCIPAL. '/menu/ejemplar/reserva/docente'
));
//consultas generales
define('CONSULTA_LIBRERIAS', array(
    'clase' => 'InformeControl',
    'metodo' => 'liberias',
    'url' => URL_PRINCIPAL. '/menu/consulta/librerias/generales'
));
//Correo 
define('ENVIAR_CORREO', array(
    'clase' => 'UsuarioControl',
    'metodo' => 'validarCorreo',
    'url' => URL_PRINCIPAL. '/menu/envio/correo'
));
//DEVOLUCIONES 
define('MOSTRAR_DEVOLUCION', array(
    'clase' => 'PrestamoControl',
    'metodo' => 'mostrarConsultaDev',
    'url' => URL_PRINCIPAL. '/menu/devolucion/prestamo'
));
define('REGISTRAR_DEVOLUCION', array(
    'clase' => 'DevolucionControl',
    'metodo' => 'registrarDevolucionLibro',
    'url' => URL_PRINCIPAL. '/menu/devolucion/prestamo/registrar'
));

//Ireportes
// visualizar formulario de informes
define('MOSTRAR_INFORME', array(
    'clase' => 'InformeControl',
    'metodo' => 'Informe',
    'url' => URL_PRINCIPAL. '/menu/informe/reportes'
));
define('PRESTAMO_INFORMO_PDF', array(
    'clase' => 'InformeControl',
    'metodo' => 'pdf',
    'url' => URL_PRINCIPAL. '/menu/informe/reportes/pdf'
));
//reporte de enero
define('REPORTE_ENERO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepEne',
    'url' => URL_PRINCIPAL. '/menu/reporte/enero/prestamos'
));
//reporte de febrero
define('REPORTE_FEBRERO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepFeb',
    'url' => URL_PRINCIPAL. '/menu/reporte/febrero/prestamos'
));
//reporte de MARZO
define('REPORTE_MARXO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepMar',
    'url' => URL_PRINCIPAL. '/menu/reporte/marzo/prestamos'
));
//reporte de abril
define('REPORTE_ABRIL', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepAbr',
    'url' => URL_PRINCIPAL. '/menu/reporte/abril/prestamos'
));
//reporte de mayo
define('REPORTE_MAYO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepMay',
    'url' => URL_PRINCIPAL. '/menu/reporte/mayo/prestamos'
));
//reporte de junio
define('REPORTE_JUNIO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepJun',
    'url' => URL_PRINCIPAL. '/menu/reporte/junio/prestamos'
));
//reporte de julio
define('REPORTE_JULIO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepJul',
    'url' => URL_PRINCIPAL. '/menu/reporte/julio/prestamos'
));
//reporte de agosto
define('REPORTE_AGOSTO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepAgo',
    'url' => URL_PRINCIPAL. '/menu/reporte/agosto/prestamos'
));
//reporte de septiembre
define('REPORTE_SEPTIEMBRE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepSep',
    'url' => URL_PRINCIPAL. '/menu/reporte/septiembre/prestamos'
));
//reporte de octubre
define('REPORTE_OCTUBRE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepOct',
    'url' => URL_PRINCIPAL. '/menu/reporte/octubre/prestamos'
));
//reporte de noviembre
define('REPORTE_NOVIEMBRE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepNov',
    'url' => URL_PRINCIPAL. '/menu/reporte/noviembre/prestamos'
));
//reporte de diciembre
define('REPORTE_DICIEMBRE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepDic',
    'url' => URL_PRINCIPAL. '/menu/reporte/diciembre/prestamos'
));
//reporte de durante un año
define('REPORTE_DURRANTE_AÑO', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepDurAño',
    'url' => URL_PRINCIPAL. '/menu/reporte/RepDurAño/prestamos'
));
//reporte de PRESTAMOS POR EL ROL
define('REPORTE_PRESTAMO_ROL', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepPorRol',
    'url' => URL_PRINCIPAL. '/menu/reporte/RepPorRol/prestamos'
));
//reporte de DOCENTES
define('REPORTE_PRESTAMO_DOCENTE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepPreDoc',
    'url' => URL_PRINCIPAL. '/menu/reporte/RepPreDoc/prestamos'
));
//reporte de POR ESTUDIANTE
define('REPORTE_PRESTAMO_ESTUDIANTE', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepPreEst',
    'url' => URL_PRINCIPAL. '/menu/reporte/RepPreEst/prestamos'
));
//CANTIDAD DE PRESTAMOS  REAIZADOS EN LA MISMA FECHA
define('REPORTE_PRESTAMO_FECHA', array(
    'clase' => 'InformeControl',
    'metodo' => 'RepPreFec',
    'url' => URL_PRINCIPAL. '/menu/reporte/RepPreFec/prestamos'
));

//cerrar sesion
define('CERRAR_SESION', array(
    'clase' => 'MenuControl',
    'metodo' => 'cerrarSesion',
    'url' => URL_PRINCIPAL .
    '/menu/cerrar/sesion'
));
