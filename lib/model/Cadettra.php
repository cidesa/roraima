<?php

/**
 * Subclass for representing a row from the 'cadettra'.
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
class Cadettra extends BaseCadettra
{
   protected $codalm="";
   protected $codubi="";
   protected $exitot=0;
   
	public function getDesart()
	{
		return Herramientas::getX('CODART','CAREGART','DESART',self::getCodart());
	}
	public function getUnimed()
	{
		return Herramientas::getX('CODART','CAREGART','UNIMED',self::getCodart());
	}

   public function getNumlotxart()
   {
    $codalm=$this->getCodalm();
    $codubi=$this->getCodubi();
    $codart=self::getCodart();

    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$codalm);
    $c->add(CaartalmubiPeer::CODUBI,$codubi);
    $c->add(CaartalmubiPeer::CODART,$codart);
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();

    foreach($datos as $obj_datos)
    {
     if ($obj_datos->getFecven()!="")
     {
        $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
     }
      else
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

    }
    return $lotes;
  }

}
