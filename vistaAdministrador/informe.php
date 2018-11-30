<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Reportes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/x-icon" href="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>logoPrincipal.gif"/>
        <script src="<?= PROYECTO_RECURSOS_JSA ?>sweet-alert.min.js"></script>
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>sweet-alert.css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>normalize.css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_CSSA ?>styles.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= PROYECTO_RECURSOS_JSA ?>jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?= PROYECTO_RECURSOS_JSA ?>modernizr.js"></script>
        <script src="<?= PROYECTO_RECURSOS_JSA ?>bootstrap.min.js"></script>
        <script src="<?= PROYECTO_RECURSOS_JSA ?>jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= PROYECTO_RECURSOS_JSA ?>main.js"></script>
    </head>
    <body>
        <div class="navbar-lateral full-reset">
            <div class="visible-xs font-movile-menu mobile-menu-button"></div>
            <div class="full-reset container-menu-movile custom-scroll-containers">

                <div class="logo full-reset all-tittles">

                    <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;">                   
                    </i> 
                    eLibris                                  
                </div>
                <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                    <figure>
                        <img src="<?= PROYECTO_RECURSOS_ASSETS_IMG ?>LogoeLibris.gif" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                    </figure>
                    <p class="text-center" style="padding-top: 15px;"> Gestión Bibliotecaria</p>
                </div>
                  <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?= MENU['url'] ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-accounts-list zmdi-hc-fw"></i>&nbsp;&nbsp; Autor y Editorial <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?= REGISTRAR_AUTOR['url'] ?>"><i class="zmdi zmdi-account zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Autor</a></li>
                            <li><a href="<?= REGISTRAR_EDITORIAL['url'] ?>"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva editorial</a></li>
                        </ul>
                    </li>         
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y Ejemplares <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?= REGISTRAR_LIBRO['url'] ?>"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="<?= REGISTRAR_EJEMPLAR['url'] ?>"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo ejemplar</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?= REGISTRAR_PRESTAMO['url'] ?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp;Préstamos</a></li>                           
                            <li>
                                <a href="<?= CONSULTAR_RESERVA['url'] ?>"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones </a>
                            </li>
                        </ul>
                    </li>
                     <li><a href="<?= CONSULTA_LIBRERIAS['url'] ?>"><i class="zmdi zmdi-view-list zmdi-hc-fw"></i>&nbsp;&nbsp;Consultas Generales</a></li>
                    <li><a href="<?= MOSTRAR_INFORME['url'] ?>"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp;Reportes</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>&nbsp;&nbsp; Configuración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">                          
                            <li><a href="<?= MOSTRAR_MODIFICAR_CLAVE_USUARIO['url'] ?>"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i>&nbsp;&nbsp; Modificar clave</a></li>                            
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="content-page-container full-reset custom-scroll-containers">
            <nav class="navbar-user-top full-reset">
                <ul class="list-unstyled full-reset">
                    <figure>
                        <img src="<?= PROYECTO_RECURSOS_ASSETS_IMG ?>user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                    </figure>
                    <li style="color:#fff; cursor:default;">
                        <span class="all-tittles">Administrador</span>
                    </li>
                    <li  class="tooltips-general exit-system-button" data-href="<?= CERRAR_SESION['url'] ?>" data-placement="bottom" title="Salir del sistema">
                        <i class="zmdi zmdi-power"></i>
                    </li>                                
                    <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                        <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                    </li>
                    <li class="mobile-menu-button visible-xs" style="float: left !important;">
                        <i class="zmdi zmdi-menu"></i>
                    </li>
                </ul>
            </nav>
            <div class="container">
                <div class="page-header">
                    <h1 class="all-tittles">Sistema bibliotecario <small>Reportes</small></h1>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#informe" aria-controls="statistics" role="tab" data-toggle="tab">Informe</a></li>                                    
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="informe">                 
                        <div class="container-fluid">
                            <div class="page-header">
                                <h2 class="all-tittles">préstamos <small>en general</small></h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_DURRANTE_AÑO ['url'] ?>"> <h3 class="text-center">Préstamos de año</h3></a></p>
                                    </div>
                                </div>                                 
                                 <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_PRESTAMO_DOCENTE ['url'] ?>"> <h3 class="text-center">Préstamos de Docentes</h3></a></p>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_PRESTAMO_ESTUDIANTE ['url'] ?>"> <h3 class="text-center">Préstamos de Estudiantes</h3></a></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_PRESTAMO_FECHA ['url'] ?>"> <h3 class="text-center">Cant.Préstamos por Fecha</h3></a></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_PRESTAMO_ROL ['url'] ?>"> <h3 class="text-center">Cant.Préstamos por Rol</h3></a></p>
                                    </div>
                                </div>
                                <!--modal-->
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a data-toggle="modal" data-target="#enero-junio"> <h3 class="text-center">Prestamos Enero - Junio</h3></a></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a data-toggle="modal" data-target="#julio-diciembre"> <h3 class="text-center">Prestamos Julio - Diciembre</h3></a></p>
                                    </div>
                                </div>
                            </div>
                             <p class="lead text-center"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes y selecciona “Devolucion pendientes (por usuario)”</p>
                                                      
                             <!-- Modal -->
<div class="modal fade" id="enero-junio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel">Préstamos de Enero a Junio</h3>       
      </div>
      <div class="modal-body">
       <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_ENERO ['url'] ?>"> <h3 class="text-center">Enero</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_FEBRERO ['url'] ?>"> <h3 class="text-center">Febrero</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_MARXO ['url'] ?>"> <h3 class="text-center">Marzo</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_ABRIL ['url'] ?>"> <h3 class="text-center">Abril</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_MAYO ['url'] ?>"> <h3 class="text-center">Mayo</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_JUNIO ['url'] ?>"> <h3 class="text-center">Junio</h3></a></p>
                                    </div>
                                </div>
      </div>     
    </div>
  </div>
</div>
                             <!--modal de julio a diciembre-->
      
                             <div class="modal fade" id="julio-diciembre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLabel">Préstamos de Julio a Diciembre</h3>       
      </div>
      <div class="modal-body">
       <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_JULIO ['url'] ?>"> <h3 class="text-center">Julio</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_AGOSTO['url'] ?>"> <h3 class="text-center">Agosto</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_SEPTIEMBRE ['url'] ?>"> <h3 class="text-center">Septiembre</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_OCTUBRE ['url'] ?>"> <h3 class="text-center">Octubre</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_NOVIEMBRE['url'] ?>"> <h3 class="text-center">Noviembre</h3></a></p>
                                    </div>
                                </div>
             <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">    
                                        <a href="<?= REPORTE_DICIEMBRE['url'] ?>"> <h3 class="text-center">Diciembre</h3></a></p>
                                    </div>
                                </div>
      </div>     
    </div>
  </div>
</div>
                             <!--final de modales-->
                             
                             
                             
                            <div class="page-header">
                                <h2 class="all-tittles">préstamos <small>por Devoluvion</small></h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="text-center all-tittles">Devoluciones pendientes </h3>
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr class="success">
                                                    <th class="text-center">Tipo usuario</th>
                                                    <th class="text-center">N° de Préstamos</th>
                                                    <th class="text-center">Porcentaje</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              <?php 

                          foreach ($listaInforme as $informePrestamoP) { ?> 
                               <tr>                                                                                        
                           <td>Estudiantes</td>
                                <td><?= $informePrestamoP->numeroPrestamos ?></td>
                                <td><?= $informePrestamoP->porcentaje ?>%</td>
                                </tr> 
                                <?php  }
                 ?>              
                                <tr>
                                     <?php foreach ($listaInformeD as $informePrestamoD) { ?> 
                                  <td>Docentes</td>
                                  <td><?= $informePrestamoD->numeroPrestamos ?></td>
                                  <td><?= $informePrestamoD->porcentaje ?>%</td>
                                </tr>
                                             <?php  }
                 ?> 
                            </tbody>                                                         
                                        </table>
                                    </div>
                                    <p class="lead text-center"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes y selecciona “Devolucion pendientes (por usuario)”</p>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div role="tabpanel" class="tab-pane fade" id="reportes">                    
                        <div class="container-fluid">                   
                            <div class="row">
                                <div class="page-header">
                                    <h2 class="all-tittles">reportes <small>generales</small></h2>
                                </div><br>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                                <i class="zmdi zmdi-trending-up zmdi-hc-5x">
                                                    <a></a>
                                            </i>
                                        </p>
                                        <h3 class="text-center">Reporte General de Libros</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Reporte Ejemplares por Categoría</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-trending-up zmdi-hc-5x" >   
                                            </i>                                                          
                                        <a href="<?= PRESTAMO_INFORMO_PDF ['url'] ?>"><h3 class="text-center">Préstamos Realizados</h3></a></p>
                                    </div>
                                </div>                           
                            </div>
                            <div class="row">
                                <div class="page-header">
                                    <h2 class="all-tittles">reportes <small>devoluciones pendientes</small></h2>
                                </div><br>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Docentes</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Personal Administrativo</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="full-reset report-content">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Estudiantes</h3>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center all-tittles">Función del sistema</h4>
                        </div>
                        <div class="modal-body">
                            Este sistema te ayudara a realizar los procesos de la Biblioteca con mayor fácilidad. 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer full-reset">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Acerca de</h4>
                            <p>
                                Este sistema te ayudara a realizar los procesos de la Biblioteca con mayor fácilidad. 
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Desarrollador</h4>
                            <ul class="list-unstyled">
                                <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Leidi Johana Garzon <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright full-reset all-tittles">© 2018 Tecnologo en ADSI</div>
            </footer>
        </div>


        <script type="text/javascript">
          consultar();
          function consultar(){
          $.ajax({
          'url':'<?= CONSULTAR_INFORME ['url'] ?>',
                  'type':'POST',
                  'data':{},
                  success: function (respuesta){ //respuesta lo que devuelve la consulta
                  console.log(respuesta);
                          var cuerpo = $('#tbody');
                          cuerpo.empty();
                          for (var i = 0; i < respuesta.length; i++){
                  var item = respuesta[i];
                          var fila = "<tr class='active'>";
                          fila += "<td>" + item.tipousuario + "</td>" + "<td>" + item.numeroPrestamos + "</td></tr>" ;
                                  
//          + "<td>" 
                                  
//          + item.porcentaje + "</td>";
                          cuerpo.append(fila); //agregacion de filas consultadas 
                        }
                          
                  }
                  });
          }





        </script>


    </body>
</html>