<?php
namespace modelo\vo;
use modelo\generico\IEntidad;

class Editorial implements IEntidad{
    
    private $ideditorial;
    private $nombreeditorial; 
    private $listaEditorial;
    
    function getIdeditorial() {
        return $this->ideditorial;
    }

    function getNombreeditorial() {
        return $this->nombreeditorial;
    }

    function getListaEditorial() {
        return $this->listaEditorial;
    }

    function setIdeditorial($ideditorial) {
        $this->ideditorial = $ideditorial;
    }

    function setNombreeditorial($nombreeditorial) {
        $this->nombreeditorial = $nombreeditorial;
    }

    function setListaEditorial($listaEditorial) {
        $this->listaEditorial = $listaEditorial;
    }

            
    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaEditorial']);
        return $lista;
    }
    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'edi_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }
}
