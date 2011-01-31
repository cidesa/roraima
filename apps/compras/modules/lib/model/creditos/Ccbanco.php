<?php

/**
 * Subclass for representing a row from the 'ccbanco' table.
 *
 *
 *
 * @package lib.model
 */
class Ccbanco extends BaseCcbanco
{
  protected $div=false;
  protected $estadoid='';
  protected $municipioid='';


  public function __toString(){
    return $this->getNomban();
  }

public function getMunicipio()
  {
    $parroquia = $this->getCcparroq();
    if($parroquia){
      $municipio = $parroquia->getCcmunici();
      if($municipio) return $municipio->getId();
      else return '';
    }else return '';
  }

  public function getEstado()
  {
    $parroquia = $this->getCcparroq();
    if($parroquia){
      $municipio = $parroquia->getCcmunici();
      if($municipio) return $municipio->getCcestadoId();
      else return '';
    }else return '';
  }

  public function getNombreParroquia(){
   return Herramientas::getX('id','ccparroq','nompar',self::getCcparroqid());
  }

}
