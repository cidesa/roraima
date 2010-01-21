<?php

/**
 * Subclass for representing a row from the 'ccregnot' table.
 *
 *
 *
 * @package lib.model
 */
class Ccregnot extends BaseCcregnot
{
  protected $div=false;
  protected $estadoid='';

  public function getEstado()
  {
    $municipio = $this->getCcmunici();
    if($municipio){
      $estado = $municipio->getCcestado();
      if($estado) return $estado->getId();
      else return '';
    }else return '';
  }
}
