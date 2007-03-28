<?php

/**
 * Subclass for representing a row from the 'fordefpry' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefpry extends BaseFordefpry
{
	public function getFrepagcon()
	{
		$data = parent::getProacc();
		if($data=='P') return 'Proyecto';
		if($data=='A') return 'Acción Centralizada';
	}

	public function getDesdir()
	{
		$c = new Criteria();
		$c->add(FordefdirecPeer::CODDIR,self::getCoddir());
		$desdir = FordefdirecPeer::doSelectone($c);
		if ($desdir){
			return $desdir->getDesdir();
		}else{
			return '<!Registro no Encontrado o Vacio!>';
		}
	}
	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,str_pad(self::getCodemp(), 16 , ' '));
		$nomemp = NpasicarempPeer::doSelectone($c);
		if ($nomemp){
			return $nomemp->getNomemp();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}

	public function getDescat()
	{
		$c = new Criteria();
		$c->add(FordefcatprePeer::CODCAT,self::getUniejepri());
		$descat = FordefcatprePeer::doSelectone($c);
		if ($descat){
			return $descat->getDescat();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}

	public function getDesequ()
	{
		$c = new Criteria();
		$c->add(FordefequPeer::CODEQU,self::getCodequ());
		$desequ = FordefequPeer::doSelectone($c);
		if ($desequ){
			return $desequ->getDesequ();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}


	public function getDessubobj()
	{
		$c = new Criteria();
		$c->add(FordefsubobjPeer::CODEQU,self::getCodequ());
		$dessubobj = FordefsubobjPeer::doSelectone($c);
		if ($dessubobj){
			return $dessubobj->getDessubobj();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDessubsubobj()
	{
		$c = new Criteria();
		$c->add(FordefsubsubobjPeer::CODEQU,self::getCodequ());
		$dessubsubobj = FordefsubsubobjPeer::doSelectone($c);
		if ($dessubsubobj){
			return $dessubsubobj->getDessubsubobj();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDessta()
	{
		$c = new Criteria();
		$c->add(FordefstaPeer::CODSTA,self::getCodsta());
		$dessta = FordefstaPeer::doSelectone($c);
		if ($dessta){
			return $dessta->getDessta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}		
}
