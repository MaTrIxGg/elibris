<?php

namespace modelo\vo;
use modelo\generico\IEntidad;

class usuario implements IEntidad{
    private $idusuario;
    private $idtipodocumento; 
    private $numerodocumento; 
    private $nombresusuario;
    private $apellidosusuario;
    private $fechanacimiento; 
    private $correo;
    private $telefono;    
    private $rol;
    private $clave;
    private $idestado;
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getIdtipodocumento() {
        return $this->idtipodocumento;
    }

    function getNumerodocumento() {
        return $this->numerodocumento;
    }

    function getNombresusuario() {
        return $this->nombresusuario;
    }

    function getApellidosusuario() {
        return $this->apellidosusuario;
    }

    function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getRol() {
        return $this->rol;
    }

    function getClave() {
        return $this->clave;
    }

    function getIdestado() {
        return $this->idestado;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setIdtipodocumento($idtipodocumento) {
        $this->idtipodocumento = $idtipodocumento;
    }

    function setNumerodocumento($numerodocumento) {
        $this->numerodocumento = $numerodocumento;
    }

    function setNombresusuario($nombresusuario) {
        $this->nombresusuario = $nombresusuario;
    }

    function setApellidosusuario($apellidosusuario) {
        $this->apellidosusuario = $apellidosusuario;
    }

    function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setIdestado($idestado) {
        $this->idestado = $idestado;
    }

        
    
    
     /**
     *
     * @var array 
     */
    private $listaCerdos;
    
    function getListaCerdos() {
        return $this->listaCerdos;
    }

    function setListaCerdos($listaCerdos) {
        $this->listaCerdos = $listaCerdos;
    }

        

    public function getCampos() {
        $lista = get_object_vars($this);
        unset($lista['listaCerdos']);
        return $lista;
    }

    public function convertir(array $info, $alias = true) {
        $atributos = get_object_vars($this);
        $lista = array_keys($atributos);
        $sigla = ($alias) ? 'usu_' : '';
        foreach ($lista as $campo) {
            if (isset($info[$sigla . $campo])) {
                $this->$campo = $info[$sigla . $campo];
            }
        }
    }

}
