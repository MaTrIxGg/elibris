<?php

namespace modelo\vo;
use modelo\generico\IEntidad;

/**
 * Description of Estado
 *
 * @author Usuario
 */
class Estado implements IENTIDAD{
    
    private $idestado;
    private $nombreestado;
    private $tabla;
    private $listaEstado;   
    
    function getIdestado() {
        return $this->idestado;
    }

    function getNombreestado() {
        return $this->nombreestado;
    }

    function getTabla() {
        return $this->tabla;
    }

    function getListaEstado() {
        return $this->listaEstado;
    }

    function setIdestado($idestado) {
        $this->idestado = $idestado;
    }

    function setNombreestado($nombreestado) {
        $this->nombreestado = $nombreestado;
    }

    function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    function setListaEstado($listaEstado) {
        $this->listaEstado = $listaEstado;
    }
    
     public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaEstado']);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'est_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }
}
