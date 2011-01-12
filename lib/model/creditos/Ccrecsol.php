<?php

/**
 * Subclass for representing a row from the 'ccrecsol' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrecsol extends BaseCcrecsol
{
  public function getNroSolicitud(){
   return Herramientas::getX('id','ccsolici','numsol',self::getCcpsoliciId());
  }

  public function getNomrec(){
     return self::getCcrecaud()->getNomrec();
   //return Herramientas::getX('id','ccrecaud','nomrec',self::getCcrecaudId());
  }
}
