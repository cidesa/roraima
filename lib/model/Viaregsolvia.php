<?php

/**
 * Subclass for representing a row from the 'viaregsolvia' table.
 *
 *
 *
 * @package lib.model
 */
class Viaregsolvia extends BaseViaregsolvia
{
	protected $objplantrabajo = array();
	protected $objgastos      = array();
	protected $formatopresupuesto = '';

  public function afterHydrate()
  {
	$c = new criteria();
	$c->add(NphojintPeer::CEDEMP,self::getCedemp());
	$reg = NphojintPeer::doSelectone($c);

	if ($reg)
	{
	  $this->nomemp = $reg->getNomemp();
	  $this->desniv = Herramientas::getX('codniv','npestorg','desniv',$reg->getCodniv());
      //$this->descar = Herramientas::getX('codemp','npasicaremp','descar',$reg->getCedemp());
      $this->descar = Herramientas::getXx('npasicaremp',array('codemp','status'),array($reg->getCedemp(),'V'),'nomcar');
	  $this->telhab = $reg->getTelhab();
	  $this->emaemp = $reg->getEmaemp();
	}

  }


  public function getFormatopresupuesto()
  {
  	return Herramientas :: ObtenerFormato('cpdefniv', 'forpre');
  }

  public function getNompre()
  {
  	return Herramientas::getX('codpre','cpdeftit','nompre',self::getCodpre());
  }

  public function getNomext()
  {
  	return Herramientas::getX('tipcom','cpdoccom','nomext',self::getTipcom());
  }

}
