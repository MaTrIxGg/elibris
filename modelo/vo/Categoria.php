<?php
namespace modelo\vo;
use modelo\generico\IEntidad;

/**
 * Description of Categoria
 *
 * @author JOHANA
 */
class Categoria implements IEntidad{
    private $iddewey;
    private $codigo;
    private $nombredewey; 
    private $descripciondewey;
       
    function getIddewey() {
        return $this->iddewey;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombredewey() {
        return $this->nombredewey;
    }

    function getDescripciondewey() {
        return $this->descripciondewey;
    }

    function setIddewey($iddewey) {
        $this->iddewey = $iddewey;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombredewey($nombredewey) {
        $this->nombredewey = $nombredewey;
    }

    function setDescripciondewey($descripciondewey) {
        $this->descripciondewey = $descripciondewey;
    }

    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaLibro']);
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
