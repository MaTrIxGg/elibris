<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Businnes, Portfolio, Corporate"> 
        <link rel="Shortcut Icon" type="image/x-icon" href="vistaAdministrador/assets/icons/logoPrincipal.gif"/>
        <meta name="Author" content="WebThemez"> 
        <title>Elibris</title>              
        <link rel="stylesheet" href="paginaPrincipal/cssp/normalize.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/bootstrap.min.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="paginaPrincipal/elegant_font/stylef.css" />        
        <link rel="stylesheet" href="paginaPrincipal/cssp/magnific-popup.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/slider-pro.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/owl.carousel.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/owl.theme.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/owl.transitions.css">
        <link rel="stylesheet" href="paginaPrincipal/cssp/animate.css">
        <link rel="stylesheet" href="paginaPrincipal/elegant_font/stylef.css"> 
        <link rel="stylesheet" href="paginaPrincipal/cssp/stylee.css">         
    </head>
    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="status"></div>
        </div>

        <!-- Header End -->
        <header>
            <!-- Navigation Menu start-->

            <nav id="topNav" class="navbar navbar-default main-menu">
                <div class="container">
                    <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                        ☰
                    </button> 
                    <a class="navbar-brand page-scroll" href="#slider"><img class="logo" id="logo" src="paginaPrincipal/images/logoelibris.png" alt="logo"></a>
                    <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#slider">HOME</a>
                            </li>                      						
                            <li>
                                <a href="<?= CATALOGO_SESION['url'] ?>">CATÁLOGO</a>
                            </li>			
                            <li >                            
                                <a href="<?= SESION_USUARIO['url'] ?>"> INICIAR SESIÓN</a>                               
                            </li>                             
                        </ul> 
                    </div>
                </div>
            </nav>       
        </header>       
        <section class="slider-pro slider" id="slider">
            <div class="sp-slides">
                <!-- Slides -->
                <div class="sp-slide main-slides">
                    <div class="img-overlay"></div>

                    <img class="sp-image" src="paginaPrincipal/images/libro.jpg" alt="Slider 1"/>

                    <h1 class="sp-layer slider-text-big"
                        data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                        <span class="highlight-texts">Bienvenido a eLibris</span>
                    </h1>

                    <p class="sp-layer"
                       data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                        Gestión Bibliotecaria
                    </p>
                </div>
                <!-- Slides End -->

                <!-- Slides -->
                <div class="sp-slide main-slides">
                    <div class="img-overlay"></div>
                    <img class="sp-image" src="paginaPrincipal/images/slider/libro2.jpg" alt="Slider 2"/>

                    <h1 class="sp-layer slider-text-big"
                        data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
                        <span class="highlight-texts">Soluciones de Administración </span>
                    </h1>

                    <p class="sp-layer"
                       data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
                        Realizacion de préstamos y reservas de libros de la biblioteca. 
                    </p>
                </div>
                <!-- Slides End -->          
            </div>
        </section>                      
        <script src="paginaPrincipal/jsp/jquery-1.11.3.min.js"></script>
        <script src="paginaPrincipal/jsp/bootstrap.min.js"></script>
        <script src="paginaPrincipal/jsp/modernizr.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.easing.1.3.js"></script>
        <script src="paginaPrincipal/jsp/jquery.scrollUp.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.easypiechart.js"></script>
        <script src="paginaPrincipal/jsp/isotope.pkgd.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.fitvids.js"></script>
        <script src="paginaPrincipal/jsp/jquery.stellar.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.waypoints.min.js"></script>
        <script src="paginaPrincipal/jsp/wow.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.nav.js"></script>
        <script src="paginaPrincipal/jsp/imagesloaded.pkgd.min.js"></script>
        <script src="paginaPrincipal/jsp/smooth-scroll.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.magnific-popup.min.js"></script>
        <script src="paginaPrincipal/jsp/jquery.sliderPro.min.js"></script>
        <script src="paginaPrincipal/jsp/owl.carousel.min.js"></script>
        <script src="contact/jqBootstrapValidation.js"></script>
        <script src="contact/contact_me.js"></script>
        <script src="paginaPrincipal/jsp/custom.js"></script>

    </body>
</html>
