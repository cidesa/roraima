<?php

/**
 * Subclass for representing a row from the 'ccanacre' table.
 *
 *
 *
 * @package lib.model
 */
class Ccanacre extends BaseCcanacre
{
     protected $objactivi=array();
     protected $numexp="";
     protected $nomben="";
     protected $nomact="";
     protected $desact="";
     protected $fecasi='';
     protected $feccul='';
     protected $resact="";
     protected $obsres="";
     protected $ccclaactid=0;
     protected $estatu="seleccione";
     protected $idact=0;
    // protected $cccreditid=0;


  public function getNumexp(){
    return Herramientas::getX('id','cccredit','numexp',self::getCccreditId());
  }

  public function getNomben(){
    return Herramientas::getX('id','cccredit','nomben',self::getCccreditId());
  }

  public function getCedana(){
    return Herramientas::getX('id','ccanalis','cedana',self::getCcanalisId());
  }

  public function getNomana(){
    return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisId());
  }


   public function getCedula(){
   return Herramientas::getX('id','ccanalis','cedana',self::getCcanalisId());
  }

   public function getNombre(){
   return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisId());
  }


}
