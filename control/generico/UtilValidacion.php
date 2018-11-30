<?php

namespace control\generico;

/**
 * Description of UtilValidacion
 *
 * @author Usuario
 */
class UtilValidacion {
    public static function validar(array $reglas, array $info) {
        foreach ($reglas as $parametro => $restriccion) {
            $validaciones = explode('|', $restriccion); //Convierte una cadena de caracteres en un Array
            $dato = trim($info[$parametro]);
            foreach ($validaciones as $validar) {
                switch ($validar) {
                    case 'obligatorio':
                        if (empty($dato)) {
                            throw new ValidacionExcepcion("El campo $parametro es obligatorio", -1);
                        }
                        break;
                    case 'numero':
                        if (empty($dato)) {
                            break;
                        }
                        if (!is_numeric($info[$parametro])) {
                            throw new ValidacionExcepcion("El campo $parametro debe ser un numero", -1);
                        }
                        break;
                    case 'email':
                        if (empty($dato)) {
                            break;
                        }
                        if (!filter_var($dato, FILTER_VALIDATE_EMAIL)) {
                            throw new ValidacionExcepcion("El campo $parametro debe ser un correo valido", -1);
                        }
                        break;
                    case 'fecha':
                        if (empty($dato)) {
                            break;
                        }
                        $valores = explode('/', $dato);
                        if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
                            break;
                        }else{
                           throw new ValidacionExcepcion("El campo $parametro debe ser un correo valido", -1); 
                        }
                        break;
                }
            }
        }
    }
}
