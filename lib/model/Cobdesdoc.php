<?php

/**
 * Subclass for representing a row from the 'cobdesdoc'.
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
class Cobdesdoc extends BaseCobdesdoc
{
	public function getCoddesdto()
	{
		$resp="";
		$c=new Criteria();
		$c->add(FadesctoPeer::CODDESC,self::getCoddes());
        $datos= FadesctoPeer::doSelectOne($c);
        if($datos){
          $resp= $datos->getCoddesc()." - ".$datos->getDesdesc();
       }
	   return $resp;
	}
}
