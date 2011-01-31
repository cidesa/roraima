<?php

/**
 * Subclass for representing a row from the 'ccgescob' table.
 *
 *
 *
 * @package lib.model
 */
class Ccgescob extends BaseCcgescob
{
  protected $numexp="";
     protected $nomben="";
     protected $nomana="";
     protected $cedana="";
     protected $ccanalis_id="";

    public function getNumexp(){
    return Herramientas::getX('id','cccredit','numexp',self::getCccreditId());
  }

  public function getNomben(){
    return Herramientas::getX('id','cccredit','nomben',self::getCccreditId());
  }

  public function getCedana(){
    return Herramientas::getX('id','ccanalis','cedana',self::getCcanalisid());
  }

  public function getNomana(){
    return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisid());
  }



}
