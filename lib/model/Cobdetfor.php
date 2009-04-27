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

    $genmov=Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
    if ($genmov=='S')
    {
      $val=substr(self::getNumide(),0,4);
    }else $val="";

     return $val;
  }

  public function getNumide2(){
    $genmov=Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
    if ($genmov=='S')
    {
     $longitud=strlen(self::getNumide());
  	 $val=substr(self::getNumide(),4,$longitud);
    }else  $val=self::getNumide();


     return $val;
  }
}
