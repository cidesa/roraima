<?php

/**
 * Subclass for representing a row from the 'ocdeforg'.
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
class Ocdeforg extends BaseOcdeforg
{
	public function getDestiporg()
	//***JJSG
	{
		$c = new Criteria();
		$c->add(OctiporgPeer::CODTIPORG,self::getCodtiporg());
		$destiporg = OctiporgPeer::doSelectone($c);
		if ($destiporg){
			return $destiporg->getDestiporg();
		}else{
			return ' ';
		}
	}
	public function getNompai()
	//***JJSG
	{
		$c = new Criteria();
		$c->add(OcpaisPeer::CODPAI,self::getCodpai());
		$nompai = OcpaisPeer::doSelectone($c);
		if ($nompai){
			return $nompai->getNompai();
		}else{
			return ' ';
		}
	}
	public function getNomedo()
	//***JJSG
	{
		$c = new Criteria();
		$c->add(OcestadoPeer::CODEDO,self::getCodedo());
		$nomedo = OcestadoPeer::doSelectone($c);
		if ($nomedo){
			return $nomedo->getNomedo();
		}else{
			return ' ';
		}
	}
	public function getNomciu()
	//***JJSG
	{
		$c = new Criteria();
		$c->add(OcciudadPeer::CODCIU,self::getCodciu());
		$nomciu = OcciudadPeer::doSelectone($c);
		if ($nomciu){
			return $nomciu->getNomciu();
		}else{
			return ' ';
		}
	}		
}
