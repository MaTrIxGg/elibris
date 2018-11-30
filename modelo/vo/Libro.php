<?php

namespace modelo\vo;
use modelo\generico\IEntidad;

/**
 * Description of Libro
 *
 * @author JOHANA
 */
class Libro implements IEntidad {

    private $idlibro;
    private $iddewey;
    private $codigoisbn;
    private $titulolibro;
    private $idautor; 
    //private $foto;
    private $ideditorial;    
    private $ubicacion;
    private $idcargo; 
    private $idestado; 
    private $listaFotos = array();
    
    public function __construct($info = array()) {
        if (!empty($info)) {
            $this->convertir($info);
        }
    }
    
    function getIdlibro() {
        return $this->idlibro;
    }

    function getIddewey() {
        return $this->iddewey;
    }

    function getCodigoisbn() {
        return $this->codigoisbn;
    }

    function getTitulolibro() {
        return $this->titulolibro;
    }

    function getIdautor() {
        return $this->idautor;
    }

//    function getFoto() {
  //      return $this->foto;
    //}

    function getIdeditorial() {
        return $this->ideditorial;
    } 

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getIdcargo() {
        return $this->idcargo;
    }

    function getIdestado() {
        return $this->idestado;
    }
    function getListaFotos() {
        return $this->listaFotos;
    }

    function setIdlibro($idlibro) {
        $this->idlibro = $idlibro;
    }

    function setIddewey($iddewey) {
        $this->iddewey = $iddewey;
    }

    function setCodigoisbn($codigoisbn) {
        $this->codigoisbn = $codigoisbn;
    }

    function setTitulolibro($titulolibro) {
        $this->titulolibro = $titulolibro;
    }

    function setIdautor($idautor) {
        $this->idautor = $idautor;
    }

    //function setFoto($foto) {
      //  $this->foto = $foto;
    //}
    function setIdeditorial($ideditorial) {
        $this->ideditorial = $ideditorial;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    function setIdestado($idestado) {
        $this->idestado = $idestado;
    }
  
    function setListaFotos($listaFotos) {
        $this->listaFotos = $listaFotos;
    }
    
    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaFotos']);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'lib_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }

}
