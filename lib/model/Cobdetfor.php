<?php

/**
 * Subclass for representing a row from the 'cobdetfor'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
