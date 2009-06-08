<?php

/**
 * Subclass for representing a row from the 'atdenuncias' table.
 *
 *
 *
 * @package lib.model
 */
class Atdenuncias extends BaseAtdenuncias
{

  protected $nombre = '';
  protected $unidad = '';
  protected $status = '';

  public function afterHydrate(){

    //$atsolici = $this->getAtsolici();
    $atunidad = $this->getAtunidades();
    //$this->nombre = $atsolici->getNombre();
    if($atunidad) $this->unidad = $atunidad->getDesuni();

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
