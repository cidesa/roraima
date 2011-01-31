<?php

/**
 * Subclase para representar una fila de la tabla 'npcestatickets'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npcestatickets extends BaseNpcestatickets
{
	public static function getNomcon2($codigo='',$codcon)   //Para el ajax
	{
  		$c = new Criteria();
	  	$c->add(NpasiconnomPeer::CODNOM,$codigo);
	  	$c->add(NpasiconnomPeer::CODCON,$codcon);
  		$c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
		$per = NpdefcptPeer::doSelectone($c);

		if ($per){
			return $per->getNomcon();
		}else{
			return "";
		}
	}

	public function getNomcon()
	{
  		$c = new Criteria();
	  	$c->add(NpasiconnomPeer::CODNOM,self::getCodnom());
  		$c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
		$per = NpdefcptPeer::doSelectone($c);

		if ($per){
			return $per->getNomcon();
		}else{
			return "";
		}
	}


	public function getNomnom()
	{//self::getCodalm()
  		$c = new Criteria();
	  	$c->add(NpnominaPeer::CODNOM,self::getCodnom());
  		$per = NpnominaPeer::doSelectone($c);

		if ($per){
			return $per->getNomnom();
		}else{
			return "";
		}
	}

}
