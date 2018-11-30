<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Libro</title>
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
              <h1 class="all-tittles">Sistema biblioteca <small>Modificación Datos</small></h1>
            </div>
        </div>        
<br>
         <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li><a href="<?= REGISTRAR_LIBRO['url']?>">Nuevo libro / </li>
                      <li><a href="<?= CONSULTAR_LIBRO['url']?>">Listado de libros</a></li>
                      <li class="active">Modificar de datos Libro</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Modificación de datos del libros </div>
                <form autocomplete="off" method="POST" action="<?= MODIFICAR_LIBRO['url'].'?idlibro='.$libro->getIdlibro()?>">
                     <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <legend><strong>Información básica</strong></legend><br>
                                 </div>
                             <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro">
                        </div>                      
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">                               
                                <div class="group-material">                                      
                                    <span>Categoría</span>                                    
                               <select name="lib_iddewey" class="tooltips-general material-control" value="<?= $resultadoLibro->iddewey ?>">                                             
                                           <?php
                                          if($resultadoLibro->iddewey  == 0){
                                            ?> 
                                             <option value="-1">Seleccionar</option>
                                              <?php 
                                          }else{
                                        ?> 
                                           <option value="<?= $resultadoLibro->iddewey ?>">><?= $resultadoLibro->nombredewey ?></option>   
                                           <?php  
                                          }                                        
                                       ?>  
                                                                                                                                                       <?php 
                                            foreach ($listaCategoria2 as $resultadoCategoria2) { 
                                              if($libro->getIddewey()==$resultadoCategoria2->iddewey){
                                        ?>
                                    <option selected="" value="<?= $resultadoCategoria2->iddewey ?>"><?= $resultadoCategoria2->nombredewey ?></option>
                                        <?php        
                                              }else{
                                                
                                                ?>
                                    <option value="<?= $resultadoCategoria2->iddewey ?>"><?= $resultadoCategoria2->nombredewey ?></option>
                                    <?php
                                              }
                                              
                                            }
                                        ?>   
                                       </select>                          
                                </div>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-4">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Escribe el código ISBN del libro, solamente números">
                        </div> 
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <input type="number" name="lib_codigoisbn" value="<?= $libro->getCodigoisbn()?>"class="tooltips-general material-control" placeholder="Código ISBN del libro" pattern="[0-9]{1,20}" required="" maxlength="20">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Código ISBN</label>
                                </div>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <input type="text" name="lib_titulolibro"value="<?= $libro->getTitulolibro()?>"class="tooltips-general material-control" placeholder="Escribe aquí el título o nombre del libro" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ-]+{2,48}" required>
                                    <span class="highlight" ></span>
                                    <span class="bar" ></span>
                                    <label>Título</label>
                                </div>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elige el autor del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <span>Autor</span>
                                    <select name="lib_idautor"class="tooltips-general material-control" value="<?= $resultadoLibro->iddewey ?>">
                                         <?php
                                          if($resultadoLibro->idautor  == 0){
                                            ?> 
                                             <option value="-1">Seleccionar</option>
                                              <?php 
                                          }else{
                                        ?> 
                                           <option value="<?= $resultadoLibro->idautor ?>">><?= $resultadoLibro->nombresautor ?></option>   
                                           <?php  
                                          }                                        
                                       ?>  
                                                                                                                                                       <?php 
                                            foreach ($listaAutor2 as $resultadoAutor2) { 
                                              if($libro->getIdautor()==$resultadoAutor2->idautor){
                                        ?>
                                    <option selected="" value="<?= $resultadoAutor2->idautor ?>"><?= $resultadoAutor2->nombresautor ?></option>
                                        <?php        
                                              }else{
                                                
                                                ?>
                                    <option value="<?= $resultadoAutor2->idautor ?>"><?= $resultadoAutor2->nombresautor ?></option>
                                    <?php
                                              }
                                              
                                            }
                                        ?>                                           
                                   </select>                                                                                   
                                </div>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elija la foto del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <input type="file" name="lib_foto" value="" class="tooltips-general material-control" placeholder=""  maxlength="50">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>                                 
                                    <label>Foto</label>
                                </div>
                                <legend><strong>Otros datos</strong></legend><br>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elige la editorial del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <span>Editorial</span>
                                    <select name="lib_ideditorial"class="tooltips-general material-control" value="<?= $resultadoLibro->ideditorial ?>">
                                       <?php
                                          if($resultadoLibro->ideditorial  == 0){
                                            ?> 
                                             <option value="-1">Seleccionar</option>
                                              <?php 
                                          }else{
                                        ?> 
                                           <option value="<?= $resultadoLibro->ideditorial ?>">><?= $resultadoLibro->nombreeditorial ?></option>   
                                           <?php  
                                          }                                        
                                       ?>  
                                                                                                                                                       <?php 
                                            foreach ($listaEditorial2 as $resultadoEditorial2) { 
                                              if($libro->getIdeditorial()==$resultadoEditorial2->ideditorial){
                                        ?>
                                    <option selected="" value="<?= $resultadoEditorial2->ideditorial ?>"><?= $resultadoEditorial2->nombreeditorial ?></option>
                                        <?php        
                                              }else{
                                                
                                                ?>
                                    <option value="<?= $resultadoEditorial2->ideditorial ?>"><?= $resultadoEditorial2->nombreeditorial ?></option>
                                    <?php
                                              }
                                              
                                            }
                                        ?>   
                                    </select>                                      
                                </div>                                                                                                          
                                <legend><strong>Estado físico y ubicación</strong></legend><br>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="¿Dónde se ubicara el libro?">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <input type="text" name="lib_ubicacion"value="<?= $libro->getUbicacion()?>"class="material-control tooltips-general" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ-]+{2,48}" placeholder="Escribe aquí la ubicación del libro" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Ubicación</label>
                                </div>
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elige el origén del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <span>Origén</span>
                                    <select name="lib_idcargo"class="tooltips-general material-control" value="<?= $resultadoLibro->idcargo ?>">
                                        <?php
                                          if($resultadoLibro->idcargo  == 0){
                                            ?> 
                                             <option value="-1">Seleccionar</option>
                                              <?php 
                                          }else{
                                        ?> 
                                           <option value="<?= $resultadoLibro->idcargo ?>">><?= $resultadoLibro->nombrecargo ?></option>   
                                           <?php  
                                          }                                        
                                       ?>  
                                                                                                                                                       <?php 
                                            foreach ($listaCargo2 as $resultadoCargo2) { 
                                              if($libro->getIdcargo()==$resultadoCargo2->idcargo){
                                        ?>
                                    <option selected="" value="<?= $resultadoCargo2->idcargo ?>"><?= $resultadoCargo2->nombrecargo ?></option>
                                        <?php        
                                              }else{
                                                
                                                ?>
                                    <option value="<?= $resultadoCargo2->idcargo ?>"><?= $resultadoCargo2->nombrecargo ?></option>
                                    <?php
                                              }
                                              
                                            }
                                        ?>                                 
                                    </select>  
                                </div>  
                                </div>
                         <div class="col-xs-offset-2 col-md-8 col-sm-offset-3">
                            <img src="<?= PROYECTO_RECURSOS_ASSETS_ICONS ?>informacion.png" class="material-control tooltips-general" style="width:2.5%;" data-toggle="tooltip" data-placement="top" title="Elige el estado del libro">
                        </div>  
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <span>Estado</span>
                                     <select name="lib_idestado"class="tooltips-general material-control" value="<?= $resultadoLibro->idestado ?>">
                                         <?php
                                          if($resultadoLibro->idestado  == 0){
                                            ?> 
                                             <option value="-1">Seleccionar</option>
                                              <?php 
                                          }else{
                                        ?> 
                                           <option value="<?= $resultadoLibro->idestado ?>">><?= $resultadoLibro->nombreestado?></option>   
                                           <?php  
                                          }                                        
                                       ?>  
                                                                                                                                                       <?php 
                                            foreach ($listaEstado2 as $resultadoEstado2) { 
                                              if($libro->getIdestado()==$resultadoEstado2->idestado){
                                        ?>
                                    <option selected="" value="<?= $resultadoEstado2->idestado ?>"><?= $resultadoEstado2->nombreestado ?></option>
                                        <?php        
                                              }else{
                                                
                                                ?>
                                    <option value="<?= $resultadoEstado2->idestado ?>"><?= $resultadoEstado2->nombreestado ?></option>
                                    <?php
                                              }
                                              
                                            }
                                        ?>   
                                    </select>                                     
                                </div>
                                </div>
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <p class="text-center">
                                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
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
</body>
</html>