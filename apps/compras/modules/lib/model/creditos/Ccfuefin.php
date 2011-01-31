<?php

/**
 * Subclass for representing a row from the 'ccfuefin' table.
 *
 *
 *
 * @package lib.model
 */
class Ccfuefin extends BaseCcfuefin
{
  protected $codcta='';
  protected $descta='';

	public function __toString(){
    return $this->getNomfuefin().' '.$this->getAlias();

  }

  public function getNombreCompleto(){
    return $this->getNomfuefin().' '.$this->getAlias();

  }

    public function getDescta(){
   return Herramientas::getX('id','contabb','descta',self::getContabbId());
  }

    public function getCodcta(){
   return Herramientas::getX('id','contabb','codcta',self::getContabbId());
  }


}
