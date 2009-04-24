<?php

/**
 * Subclass for representing a row from the 'cobdetfor' table.
 *
 *
 *
 * @package lib.model
 */
class Cobdetfor extends BaseCobdetfor
{
  protected $genmov="";
  protected $gening="";
  protected $codtip="";
  protected $destippag="";
  protected $numide2="";

  public function getDestippag(){
     return Herramientas::getX('Id','Fatippag','Destippag',self::getFatippagId());
  }

  public function getGenmov(){
     return Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
  }

  public function getGening(){
     return Herramientas::getX('Id','Fatippag','Gening',self::getFatippagId());
  }

  public function getCodtip(){

  	 $val=substr(self::getNumide(),0,4);

     return $val;
  }

  public function getNumide2(){

     $longitud=strlen(self::getNumide());
  	 $val=substr(self::getNumide(),4,$longitud);

     return $val;
  }
}
