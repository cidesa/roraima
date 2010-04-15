<?php

/**
 * Subclass for representing a row from the 'cobrecdoc'.
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
