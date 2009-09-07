<?php

/**
 * Subclass for representing a row from the 'carcpart'.
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
class Carcpart extends BaseCarcpart
{
  public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }
  public function getNomalm()
  {
  	return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }

  public function getFecord()
  {
  //	return Herramientas::getX('ORDCOM','CaOrdCom','Fecord',self::getOrdcom());
  		$c = new Criteria();
		$c->add(CaordcomPeer::ORDCOM,self::getOrdcom());
		$fec = CaordcomPeer::doSelectone($c);
		if ($fec){
			return $fec->getFecord();
		}else{
			return '';
		}
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
		return '';
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
		return '';
	}
  }
	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}
}
