<?php

/**
 * Subclase para representar una fila de la tabla 'npconsalint'.
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
class Npconsalint extends BaseNpconsalint
{
	
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$reg = NpnominaPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomnom();
		else return '';
		
	}

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$reg = NpdefcptPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomcon();
		else return '';
		
	}
	
	
}
