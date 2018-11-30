
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Catálogo</title>
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
                        <li><a href="<?= MENU_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Inicio</a></li> 
                        <li><a href="<?= CATALOGO_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp;Catalogo</a></li> 
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-view-list zmdi-hc-fw"></i>&nbsp;&nbsp; Librerias<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                                
                                <li><a href="<?= CONSULTAR_LIBRO_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Libros</a></li>
                                <li><a href="<?= CONSULTAR_EJEMPLAR_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Ejemplares</a></li>                                         
                            </ul>
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                               
                                <li><a href="<?= CONSULTAR_PRESTAMO_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp;Lista de Préstamos</a></li>                              
                                <li><a href="<?= CONSULTAR_RESERVA_EST['url'] ?>"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;Lista de Reservas</a></li>
                            </ul>
                        </li>                    
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>&nbsp;&nbsp; Configuración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                          
                                <li><a href="<?= MOSTRAR_MODIFICAR_CLAVE_ESTUDIANTE['url'] ?>"><i class="zmdi zmdi-border-color zmdi-hc-fw"></i>&nbsp;&nbsp; Modificar clave</a></li>                            
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
                        <img src="<?= PROYECTO_RECURSOS_ASSETS_IMG ?>user03.png" alt="user-picture" class="img-responsive img-circle center-box">
                    </figure>
                    <li style="color:#fff; cursor:default;">
                        <span class="all-tittles">Estudiante</span>
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
                    <h1 class="all-tittles">Sistema biblioteca <small>Catálogo de libros</small></h1>
                </div>
            </div>
                <style>
                    .cards {
                        display: flex;
                    }
                    .card {
                        background-color: #eee;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        display: flex;
                        flex: 1 0 50px;
                        flex-direction: column;
                        margin: 3px;

                        content {
                            flex: 1;
                            padding: 16px;
                        }

                        footer {
                            display: flex;
                            padding: 16px;
                        }

                        image {
                            border-top-left-radius: 5px;
                            border-top-right-radius: 5px;
                            width: 50%;
                        }

                        button {
                            margin: auto;
                        }
                    }           
                </style>                
            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Catálogo</h2>  
            </div>                
                <article class="cards">
                    <?php foreach ($listaCatalogoEstudiante as $resultadoLibro) { ?>
                      <article class="card">
                          <div class="text-center"><h3><?= $resultadoLibro->titulolibro ?></h3></div>
                          <img class="card-image" src="<?= PROYECTO_RECURSOS_AR . $resultadoLibro->ruta ?>" width="170px" height="200px"/>                          
                         Categoría: <?= $resultadoLibro->nombredewey ?><br>                          
                          Autor: <?= $resultadoLibro->nombresautor ?><br>
                          Editorial: <?= $resultadoLibro->nombreeditorial ?><br>
                          Ubicacion: <?= $resultadoLibro->ubicacion ?><br>                                      
                          <div class="card-content"></div>
                          <footer class="card-footer">
                              <p>
                              <div class="text-center">
                              <a href="<?=REGISTRAR_RESERVA['url'] ?>" class="btn btn-warning">Reservar            
                                          </a>
                                  </div>
                          <p>
                          </footer>
                      </article> 
                    <?php }
                    ?>  
                </article>                                                                             
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
</body>
</html>