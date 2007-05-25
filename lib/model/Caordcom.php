<?php

/**
 * Subclass for representing a row from the 'caordcom' table.
 *
 *
 *
 * @package lib.model
 */
class Caordcom extends BaseCaordcom
{
 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());  	
  }

  public function getDesconpag()//Condición de pago
  {
  	$c = new Criteria();
	$c->add(CaordconpagPeer::ORDCOM,self::getOrdcom());
	$c->addJoin(CaconpagPeer::CODCONPAG,CaordconpagPeer::CODCONPAG);
	$des = CaconpagPeer::doSelectone($c);
	if ($des){
		return $des->getDesconpag();
	}else{
		return '<!Descripción no Encontrada o Vacia> ';
	}  	
  }
  public function getDesforent()//Forma de Entrega
  {
  	$c = new Criteria();
	$c->add(CaordforentPeer::ORDCOM,self::getOrdcom());
	$c->addJoin(CaforentPeer::CODFORENT,CaordforentPeer::CODFORENT);
	$des = CaforentPeer::doSelectone($c);
	if ($des){
		return $des->getDesforent();
	}else{
		return '<!Descripción no Encontrada o Vacia> ';
	}  	
  } 
  
}
