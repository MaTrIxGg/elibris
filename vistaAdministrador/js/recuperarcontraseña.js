
var recuperarContraseña = {
    constructor: function () {
        $('#frm').on('submit', recuperarContraseña.validarCorreo);
        $('#frm2').on('submit', recuperarContraseña.ActualizarClaveRec);
    },
    validarCorreo: function (e) {
        e.preventDefault();
        var formulario = $('#frm');
        var correo = formulario.find('#usu_correo').val();
        if (correo === '') {
            app.mensaje({codigo: -1, mensaje: 'Debe ingresar un correo'});
            return;
        }
        var data = {'usu_correo': correo, 'opcion':'validarCorreo'};
        app.ajax('control/UsuarioControl.php?opcion=validarCorreo', data, recuperarContraseña.respuestaValCorreo);
    },
    respuestaValCorreo: function (respuesta) {

        if (respuesta.codigo < 0) {
            app.mensaje(respuesta);
            alert("El correo no es valido, la operacion se ha cancelado");
            return;
        }else{
            alert("El correo se ha enviado correctamente");
            location.href="../vistaAdministrador/cambioClaveRec.php";
        }
    },
    ActualizarClaveRec: function (e) {
        e.preventDefault();
        //console.log('Deteniendo');
        var formulario = $('#frm2');
        var data = {};
        data.codigover = formulario.find('#codigo').val();
        data.clave = formulario.find('#usu_clave').val();

        app.ajax('../control/UsuarioControl.php?opcion=ActualizarClaveRec', data, recuperarContraseña.respuestaActualizarClaveRec);

    }, respuestaActualizarClaveRec: function (respuesta) {
        if (respuesta.codigo < 0) {
            app.mensaje(respuesta);
            alert("El codigo de verificacion no es valido");
            return;
        }else{
            alert("La clave se ha cambiado correctamente");
            location.href="../vistaAdministrador/cambioClaveRec.php";
            $('#frm2 input').val('');
        }
        
    }
};
recuperarContraseña.constructor();

