<?php

/**
 * Subclass for representing a row from the 'atciudadano' table.
 *
 *
 *
 * @package lib.model
 */
class Atciudadano extends BaseAtciudadano
{
  protected $municipios = array();
  protected $parroquias = array();
  protected $cedsol = '';
  protected $nomsol = '';
  protected $cedben = '';
  protected $nomben = '';

  public function afterHydrate()
  {
    $this->cedsol = $this->getCedciu();
    $this->nomsol = $this->getNomciu().' '.$this->getApeciu();
    $this->cedben = $this->getCedciu();
    $this->nomben = $this->getNomciu().' '.$this->getApeciu();

  }

  public function __toString()
  {
    return $this->getNomciu().' '.$this->getApeciu();
  }

}
