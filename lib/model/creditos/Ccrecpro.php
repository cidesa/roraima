<?php

/**
 * Subclass for representing a row from the 'ccrecpro' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrecpro extends BaseCcrecpro
{
  protected $objrecpro=array();

  public function getNombrePrograma(){
   return Herramientas::getX('id','ccprogra','nompro',self::getCcprograid());
  }

  public function getNompro(){
   return $this->getNombrePrograma();
  }

  public function getNomrec(){
   return Herramientas::getX('id','ccrecaud','nomrec',self::getCcrecaudId());
  }
}
