<?php

/**
 * Subclass for representing a row from the 'forcfgrepins'.
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
class Forcfgrepins extends BaseForcfgrepins
{
	  protected $obj=array();

	  public function getNomcue()
	  {
	  	if(self::getTipo()=='P')
	  	{
	  		$c = new Criteria();
	  		$c->add(CpdeftitPeer::CODPRE,'%'.self::getCuenta(),Criteria::LIKE);
	  		$rs = CpdeftitPeer::doSelectOne($c);
	  		if($rs)
	  			$dato = $rs->getNompre();
	  		else
	  		{

	  			$dato = "NADA";
	  		}

	  	}
	  	elseif(self::getTipo()=='I')
	  		$dato = Herramientas::getX('CODPRE','CIDEFTIT','NOMPRE',self::getCuenta());
	  	elseif(self::getTipo()=='C')
			$dato = Herramientas::getX('CODCTA','CONTABB','DESCTA',self::getCuenta());
		else
			$dato ="";

	   return $dato;
	  }

}
