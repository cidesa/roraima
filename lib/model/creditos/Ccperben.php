<?php

/**
 * Subclass for representing a row from the 'ccperben' table.
 *
 *
 *
 * @package lib.model
 */
class Ccperben extends BaseCcperben
{
  protected $objpersonas=array();
  protected $div=true;
  protected $estadoid='';
  protected $municipioid='';
  protected $nomben='';
  protected $cedrif='';

  public function getParroquia(){
   return Herramientas::getX('id','ccparroq','nompar',self::getCcparroqId());
  }

 /* public function getBeneficiario(){
   return Herramientas::getX('id','ccbenefi','nomben',self::getCcbenefiid());
  }*/

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

 public function getNomben(){
   return Herramientas::getX('id','ccbenefi','nomben',self::getCcbenefiId());
  }

    public function getCedrif(){
   return Herramientas::getX('id','ccbenefi','cedrif',self::getCcbenefiId());
  }


}
