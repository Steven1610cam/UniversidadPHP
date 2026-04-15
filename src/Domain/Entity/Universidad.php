<?php

namespace App\Domain\Entity;

class Universidad
{
    private $nombre;
    private $categoria;
    private $web;
    private $rector;
    private $email;
    private $acceso;
    private $telefono;
    private $ciudad;
    private $numeroCarreras;
    private $numSedes;

    public function __construct(
        $nombre,
        $categoria,
        $web,
        $rector,
        $email,
        $acceso,
        $telefono,
        $ciudad,
        $numeroCarreras,
        $numSedes
    ) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->web = $web;
        $this->rector = $rector;
        $this->email = $email;
        $this->acceso = $acceso;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->numeroCarreras = $numeroCarreras;
        $this->numSedes = $numSedes;
    }

    public function getNombre() { return $this->nombre; }
    public function getCategoria() { return $this->categoria; }
    public function getWeb() { return $this->web; }
    public function getRector() { return $this->rector; }
    public function getEmail() { return $this->email; }
    public function getAcceso() { return $this->acceso; }
    public function getTelefono() { return $this->telefono; }
    public function getCiudad() { return $this->ciudad; }
    public function getNumeroCarreras() { return $this->numeroCarreras; }
    public function getNumSedes() { return $this->numSedes; }
}