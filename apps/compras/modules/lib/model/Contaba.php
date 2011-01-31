<?php

/**
 * Subclass for representing a row from the 'contaba' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Contaba extends BaseContaba{
	protected $grids=array();
	protected $descta = "";
	protected $descta2 = "";
	protected $esqori = "";
	protected $esqdes = "";


  public function afterHydrate(){
    $this->descta = Herramientas::getX('CODCTA','Contabb','descta',self::getCodresant());
    $this->descta2 = Herramientas::getX('CODCTA','Contabb','descta',self::getCodres());
}

  public function getCodemp(){
  	return sfContext::getInstance()->getUser()->getAttribute('empresa');
  }

  public function getNomemp(){
	  	$c= new Criteria();
	    $c->add(EmpresaUserPeer::CODEMP,sfContext::getInstance()->getUser()->getAttribute('empresa'));

		$empresa = EmpresaUserPeer::doSelectOne($c);

		if($empresa) return $empresa->getNomemp();
		else return '';
	}

  public function getFecini2($format = 'd/m/Y'){
		return parent::getFecini($format);
  }

  public function getFeccie2($format = 'd/m/Y'){
		return parent::getFeccie($format);
  }

}
