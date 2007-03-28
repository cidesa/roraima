<?php

/**
 * Subclass for representing a row from the 'nphojint' table.
 *
 *
 *
 * @package lib.model
 */
class Nphojint extends BaseNphojint
{
	public function getfFeccal()
	{
		$c = new Criteria();
		$c->add(NpasiempcontPeer::CODEMP,self::getCodemp());
		$feccal = NpasiempcontPeer::doSelectone($c);
		if ($feccal){
			return $feccal->getFeccal();
		}else{
			return ' ';
		}
	}


	public function getCodnom()
	{
		$c = new Criteria();
		$c->add(NpasiempcontPeer::CODEMP,str_pad(self::getCodemp(), 16 , ' '));		
		$nomemp = NpasiempcontPeer::doSelectone($c);
		if ($nomemp){
			return $nomemp->getCodnom();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	
	
	public function getNomcar()
	{
		// Se obtiene el codcar de la tabla Npasicaremp
		// Luego se obtiene el nombre del cargo de la tabla Npcargos

		$c = new Criteria();
		$c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
		$c->add(NpasicarempPeer::CODEMP,self::getCodemp());
		$registro = NpcargosPeer::doSelectOne($c);
		if($registro) return $registro->getNomcar();
		else return null; 
		
	}
	
	public function getCodcar()
	{
		// Se obtiene el codcar de la tabla Npasicaremp
		// Luego se obtiene el código del cargo de la tabla Npcargos

		$c = new Criteria();
		$c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
		$c->add(NpasicarempPeer::CODEMP,self::getCodemp());
		$registro = NpcargosPeer::doSelectOne($c);
		if($registro) return $registro->getCodcar();
		else return null; 
		
	}
	
	public function getNomnom()
	{
		// Se obtiene Nomnom de la tabla Npasicaremp
		
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,self::getCodemp());
		$registro = NpasicarempPeer::doSelectOne($c);
		if($registro) return $registro->getNomnom();
		else return null; 
		
		
	}
	
	public function getCodnom_duplicado()
	{
		// Se obtiene Nomnom de la tabla Npasicaremp
		
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,self::getCodemp());
		$registro = NpasicarempPeer::doSelectOne($c);
		if($registro) return $registro->getCodnom();
		else return null; 
		
		
	}
	
	
	public function getPagerOfNpvacregsalActuales($pagina)
	{
		$c = new Criteria();
		$c->add(NpvacregsalPeer::CODEMP,self::getCodemp() );
		$c->add(NpvacregsalPeer::CODCAR,self::getCodcar() );
		$c->add(NpvacregsalPeer::CODNOM,self::getCodnom() );
		$c->add(NpvacregsalPeer::STAVAC,'N' );
		$c->addAscendingOrderByColumn(NpvacregsalPeer::FECHASALIDA);
		
	    return self::getPagerOfNpvacregsalByCriteria($c,$pagina,5); 
		
	}

	public function getPagerOfNpvacregsalHistoricos($pagina)
	{
		$c = new Criteria();
		$c->add(NpvacregsalPeer::CODEMP,self::getCodemp() );
		$c->add(NpvacregsalPeer::CODCAR,self::getCodcar() );
		$c->add(NpvacregsalPeer::CODNOM,self::getCodnom() );
		$c->add(NpvacregsalPeer::STAVAC,'S' );
		$c->addDescendingOrderByColumn(NpvacregsalPeer::PERFIN);
		
	    return self::getPagerOfNpvacregsalByCriteria($c,$pagina,5); 
		
	}
	
	
	private function getPagerOfNpvacregsalByCriteria($c,$pagina,$regs)
	{
		$pager = new sfPropelPager('Npvacregsal', $regs);
	    $pager->setCriteria($c);
	    $pager->setPage($pagina);
	    $pager->init();
	    return $pager; 
		
	}
	
}
