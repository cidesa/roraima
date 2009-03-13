<?php

/**
 * Subclass for representing a row from the 'cobdesdoc' table.
 *
 *
 *
 * @package lib.model
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
