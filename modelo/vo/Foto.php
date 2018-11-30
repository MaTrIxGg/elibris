<?php
namespace modelo\vo;

use modelo\generico\IEntidad;

class Foto implements IEntidad{
    private $idfoto;
    private $nombre;
    private $ruta;
    private $idlibro;
    
    function getIdfoto() {
        return $this->idfoto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getIdlibro() {
        return $this->idlibro;
    }

    function setIdfoto($idfoto) {
        $this->idfoto = $idfoto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setIdlibro($idlibro) {
        $this->idlibro = $idlibro;
    }

           
  public function getCampos() {
        $lista = get_object_vars($this);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'fot_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }

}
