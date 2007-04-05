<?php

/**
 * Subclass for representing a row from the 'ocdefper' table.
 *
 *
 *
 * @package lib.model
 */
class Ocdefper extends BaseOcdefper
{
	public function getDestipcar()
	{
		$c = new Criteria();
		$c->add(OctipcarPeer::CODTIPCAR,self::getCodtipcar());
		$destipcar = OctipcarPeer::doSelectone($c);
		if ($destipcar){
			return $destipcar->getDestipcar();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDestippro()
	{
		$c = new Criteria();
		$c->add(OctipproPeer::CODTIPPRO,self::getCodtippro());
		$destippro = OctipproPeer::doSelectone($c);
		if ($destippro){
			return $destippro->getDestippro();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}			
}
