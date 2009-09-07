<?php

/**
 * Subclase para representar una fila de la tabla 'npislr'.
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
class Npislr extends BaseNpislr
{
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		//$c->addJoin(NpdefcptPeer::CODCON,NpcestaticketsPeer::CODCON);
		$codigo = NpnominaPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomnom();
		}else{
			return ' ';
		}
	}

   public function getNomconpor()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodconpor());
		$codigo = NpdefcptPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
		}else{
			return ' ';
		}
	}

	public function getNomconimp()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodconimp());
		$codigo = NpdefcptPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
  		}else{
	      return ' ';
  		}
    }	    
    
    
}
