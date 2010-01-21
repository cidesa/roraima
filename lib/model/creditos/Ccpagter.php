<?php

/**
 * Subclass for representing a row from the 'ccpagter' table.
 *
 *
 *
 * @package lib.model
 */
class Ccpagter extends BaseCcpagter
{
    protected $div=true;
    protected $estadoid='';
    protected $municipioid='';
    protected $tipupsid='';
    protected $perpre='';
    protected $rifter='';
    protected $objbenefi=array();

  public function getNombreParroquia(){
   return Herramientas::getX('id','ccparroq','nompar',self::getCcparroqid());
  }

  public function __toString(){
   return $this->getNomben();
  }

  public function getCedrifcue(){
    return $this->getRifter();
  }

  public function getCcperpreId(){
    return $this->getCcperpre_id();
  }

public function getTipups()
  {
    $perpre = $this->getCcperpre_id();
    if($perpre){
      $tipoups = $perpre->getCctipups();
      if($tipoups) return $tipoups>getId();
      else return '';
    }else return '';
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
