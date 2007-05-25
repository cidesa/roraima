<?php

/**
 * Subclass for representing a row from the 'caartrcp' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartrcp extends BaseCaartrcp
{
  public function getDesart()
  {
  	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());  	
  }
  
  public function getDesfal()
  {
  	$c = new Criteria();
	$c->add(CamotfalPeer::CODFAL,self::getCodfal());
	$c->add(CamotfalPeer::TIPFAL,'RCP');
	$des = CamotfalPeer::doSelectone($c);
	if ($des){		
		return $des->getDesfal();
	}else{
		return '';
	}  	
  }
  
  public function getCanord()
  {
  	//Select canord-canaju from caartord where OrdCom='" + DatosRecep(1).Text + "' and Codart='" + ObtenerValorRegistro(CaArtRcp!CodArt) + "'"
    $c = new Criteria();
	$c->add(CaartordPeer::ORDCOM,self::getOrdcom());
	$c->add(CaartordPeer::CODART,self::getCodart());
	$des = CaartordPeer::doSelect($c);
	if ($des){
		$canord = $des[0]->getCanord();
		$canaju = $des[0]->getCanaju();
		$valor = $canord - $canaju;
		return $valor;
	}else{
		return '0';
	}  	
  }
  
  public function getCanfal()
  {
  	$canfal= self::getCanord() - self::getCanrec() - self::getCandev();
	return $canfal;
  }

  public function getCostos()
  {
  	$costo=0;
	if (self::getCanrec()!=0  and  self::getMontot()!=0)
  	{
      $costo = (self::getMontot() + self::getMondes() - self::getMonrgo())/self::getCanrec();
 	}
	return $costo;
  }
}
