<?php

/**
 * Subclass for performing query and update operations on the 'bnubibie' table.
 *
 * 
 *
 * @package lib.model
 */ 
class BnubibiePeer extends BaseBnubibiePeer
{
	public static function getDesUbi($codubi)
	{
		$c = new Criteria();
		$c->add(self::CODUBI,rtrim($codubi).' %',Criteria::LIKE);
		return self::doSelect($c);
		
	}
	
    public static  function getNomubicac($codubi)
	{
		$c = new Criteria();
		$c->add(self::CODUBI,str_pad($codubi, 30 , ' '));
		$des = self::doSelectone($c);
		if ($des){
			return $des->getDesubi();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
}
