<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cambiar Clave</title>
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
                        <li><a href="<?= MENU_DOCENTE['url'] ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Inicio</a></li>                        
                        <li>    
                                <li><a href="<?= CONSULTAR_LIBRO_DOCENTE['url'] ?>"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Libros</a></li>
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">                               
                                <li><a href="<?= CONSULTAR_PRESTAMO_DOCENTE['url'] ?>"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp;Lista de Préstamos</a></li>                              
                                <li><a href="<?= CONSULTAR_RESERVA_DOCENTE['url'] ?>"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;Lista de Reservas</a></li>
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
            </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema biblioteca <small>Configuración de usuario</small></h1>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Modificar clave de cuenta</div>                
                    <form method="POST" action="<?=GUARDAR_CLAVE_USUARIO['url'] ?>" autocomplete="off"> 
                    <div class="row">
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Escriba la clave actual de la cuenta">
                        </div>
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="password" name="usu_clave_actual" class="material-control tooltips-general" maxlength="20" minlength="5" placeholder="Ingrese clave actual" required regexp_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Clave actual</label>
                            </div>
                       </div>
                            <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Escriba la nueva clave">
                        </div>
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="password" name="usu_clave" class="material-control tooltips-general" maxlength="20" minlength="5" placeholder="Ingrese la clave nueva" required regexp_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nueva clave</label>
                            </div>
                           </div>
                            <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Escriba de nuevo la clave nueva">
                        </div>
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <div class="group-material">
                               <input type="password" name="usu_repetir_clave" class="material-control tooltips-general" maxlength="20" minlength="5" placeholder="Confirmar la clave nueva" required regexp_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Repetir clave</label>
                            </div>
                           </div>                            
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" id="btnGuardar" class="btn btn-primary" data-placement="bottom"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>                                                
                            </p> 
                       </div>
                   </div>
                </form>
            </div>
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        <form method="post" action="<?= GUARDAR_CLAVE_USUARIO['url'] ?>"> 
            <div id="contenedor">
                
                <h2 align="left">MODIFICAR CLAVE</h2><br>

                <label>Clave Actual</label>
                <input type="password" name="usu_clave_actual" placeholder="Ingresar clave actual"class="form-control" /> <br>
                <label>Nueva Clave</label> 
                <input type="password" name="usu_clave" class="form-control" placeholder="Ingresar clave nueva"/> <br>
                <label>Repetir Clave</label>
                <input type="password" name="usu_repetir_clave" class="form-control" placeholder="confirmar clave nueva"/> <br>
                <button class="btn btn-primary btn-lg" >Guardar</button>
            </div>
            <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		</div>
        </form>
    </body>
</html>
