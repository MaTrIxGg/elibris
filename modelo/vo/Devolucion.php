<?php

namespace modelo\vo;

use modelo\generico\IEntidad;

/**
 * Description of devolucion
 *
 * @author JOHANA
 */
class Devolucion implements IEntidad {

  private $iddevolucion;    
  private $idprestamo;
  private $idusuario;
  private $idejemplar;
  private $fechadevolucion;
  private $listaDevolucion;
  
  function getIddevolucion() {
    return $this->iddevolucion;
  }

  function getIdprestamo() {
    return $this->idprestamo;
  }

  function getIdusuario() {
    return $this->idusuario;
  }

  function getIdejemplar() {
    return $this->idejemplar;
  }

  function getFechadevolucion() {
    return $this->fechadevolucion;
  }

  function getListaDevolucion() {
    return $this->listaDevolucion;
  }

  function setIddevolucion($iddevolucion) {
    $this->iddevolucion = $iddevolucion;
  }

  function setIdprestamo($idprestamo) {
    $this->idprestamo = $idprestamo;
  }

  function setIdusuario($idusuario) {
    $this->idusuario = $idusuario;
  }

  function setIdejemplar($idejemplar) {
    $this->idejemplar = $idejemplar;
  }

  function setFechadevolucion($fechadevolucion) {
    $this->fechadevolucion = $fechadevolucion;
  }

  function setListaDevolucion($listaDevolucion) {
    $this->listaDevolucion = $listaDevolucion;
  }

    
    
  public function getCampos() {
    $lista = get_object_vars($this);
    unset($lista['listaDevolucion']);
    return $lista;
  }

  public function convertir(array $info, $alias = true) {
    $atributos = get_object_vars($this);
    $lista = array_keys($atributos);
    $sigla = ($alias) ? 'dev_' : '';
    foreach ($lista as $campo) {
      if (isset($info[$sigla . $campo])) {
        $this->$campo = $info[$sigla . $campo];
      }
    }
  }

}
