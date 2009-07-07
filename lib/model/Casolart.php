<?php

/**
 * Subclass for representing a row from the 'casolart' table.
 *
 *
 *
 * @package lib.model
 */
class Casolart extends BaseCasolart
{
  private $tipo = '';
  protected $actsolegr = '';
  protected $articulo = '';
  protected $modifico= '';
  protected $check= '';
  protected $obj = array();
  protected $etiqueta="";
  protected $porcostart='';
  protected $pormoncot='';

  public function getMonreq($val=false)
  {
	return parent::getMonreq(true);
  }

  public function getNomcat()
  {
	return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getUnires());
  }

  public function getNomext()
  {
	return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setTipo($val)
  {
	$this->tipo = $val;
  }

  public function getTipo()
  {
	return $this->tipo;
  }

  public function getMondes($val=false)
  {
	return parent::getMondes(true);
  }

  public function getEtiqueta()
  {
  	if (self::getStareq()=='A')
  	{
  	  $d= new Criteria();
  	  $d->add(CpprecomPeer::REFPRC,self::getReqart());
  	  $resul= CpprecomPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$eti="SOLICITUD APROBADA";
  	  }else
  	  {
  	  	$eti="SOLICITUD NO APROBADA";
  	  }
  	}
  	else if (self::getStareq()=='N')
  	{
  	  $eti="SOLICITUD ANULADA";
  	}
  	else
  	{
  	 $eti="";
  	}
  	return $eti;
  }

}
