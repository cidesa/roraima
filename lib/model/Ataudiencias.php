<?php

/**
 * Subclass for representing a row from the 'ataudiencias' table.
 *
 *
 *
 * @package lib.model
 */
class Ataudiencias extends BaseAtaudiencias
{
  protected $unidad = '';
  protected $nombre = '';
  protected $cedula = '';
  protected $status = '';

  public function afterHydrate(){

    $atciudadano = $this->getAtciudadano();
    $atunidad = $this->getAtunidades();
    if($atunidad) $this->unidad = $atunidad->getDesuni();
    if($atciudadano) $this->nombre = $atciudadano->getNomsol();
    if($atciudadano) $this->cedula = $atciudadano->getCedsol();

  }

  public function getStatus()
  {
    $this->status = parent::getStatus();
    $arrayanalizado = Constantes::listaAtencionCiudadanos();
    if(array_key_exists($this->status,$arrayanalizado)) return $arrayanalizado[$this->status];
    return $this->status;

  }

  public function getStatus_()
  {
    return $this->status;
  }

}
