<?php

/**
 * Subclass for representing a row from the 'faartcom'.
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
class Faartcom extends BaseFaartcom
{
	protected $obj = array();
	protected $desart="";
	protected $canord="0,00";
	protected $candes="0,00";
	protected $canaju="0,00";
	protected $cantot="0,00";
	protected $preart="0,00";
	protected $totart="0,00";
	protected $precioe="0,00";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getPreart($val=false)
  {
  	if (!$val)
  	{
     $resp = array();

    if (self::getCodart()!='')
    {
      $c = new Criteria();
      $c->add(FaartpvpPeer::CODART,self::getCodart());
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = $pvp->getPvpart();
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = $pvp->getPvpart();
       }
      }
    }
     return $resp;
  	}
  	else
  	{
  		return $this->preart;
  	}
  }

   public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=self::getPrecio();
    }
  }



}
