<?php

namespace modelo\vo;

use modelo\generico\IEntidad;

/**
 * Description of prestamo
 *
 * @author JOHANA
 */
class Prestamo implements IEntidad {

  private $idprestamo;  
  private $idlibro;
  private $idejemplar;
  private $idusuario;
  private $fechaprestamo;
  private $fechalimite;
//  private $fechadevolucion;
  private $idestado;
  private $listaPrestamo;
  
  function getIdprestamo() {
    return $this->idprestamo;
  }

  function getIdreserva() {
    return $this->idreserva;
  }

  function getIdlibro() {
    return $this->idlibro;
  }

  function getIdejemplar() {
    return $this->idejemplar;
  }

  function getIdusuario() {
    return $this->idusuario;
  }

  function getFechaprestamo() {
    return $this->fechaprestamo;
  }

  function getFechalimite() {
    return $this->fechalimite;
  }

//  function getFechadevolucion() {
//    return $this->fechadevolucion;
//  }

  function getIdestado() {
    return $this->idestado;
  }

  function getListaPrestamo() {
    return $this->listaPrestamo;
  }

  function setIdprestamo($idprestamo) {
    $this->idprestamo = $idprestamo;
  }

  function setIdreserva($idreserva) {
    $this->idreserva = $idreserva;
  }

  function setIdlibro($idlibro) {
    $this->idlibro = $idlibro;
  }

  function setIdejemplar($idejemplar) {
    $this->idejemplar = $idejemplar;
  }

  function setIdusuario($idusuario) {
    $this->idusuario = $idusuario;
  }

  function setFechaprestamo($fechaprestamo) {
    $this->fechaprestamo = $fechaprestamo;
  }

  function setFechalimite($fechalimite) {
    $this->fechalimite = $fechalimite;
  }

//  function setFechadevolucion($fechadevolucion) {
//    $this->fechadevolucion = $fechadevolucion;
//  }

  function setIdestado($idestado) {
    $this->idestado = $idestado;
  }

  function setListaPrestamo($listaPrestamo) {
    $this->listaPrestamo = $listaPrestamo;
  }

  
  public function getCampos() {
    $lista = get_object_vars($this);
    unset($lista['listaPrestamo']);
    return $lista;
  }

  public function convertir(array $info, $alias = true) {
    $atributos = get_object_vars($this);
    $lista = array_keys($atributos);
    $sigla = ($alias) ? 'pre_' : '';
    foreach ($lista as $campo) {
      if (isset($info[$sigla . $campo])) {
        $this->$campo = $info[$sigla . $campo];
      }
    }
  }

}
