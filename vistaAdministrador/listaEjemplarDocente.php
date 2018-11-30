
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Lista Ejemplares</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/x-icon" href="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>logoPrincipal.gif" />
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
                       <li><a href="<?= MENU_DOCENTE['url'] ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Inicio</a></li> 
                        <li>
                                                        
                                <li><a href="<?= CONSULTAR_LIBRO_DOCENTE['url'] ?>"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp;Libros</a></li>                           
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                               
                                <li><a href="<?= CONSULTAR_PRESTAMO_DOCENTE['url'] ?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp;Mis Préstamos</a></li>                              
                                <li><a href="<?= CONSULTAR_RESERVA_DOC['url'] ?>"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;Mis Reservas</a></li>
                            </ul>
                        </li>                    
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>&nbsp;&nbsp; Configuración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                          
                                <li><a href="<?= MOSTRAR_MODIFICAR_CLAVE_DOCENTE['url'] ?>"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i>&nbsp;&nbsp; Modificar clave</a></li>                            
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
                        <img src="<?= PROYECTO_RECURSOS_ASSETS_IMG ?>user02.png" alt="user-picture" class="img-responsive img-circle center-box">
                    </figure>
                    <li style="color:#fff; cursor:default;">
                        <span class="all-tittles">Docente</span>
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
            </nav>     <div class="container">
                <div class="page-header">
                    <h1 class="all-tittles">Sistema biblioteca <small>Listado ejemplares</small></h1>
                </div>
            </div>                       
            <div class="container-fluid">
                <h2 class="text-center all-tittles">lista de ejemplares</h2>    
                <div class="div-table">
                    <section class="content">
                        <div class="container-fluid">        
                            <!-- Basic Examples -->
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">                                    
                                        <div class="body table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                      <tr>
                          <th class="div-table-cell">Código Único</th>
                          <th class="div-table-cell">Título</th>  
                          <th class="div-table-cell">Descipción</th>
                          <th class="div-table-cell">Reservar</th>                               
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach ($listaEjemplarDoc as $resultadoEjemplarDoc) { ?>    
                        <tr>                                                                          
                            <td class="div-table-cell"><?= $resultadoEjemplarDoc->codigounico ?></td>            
                            <td class="div-table-cell"><?= $resultadoEjemplarDoc->titulolibro ?></td>                                                        
                            <td class="div-table-cell"><?= $resultadoEjemplarDoc->descripcion ?></td>                                                                        
                            <td class="div-table-cell"><a href="<?= REGISTAR_RESERVA_EJEMPLAR_DOCENTE['url'] . '?idejemplar=' . $resultadoEjemplarDoc->idejemplar ?>" class="btn btn-warning"> 
                                    <i class="zmdi zmdi-time-restore"></i>
                                </a></td>
                        </tr> 
                      <?php }
                      ?>              
                  </tbody>

                                            </table>                                                                                                                                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Basic Examples -->
                        </div>
                    </section>

                    <div class="color-bg"></div>
                    <!-- Jquery Core Js --> 
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_BUNDLES2 ?>libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_BUNDLES2 ?>vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_BUNDLES2 ?>morphingsearchscripts.bundle.js"></script> <!-- Main top morphing search --> 

                    <!-- Jquery DataTable Plugin Js --> 
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_BUNDLES2 ?>datatablescripts.bundle.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>dataTables.buttons.min.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>buttons.bootstrap4.min.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>buttons.colVis.min.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>buttons.flash.min.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>buttons.html5.min.js"></script>
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_PLUGINSP ?>buttons.print.min.js"></script>

                    <script src="<?= PROYECTO_RECURSOS_ASSETS_BUNDLES2 ?>mainscripts.bundle.js"></script><!-- Custom Js --> 
                    <script src="<?= PROYECTO_RECURSOS_ASSETS_JSP ?>jquery-datatable.js"></script>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
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
            <!--             Modal 
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
            
                                        <input type="text" id="id_registro" name="id_registro">
                                        <input type="text" id="codigoUnico" name="codigoUnico">
                                        <label>Titulo</label>
                                        <input type="text" id="titulo2"name="titulo2">
                                        <label>Descripcion</label>
                                        <input type="text" id="descripcion"name="descripcion">
                                        <label>Fecha Ingreso</label>
                                        <input type="text" id="fechaI"name="fechaI">
                                        <label>Estado</label>
                                        <input type="text" id="estado"name="estado">
            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->

<!--            <script type="text/javascript">
          $(".btnReserva").click(function () {
              var id = $(this).attr("data-id");
              var codigoUnico = $(this).attr("data-codigounico");
              var descripcion = $(this).attr("data-descripcion");
              var titulo = $(this).attr("data-titulo");
              var fechaIngreso = $(this).attr("data-fechaI");
              var estado = $(this).attr("data-estado");
              var url
              $("#id_registro").val(id);
              $("#descripcion").val(descripcion);
              $("#titulo2").val(titulo);
              $("#codigoUnico").val(codigoUnico);
              $("#fechaI").val(codigoUnico);
              $("#estado").val(estado);
          });
            </script>-->
    </body>
</html>