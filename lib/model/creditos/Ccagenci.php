<?php

/**
 * Subclass for representing a row from the 'ccagenci' table.
 *
 *
 *
 * @package lib.model
 */
class Ccagenci extends BaseCcagenci
{
  protected $div=false;
  protected $estadoid='';
  protected $municipioid='';

  public function getNombreParroquia(){
   return Herramientas::getX('id','ccparroq','nompar',self::getCcparroqId());
  }


  public function getNombreBanco(){
   return Herramientas::getX('id','ccbanco','nomban',self::getCcbancoid());
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



}
