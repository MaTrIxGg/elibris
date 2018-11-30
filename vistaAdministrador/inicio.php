<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio de sesión</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/x-icon" href="<?= PROYECTO_RECURSOS_ASSETS_ICONS?>logoPrincipal.gif" />    
        <link href="<?= PROYECTO_RECURSOS_CSSA?>bootstrap2.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="<?= PROYECTO_RECURSOS_ASSETS_CSSP?>inicioSesion.css"/>
        <script src="<?= PROYECTO_RECURSOS_JSA?>bootstrap2.min.js"></script>
        <script src="<?= PROYECTO_RECURSOS_JSA?>jquery-1.11.1.min.js"></script>       
        <script src="<?= PROYECTO_RECURSOS_ASSETS_JSP2?>sesion.js"></script>

    </head>
    <body>           
        <div class="container">            
            <div class="card card-container">                
                <img id="profile-img" class="profile-img-card" src="<?= PROYECTO_RECURSOS_ASSETS_IMG?>LogoeLibris.gif" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" method="POST" action="<?= USUARIO_AUTENTICAR['url'] ?>" >                    
                    <input type="number" id="usu_numerodocumento" name="usu_numerodocumento" class="form-control" pattern="[0-9]+" placeholder="N° Identificación" required >                                          
                    <input id="usu_clave" name="usu_clave" type="password" class="form-control" maxlength="20" minlength="5" placeholder="Contraseña" required regexp_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/">                            
                    <button type="submit"class="btn btn-lg btn-primary btn-block btn-signin btnsesion" id="bienvenida" data-href="<?= MENU['url'] ?>" data-placement="bottom">Iniciar Sesión</button> 
                </form><!-- /form -->
                <div class="text-center">
                   <a href="<?= RECUPERAR_USUARIO['url'] ?>" class="forgot-password">¿Olvidó su Contraseña?</a>     
                </div>               
            </div><!-- /card-container -->
        </div><!-- /container -->            
    </body>
</html>