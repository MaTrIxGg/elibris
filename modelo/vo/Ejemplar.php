<?php

namespace modelo\vo;
use modelo\generico\IEntidad;

/**
 * Description of ejemplar
 *
 * @author JOHANA
 */
class Ejemplar implements IEntidad {

    private $idejemplar;
    private $codigounico;
    private $idlibro;
    private $fechaingreso; 
    private $idestado;
    private $descripcion;        
    private $listaEjemplar;

    function getIdejemplar() {
        return $this->idejemplar;
    }

    function getCodigounico() {
        return $this->codigounico;
    }

    function getIdlibro() {
        return $this->idlibro;
    }

    function getFechaingreso() {
        return $this->fechaingreso;
    }

    function getIdestado() {
        return $this->idestado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getListaEjemplar() {
        return $this->listaEjemplar;
    }

    function setIdejemplar($idejemplar) {
        $this->idejemplar = $idejemplar;
    }

    function setCodigounico($codigounico) {
        $this->codigounico = $codigounico;
    }

    function setIdlibro($idlibro) {
        $this->idlibro = $idlibro;
    }

    function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }

    function setIdestado($idestado) {
        $this->idestado = $idestado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setListaEjemplar($listaEjemplar) {
        $this->listaEjemplar = $listaEjemplar;
    }

    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaEjemplar']);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'eje_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }

}
