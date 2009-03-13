<?php

/**
 * Subclass for representing a row from the 'cobrecdoc' table.
 *
 *
 *
 * @package lib.model
 */
class Cobrecdoc extends BaseCobrecdoc
{
	protected $coddesrec="";

	public function getCoddesrec()
	{
		$resp="";
		$c=new Criteria();
		$c->add(CarecargPeer::CODRGO,self::getCodrec());
        $datos= CarecargPeer::doSelectOne($c);
        if($datos){
          $resp= $datos->getCodrgo()." - ".$datos->getNomrgo();
       }
	   return $resp;
	}
}
