<?php
namespace modelo\vo;
use modelo\generico\IEntidad;

class Autor implements IEntidad{
    
    public $idautor;
    public $nombresautor; 
    public $apellidosautor;
    public $listaAutor;
    
    function getListaAutor() {
        return $this->listaAutor;
    }
    function setListaAutor($listaAutor) {
        $this->listaAutor = $listaAutor;
    }                
    function getIdautor() {
        return $this->idautor;
    }
    function getNombresautor() {
//      ucfirst($this->nombresautor); 
        return $this->nombresautor;
    }
    function getApellidosautor() {
        return $this->apellidosautor;
    }
    function setIdautor($idautor) {
        $this->idautor = $idautor;
    }
    function setNombresautor($nombresautor) {
        $this->nombresautor = $nombresautor;
    }
    function setApellidosautor($apellidosautor) {
        $this->apellidosautor = $apellidosautor;
    }       
    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaAutor']);
        return $lista;
    }
    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'aut_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }
}
