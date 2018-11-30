<?php

namespace modelo\vo;

use modelo\generico\IEntidad;

/**
 * Description of Cargo
 *
 * @author Usuario
 */
class Cargo implements IENTIDAD {

    private $idcargo;
    private $nombrecargo;
    private $listaCargo; 
    
    function getIdcargo() {
        return $this->idcargo;
    }

    function getNombrecargo() {
        return $this->nombrecargo;
    }

    function setIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    function setNombrecargo($nombrecargo) {
        $this->nombrecargo = $nombrecargo;
    }
    
   
    
    function getListaCargo() {
        return $this->listaCargo;
    }

    function setListaCargo($listaCargo) {
        $this->listaCargo = $listaCargo;
    }
        
    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaCargo']);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'car_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }



}
