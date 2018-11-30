<?php

namespace modelo\vo;
use modelo\generico\IEntidad;

/**
 * Description of Reserva
 *
 * @author JOHANA
 */
class Reserva implements IEntidad {

  public $idreserva;    
  public $idejemplar;
  public $idusuario;
  public $fechainicio;
  public $fechafin;
  public $idestado;  
  public $listaReserva;
  
  function getIdreserva() {
    return $this->idreserva;
  }

  function getIdejemplar() {
    return $this->idejemplar;
  }

  function getIdusuario() {
    return $this->idusuario;
  }

  function getFechainicio() {
    return $this->fechainicio;
  }

  function getFechafin() {
    return $this->fechafin;
  }

  function getIdestado() {
    return $this->idestado;
  }

  function getListaReserva() {
    return $this->listaReserva;
  }

  function setIdreserva($idreserva) {
    $this->idreserva = $idreserva;
  }

  function setIdejemplar($idejemplar) {
    $this->idejemplar = $idejemplar;
  }

  function setIdusuario($idusuario) {
    $this->idusuario = $idusuario;
  }

  function setFechainicio($fechainicio) {
    $this->fechainicio = $fechainicio;
  }

  function setFechafin($fechafin) {
    $this->fechafin = $fechafin;
  }

  function setIdestado($idestado) {
    $this->idestado = $idestado;
  }

  function setListaReserva($listaReserva) {
    $this->listaReserva = $listaReserva;
  }

    
  public function getCampos() {
    $lista = get_object_vars($this);
    unset($lista['listaReserva']);
    return $lista;
  }

  public function convertir(array $info, $alias = true) {
    $atributos = get_object_vars($this);
    $lista = array_keys($atributos);
    $sigla = ($alias) ? 'res_' : '';
    foreach ($lista as $campo) {
      if (isset($info[$sigla . $campo])) {
        $this->$campo = $info[$sigla . $campo];
      }
    }
  }
}
