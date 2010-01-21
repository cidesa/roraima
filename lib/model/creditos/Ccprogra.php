<?php

/**
 * Subclass for representing a row from the 'ccprogra' table.
 *
 *
 *
 * @package lib.model
 */
class Ccprogra extends BaseCcprogra
{
  protected $objparpro=array();
  protected $objrecpro=array();
  protected $objcatpro=array();


     public function getNomcat(){
     	$nomcat=Programas::BuscarCatPresup(self::getCodcat());
   return $nomcat;
  }

  public function __toString(){
  	return $this->getNompro();
  }

  public function getTipoPrograma(){
   return Herramientas::getX('id','cctippro','nomtippro',self::getCctipproId());
  }



}
