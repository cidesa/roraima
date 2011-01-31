<?php

/**
 * Subclass for representing a row from the 'ccparroq' table.
 *
 *
 *
 * @package lib.model
 */
class Ccparroq extends BaseCcparroq
{
  protected $div=false;
  protected $estadoid='';
  protected $municipioid='';

  public function __toString(){
    return $this->getNompar();
  }

  public function getNombreMunicipio(){
   return Herramientas::getX('id','ccmunici','nommun',self::getCcmuniciId());
  }

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
