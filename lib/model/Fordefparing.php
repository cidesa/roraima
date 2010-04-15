<?php

/**
 * Subclass for representing a row from the 'fordefparing'.
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
class Fordefparing extends BaseFordefparing
{
	public function getMontoing()
	{
		$c = new Criteria();
		$c->add(ForparingPeer::CODPARING,self::getCodparing());
		$montoing = ForparingPeer::doSelectone($c);
		if ($montoing)
	  	  #return $montoing->getMontoing();
	  	  return number_format($montoing->getMontoing(),2,'.',',');
	  	  else
	  	  return number_format('0.00',2,'.',',');
	}

	public function getCodtipfin()
	{
		return Herramientas::getX_vacio('CODPARING','Forparing','codtipfin',self::getCodparing());
	}


	public function getNomext()
	{
		$c = new Criteria();
		$c->add(ForparingPeer::CODPARING,self::getCodparing());
		$c->addJoin(FortipfinPeer::CODFIN,ForparingPeer::CODTIPFIN);
		$nomext = FortipfinPeer::doSelectone($c);
		if ($nomext)
		    return $nomext->getNomext();
	    else
	        return ' ';
    }
}
