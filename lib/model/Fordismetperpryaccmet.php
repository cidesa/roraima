<?php

/**
 * Subclass for representing a row from the 'fordismetperpryaccmet'.
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
class Fordismetperpryaccmet extends BaseFordismetperpryaccmet
{
  private $cananual = '';
  private $progacum = '';
  private $acum = '';

  public function setCananual($val)
  {
	$this->cananual = $val;
  }

  public function getCananual($val=true)
  {
	if($val) return number_format($this->cananual,2,',','.');
		else return $this->cananual;
  }

  public function setProgacum($val)
  {
	$this->progacum = $val;
  }

  public function getProgacum($val=true)
  {
	if($val) return number_format($this->progacum,2,',','.');
		else return $this->progacum;
  }

  public function setAcum($val)
  {
	$this->acum = $val;
  }

  public function getAcum($val=true)
  {
	if($val) return number_format($this->acum,2,',','.');
		else return $this->acum;
  }

  public function getCanmet($val=false)
  {
	return parent::getCanmet(true);
  }

  public function getCanmeteje($val=false)
  {
	return parent::getCanmeteje(true);
  }

  public function getNompro()
  {
	return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
  }

  public function getProacc()
  {
	if (Herramientas::getX('CODPRO','Fordefpry','Proacc',self::getCodpro())=='P')
	return 'Proyecto';
	else return 'Acción Centralizada';
  }

  public function getDesaccesp()
  {
  	$c = new Criteria();
  	$c->add(FordefaccespPeer::CODPRO,self::getCodpro());
  	$c->add(FordefaccespPeer::CODACCESP,self::getCodaccesp());
  	$resultado= FordefaccespPeer::doSelectOne($c);
  	if ($resultado)
  	{
  	  return $resultado->getDesaccesp();
  	}
  	else
  	{
  	  return 'No encontrado';
  	}

  }

  public function getDesmet()
  {
  	$c = new Criteria();
  	$c->add(FordefpryaccmetPeer::CODPRO,self::getCodpro());
  	$c->add(FordefpryaccmetPeer::CODACCESP,self::getCodaccesp());
  	$c->add(FordefpryaccmetPeer::CODMET,self::getCodmet());
  	$resultado2= FordefpryaccmetPeer::doSelectOne($c);
  	if ($resultado2)
  	{
  	  return $resultado2->getDesmet();
  	}
  	else
  	{
  	  return 'No encontrado';
  	}

  }

  public function getCanmet2()
  {
  	$c = new Criteria();
  	$c->add(FordefpryaccmetPeer::CODPRO,self::getCodpro());
  	$c->add(FordefpryaccmetPeer::CODACCESP,self::getCodaccesp());
  	$resultado3= FordefpryaccmetPeer::doSelectOne($c);
  	if ($resultado3)
  	{
  	  return number_format($resultado3->getCanmet(),2,',','.');
  	}
  	else
  	{
  	  return 'No encontrado';
  	}

  }
}
